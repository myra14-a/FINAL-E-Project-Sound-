<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WebsiteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MediaBrowseController;
use App\Models\MediaItem;
use App\Models\Song;
use App\Models\blogupload;
use App\Models\videoupload;
use App\Http\Controllers\admincontroller;



Route::get('/', function () {
    if (auth()->check()) {
        return auth()->user()->is_admin
            ? redirect()->route('admin.dashboard')
            : redirect()->route('home');
    }

    return view('auth.landing');
})->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// User pages are available after signup/login.
Route::middleware(['auth'])->group(function () {
    Route::get('/index', [HomeController::class, 'index'])->name('home');
    Route::get('/media', [MediaBrowseController::class, 'index'])->name('media.index');
    Route::get('/media/{media}', [MediaBrowseController::class, 'show'])->name('media.show');
    Route::get('/song/{song}', [MediaBrowseController::class, 'showSong'])->name('song.show');
    Route::post('/media/{media}/review', [MediaBrowseController::class, 'review'])->name('media.review');
    Route::post('/media/{media}/rating', [MediaBrowseController::class, 'rate'])->name('media.rating');

    Route::get('/ostlist', function () {
        $ostSongs = Schema::hasTable('songs')
            ? Song::visible()->where(function ($q) {
                $q->where('category', 'like', '%OST%')->orWhere('category', 'like', '%Pakistani%');
            })->orderBy('id')->get() : collect();
        $ostMedia = Schema::hasTable('media_items')
            ? MediaItem::visible()->where('type', 'music')->where('is_published', true)
                ->where(function ($q) {
                    $q->where('album', 'like', '%OST%')->orWhere('title', 'like', '%OST%')
                      ->orWhereHas('categories', fn ($c) => $c->where('name', 'like', '%OST%'));
                })->latest()->get() : collect();
        return view('user.showallost', compact('ostSongs', 'ostMedia'));
    });
    Route::get('/about', function () { return view('user.about'); });
    Route::get('/contact', function () { return view('user.contact'); })->name('contact');
    Route::get('/blogs', function () {
        // Keep the public page working even if the optional blog table has not
        // been migrated yet. Once migrated, admin/database blogs are fetched.
        $blogs = Schema::hasTable('bloguploads')
            ? blogupload::latest()->get()
            : collect();

        return view('user.blog', ['blogs' => $blogs]);
    })->name('blogs');
    Route::get('/albumlist', function () {
        $songs = Schema::hasTable('songs') ? Song::visible()->where('category', 'Popular Albums')->orderBy('id')->get() : collect();
        return view('user.albumlist', ['songs' => $songs]);
    });

    Route::post('/submit', [admincontroller::class, 'datatransfer'])->name('contact.submit');
    Route::get('/submit', [admincontroller::class, 'showusers']);

    Route::get('/songupload', function () { return view('user.songupload'); });
    Route::get('/songvideo', function () {
        $uploadedVideos = Schema::hasTable('videouploads')
            ? videoupload::latest()->get()
            : collect();

        return view('user.videos', compact('uploadedVideos'));
    })->name('songvideo');

    Route::get('/blogdetail', function () { return view('user.blog-details'); })->name('blogdetail');
    Route::get('/blog/{blog}', function (blogupload $blog) {
        return view('user.blog-details', ['blog' => $blog]);
    })->name('blog.show');

    Route::get('/playlist2', function () { return view('user.shaanplaylist'); });
    Route::get('/playlist1', function () { return view('user.arijitplaylist'); });
    Route::get('/90splay', function () {
        $songs = Schema::hasTable('songs') ? Song::visible()->where("category", "90's Playlist")->orderBy('id')->get() : collect();
        return view('user.90splaylist', ['songs' => $songs]);
    });
    Route::get('/playlist3', function () { return view('user.atifplaylist'); });
 Route::get('/playlist4', function () { return view('user.shreya'); });
  Route::get('/playlist5', function () { return view('user.talha anjum'); });
   Route::get('/playlist6', function () { return view('user.honey'); });




    // Intelligent search suggestions and full search.
    Route::get('/search', function (Illuminate\Http\Request $request) {
        $term = trim((string) $request->query('q'));
        if ($term === '') return response()->json(['results' => []]);
        $like = "%{$term}%";
        $results = collect();
        if (Schema::hasTable('media_items')) {
            $items = MediaItem::visible()->where('is_published', true)->where(function ($q) use ($like) {
                $q->where('title', 'like', $like)->orWhere('artist', 'like', $like)->orWhere('album', 'like', $like)->orWhere('year', 'like', $like);
            })->latest()->take(12)->get();
            $results = $items->map(fn ($item) => [
                'title'=>$item->title,'artist'=>$item->artist,'album'=>$item->album,'type'=>$item->type,
                'image'=>$item->thumbnail_url ?: asset('users/img/weblogo.png'),'url'=>route('media.show',$item),
            ]);
        }
        if (Schema::hasTable('songs')) {
            $songs = Song::visible()->where(function ($q) use ($like) {
                $q->where('name','like',$like)->orWhere('artist','like',$like)->orWhere('category','like',$like);
            })->latest()->take(12)->get();
            $results = $results->concat($songs->map(fn ($song) => [
                'title'=>$song->name,'artist'=>$song->artist,'album'=>$song->category,'type'=>'music',
                'image'=>asset('users/img/'.ltrim($song->image,'/')),'url'=>route('song.show',$song),
            ]));
        }
        return response()->json(['results'=>$results->take(10)->values()]);
    })->name('search');
});

// Administrator panel
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', DashboardController::class)->name('dashboard');

        Route::get('/music', [MediaController::class, 'index'])->defaults('type', 'music')->name('music.index');
        Route::get('/music/create', [MediaController::class, 'create'])->defaults('type', 'music')->name('music.create');
        Route::post('/music', [MediaController::class, 'store'])->defaults('type', 'music')->name('music.store');
        Route::get('/music/{media}/edit', [MediaController::class, 'edit'])->defaults('type', 'music')->name('music.edit');
        Route::put('/music/{media}', [MediaController::class, 'update'])->defaults('type', 'music')->name('music.update');
        Route::delete('/music/{media}', [MediaController::class, 'destroy'])->defaults('type', 'music')->name('music.destroy');

        Route::get('/videos', [MediaController::class, 'index'])->defaults('type', 'video')->name('videos.index');
        Route::get('/videos/create', [MediaController::class, 'create'])->defaults('type', 'video')->name('videos.create');
        Route::post('/videos', [MediaController::class, 'store'])->defaults('type', 'video')->name('videos.store');
        Route::get('/videos/{media}/edit', [MediaController::class, 'edit'])->defaults('type', 'video')->name('videos.edit');
        Route::put('/videos/{media}', [MediaController::class, 'update'])->defaults('type', 'video')->name('videos.update');
        Route::delete('/videos/{media}', [MediaController::class, 'destroy'])->defaults('type', 'video')->name('videos.destroy');

        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
        Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

        Route::get('/website', [WebsiteController::class, 'edit'])->name('website.edit');
        Route::put('/website', [WebsiteController::class, 'update'])->name('website.update');
    });


// upload form
    
Route::get('/videoupload', function () { return view('admin.video uploading'); });

    Route::post('/videoupload', [admincontroller::class, 'videouplaod'])->name('videoupload');
