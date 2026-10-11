<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MediaItem;
use App\Models\User;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('admin.dashboard', [
            'musicCount' => MediaItem::where('type', 'music')->count(),
            'videoCount' => MediaItem::where('type', 'video')->count(),
            'categoryCount' => Category::count(),
            'userCount' => User::count(),
            'latestMusic' => MediaItem::where('type', 'music')->latest()->take(5)->get(),
            'latestVideos' => MediaItem::where('type', 'video')->latest()->take(5)->get(),
        ]);
    }
}
