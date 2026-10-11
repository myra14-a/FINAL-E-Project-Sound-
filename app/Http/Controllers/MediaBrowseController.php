<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MediaItem;
use App\Models\Rating;
use App\Models\Review;
use App\Models\Song;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MediaBrowseController extends Controller
{
    public function index(Request $request): View
    {
        $query = MediaItem::visible()->where('is_published', true)->with('categories')->latest();
        $search = trim((string) $request->input('search'));
        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('artist', 'like', "%{$search}%")
                  ->orWhere('album', 'like', "%{$search}%")
                  ->orWhere('year', 'like', "%{$search}%");
            });
        }
        foreach (['artist', 'album', 'year'] as $field) {
            if ($request->filled($field)) $query->where($field, $request->input($field));
        }
        if ($request->filled('type') && in_array($request->type, ['music','video'], true)) $query->where('type', $request->type);
        // Songs stored in the songs table (Pakistani OST etc.) also appear in the library.
        $songResults = collect();
        if (Schema::hasTable('songs') && $request->input('type') !== 'video' && ! $request->filled('album') && ! $request->filled('year')) {
            $songQuery = Song::visible()->orderBy('id');
            if ($search !== '') {
                $songQuery->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('artist', 'like', "%{$search}%")
                      ->orWhere('category', 'like', "%{$search}%");
                });
            }
            if ($request->filled('artist')) $songQuery->where('artist', $request->input('artist'));
            $songResults = $songQuery->get();
        }
        $songTotal = $songResults->count();
        if ((int) $request->input('page', 1) > 1) $songResults = collect(); // list songs on page 1 only
        return view('user.media', [
            'songResults' => $songResults,
            'songTotal' => $songTotal,
            'items' => $query->paginate(12)->withQueryString(),
            'artists' => MediaItem::where('is_published', true)->whereNotNull('artist')->distinct()->orderBy('artist')->pluck('artist'),
            'albums' => MediaItem::where('is_published', true)->whereNotNull('album')->distinct()->orderBy('album')->pluck('album'),
            'years' => MediaItem::where('is_published', true)->whereNotNull('year')->distinct()->orderByDesc('year')->pluck('year'),
            'categories' => Category::orderBy('type')->orderBy('name')->get()->groupBy('type'),
        ]);
    }

    public function showSong(\App\Models\Song $song): View
    {
        abort_if($song->isHiddenOst(), 404);
        return view('user.media-show', ['item'=>$song,'source'=>'song','reviews'=>collect(),'averageRating'=>null]);
    }

    public function show(MediaItem $media): View
    {
        abort_unless($media->is_published, 404);
        abort_if(in_array($media->id, MediaItem::hiddenIds(), true), 404);
        $media->load('categories');
        return view('user.media-show', [
            'item' => $media,
            'reviews' => Review::where('media_item_id', $media->id)->with('user')->latest()->get(),
            'averageRating' => Rating::where('media_item_id', $media->id)->avg('rating'),
        ]);
    }

    public function review(Request $request, MediaItem $media): RedirectResponse
    {
        $data = $request->validate(['review' => ['required','string','min:3','max:2000']]);
        Review::updateOrCreate(['user_id' => $request->user()->id, 'media_item_id' => $media->id], ['review' => trim($data['review'])]);
        return back()->with('success', 'Your review was saved.');
    }

    public function rate(Request $request, MediaItem $media): RedirectResponse
    {
        $data = $request->validate(['rating' => ['required','integer','min:1','max:5']]);
        Rating::updateOrCreate(['user_id' => $request->user()->id, 'media_item_id' => $media->id], ['rating' => $data['rating']]);
        return back()->with('success', 'Your rating was saved.');
    }
}
