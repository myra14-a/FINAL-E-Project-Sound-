<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        return view('admin.categories.index', [
            'categories' => Category::orderBy('type')->orderBy('name')->paginate(15),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'type' => ['required', 'string', 'max:50', 'regex:/^[A-Za-z0-9 _-]+$/'],
            'name' => ['required', 'string', 'max:100'],
        ]);

        Category::firstOrCreate(
            ['type' => strtoupper(trim($data['type'])), 'name' => trim($data['name'])]
        );

        return back()->with('success', 'Category created successfully.');
    }

    public function update(Request $request, Category $category): RedirectResponse
    {
        $data = $request->validate([
            'type' => ['required', 'string', 'max:50', 'regex:/^[A-Za-z0-9 _-]+$/'],
            'name' => ['required', 'string', 'max:100'],
        ]);

        $category->update([
            'type' => strtoupper(trim($data['type'])),
            'name' => trim($data['name']),
        ]);

        return back()->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->mediaItems()->detach();
        $category->delete();

        return back()->with('success', 'Category deleted successfully.');
    }
}
