@extends('user.layout')

@section('content')
<section class="media-library-page">
    <div class="media-library-shell">
        <div class="library-hero">
            <div>
                <span class="media-kicker">SOUND LIBRARY</span>
                <h1>Find your next favorite</h1>
                <p>Search and filter music and videos by name, artist, album or year.</p>
            </div>
            <div class="library-count"><strong>{{ $items->total() + $songTotal }}</strong><span>results</span></div>
        </div>

        <form class="library-filters" method="GET" action="{{ route('media.index') }}">
            <div class="library-search-field"><i class="fa-solid fa-magnifying-glass"></i><input name="search" value="{{ request('search') }}" placeholder="Song, artist, album or year..."></div>
            <select name="type"><option value="">Music + Video</option><option value="music" @selected(request('type') === 'music')>Music</option><option value="video" @selected(request('type') === 'video')>Video</option></select>
            <select name="artist"><option value="">All artists</option>@foreach($artists as $artist)<option value="{{ $artist }}" @selected(request('artist') === $artist)>{{ $artist }}</option>@endforeach</select>
            <select name="album"><option value="">All albums</option>@foreach($albums as $album)<option value="{{ $album }}" @selected(request('album') === $album)>{{ $album }}</option>@endforeach</select>
            <select name="year"><option value="">All years</option>@foreach($years as $year)<option value="{{ $year }}" @selected((string)request('year') === (string)$year)>{{ $year }}</option>@endforeach</select>
            <button class="detail-action-btn" type="submit">Apply</button>
            @if(request()->hasAny(['search','type','artist','album','year']))<a class="clear-filter" href="{{ route('media.index') }}">Clear</a>@endif
        </form>

        @if($items->count() || $songResults->count())
            <div class="media-library-grid">
                @foreach($songResults as $song)
                    <a class="library-media-card" href="{{ route('song.show', $song) }}">
                        <div class="library-thumb">
                            <img src="{{ asset('users/img/'.ltrim($song->image, '/')) }}" alt="{{ $song->name }}">
                            <span class="library-type"><i class="fa-solid fa-music"></i></span>
                            <span class="library-play"><i class="fa-solid fa-play"></i></span>
                        </div>
                        <div class="library-card-info"><h3>{{ $song->name }}</h3><p>{{ $song->artist ?: 'SOUND' }}</p><span>{{ $song->category }}</span></div>
                    </a>
                @endforeach
                @foreach($items as $item)
                    <a class="library-media-card" href="{{ route('media.show', $item) }}">
                        <div class="library-thumb">
                            <img src="{{ $item->thumbnail_url ?: asset('users/img/weblogo.png') }}" alt="{{ $item->title }}">
                            @if($item->created_at && $item->created_at->gt(now()->subDays(7)))<span class="new-media-badge">NEW</span>@endif
                            <span class="library-type"><i class="fa-solid {{ $item->type === 'video' ? 'fa-video' : 'fa-music' }}"></i></span>
                            <span class="library-play"><i class="fa-solid fa-play"></i></span>
                        </div>
                        <div class="library-card-info"><h3>{{ $item->title }}</h3><p>{{ $item->artist ?: 'SOUND' }}</p><span>{{ $item->album ?: ($item->year ?: ucfirst($item->type)) }}</span></div>
                    </a>
                @endforeach
            </div>
            <div class="pagination-wrap">{{ $items->links() }}</div>
        @else
            <div class="library-empty"><i class="fa-solid fa-music"></i><h2>No matching media</h2><p>Try another song name, artist, album or year.</p><a class="detail-action-btn" href="{{ route('media.index') }}">View all</a></div>
        @endif
    </div>
</section>
@endsection
