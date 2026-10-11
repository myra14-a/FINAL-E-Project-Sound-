@php $dir = 'users/music-files/songs/'; @endphp
<section class="ost-library-page playlist-library-page"><div class="ost-library-shell">
<div class="ost-library-hero"><div><span class="media-kicker">SOUND • {{ strtoupper($singer) }}</span><h1>{{ $singer }}</h1><p>{{ $singer }} — {{ $tagline }}</p></div><a href="{{ route('home') }}" class="ost-library-link"><i class="fa-solid fa-house"></i> Back to Home</a></div>
<div class="ost-grid playlist-grid" id="ostTrackList">
@foreach($tracks as $t)
@php
$img = asset('users/img/'.$t[1]);
$m = isset($t[2]) ? glob(public_path($dir.$t[2]).'*') : [];
$audio = $m ? asset($dir.rawurlencode(basename($m[0]))) : null;
@endphp
<article class="ost-card playlist-track{{ $audio ? ' ost-track' : '' }}"@if($audio) data-title="{{ $t[0] }}" data-artist="{{ $singer }}" data-image="{{ $img }}" data-audio="{{ $audio }}"@endif><div class="ost-cover"><img src="{{ $img }}" alt="{{ $t[0] }}" loading="lazy" onerror="this.onerror=null;this.src='{{ asset('users/img/play-default.png') }}';">@if($audio)<button type="button" class="ost-play-btn"><i class="fa-solid fa-play"></i></button>@else<span class="ost-play-btn playlist-music-icon" aria-hidden="true"><i class="fa-solid fa-music"></i></span>@endif</div><div class="ost-card-body"><h3>{{ $t[0] }}</h3><p>{{ $singer }}</p></div></article>
@endforeach
</div></div></section>
