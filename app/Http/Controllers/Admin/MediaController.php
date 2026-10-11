<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MediaItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class MediaController extends Controller
{
    public function index(string $type): View
    {
        abort_unless(in_array($type, ['music', 'video'], true), 404);

        return view('admin.media.index', [
            'type' => $type,
            'items' => MediaItem::where('type', $type)->with('categories')->latest()->paginate(10),
        ]);
    }

    public function create(string $type): View
    {
        abort_unless(in_array($type, ['music', 'video'], true), 404);

        return view('admin.media.form', [
            'type' => $type,
            'item' => new MediaItem(['type' => $type, 'is_published' => true]),
            'categories' => Category::orderBy('type')->orderBy('name')->get()->groupBy('type'),
        ]);
    }

    public function store(Request $request, string $type): RedirectResponse
    {
        abort_unless(in_array($type, ['music', 'video'], true), 404);

        $data = $request->validate($this->rules($type));
        $data['type'] = $type;
        $data['is_published'] = $request->boolean('is_published');

        $data['file_path'] = $request->file('file')->store('media/' . $type, 'public');
        unset($data['file']);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail_path'] = $request->file('thumbnail')->store('media/thumbnails', 'public');
        }
        unset($data['thumbnail']);

        $item = MediaItem::create($data);
        $item->categories()->sync($request->input('categories', []));

        return redirect()->route($type === 'music' ? 'admin.music.index' : 'admin.videos.index')->with('success', ucfirst($type) . ' added successfully.');
    }

    public function edit(string $type, MediaItem $media): View
    {
        abort_unless($media->type === $type, 404);

        return view('admin.media.form', [
            'type' => $type,
            'item' => $media->load('categories'),
            'categories' => Category::orderBy('type')->orderBy('name')->get()->groupBy('type'),
        ]);
    }

    public function update(Request $request, string $type, MediaItem $media): RedirectResponse
    {
        abort_unless($media->type === $type, 404);

        $data = $request->validate($this->rules($type, true));
        $data['is_published'] = $request->boolean('is_published');

        if ($request->hasFile('file')) {
            Storage::disk('public')->delete($media->file_path);
            $data['file_path'] = $request->file('file')->store('media/' . $type, 'public');
        }
        unset($data['file']);

        if ($request->hasFile('thumbnail')) {
            Storage::disk('public')->delete($media->thumbnail_path);
            $data['thumbnail_path'] = $request->file('thumbnail')->store('media/thumbnails', 'public');
        }
        unset($data['thumbnail']);

        $media->update($data);
        $media->categories()->sync($request->input('categories', []));

        return redirect()->route($type === 'music' ? 'admin.music.index' : 'admin.videos.index')->with('success', ucfirst($type) . ' updated successfully.');
    }

    public function destroy(string $type, MediaItem $media): RedirectResponse
    {
        abort_unless($media->type === $type, 404);

        Storage::disk('public')->delete([$media->file_path, $media->thumbnail_path]);
        $media->categories()->detach();
        $media->delete();

        return back()->with('success', ucfirst($type) . ' deleted successfully.');
    }

    private function rules(string $type, bool $update = false): array
    {
        $fileRule = $update ? 'nullable' : 'required';
        $extensions = $type === 'music'
            ? 'mimes:mp3,wav,ogg,m4a|max:51200'
            : 'mimes:mp4,webm,mov,avi,mkv|max:204800';

        return [
            'title' => ['required', 'string', 'max:255'],
            'artist' => ['nullable', 'string', 'max:255'],
            'album' => ['nullable', 'string', 'max:255'],
            'year' => ['nullable', 'integer', 'min:1900', 'max:2100'],
            'description' => ['nullable', 'string', 'max:5000'],
            'file' => [$fileRule, 'file', $extensions],
            'thumbnail' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'categories' => ['nullable', 'array'],
            'categories.*' => ['integer', 'exists:categories,id'],
        ];
    }
}
