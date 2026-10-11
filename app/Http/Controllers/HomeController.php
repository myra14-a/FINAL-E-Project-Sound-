<?php
namespace App\Http\Controllers;

use App\Models\MediaItem;
use App\Models\SiteSetting;
use App\Models\Song;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('user.index', [
            'site' => SiteSetting::current(),
            'latestMusic' => MediaItem::visible()->where('type','music')->where('is_published',true)->latest()->take(5)->get(),
            'songs' => Song::visible()->latest()->take(12)->get(),
            'ostSongs' => Schema::hasTable('songs')
                ? Song::visible()->where('category', 'Pakistani OST')->orderBy('id')->get()
                : collect(),
            'popularSongs' => Schema::hasTable('songs')
                ? Song::visible()->where('category', 'Popular Albums')->orderBy('id')->get()
                : collect(),
            'ninetiesSongs' => Schema::hasTable('songs')
                ? Song::visible()->where('category', "90's Playlist")->orderBy('id')->get()
                : collect(),
        ]);
    }
}
