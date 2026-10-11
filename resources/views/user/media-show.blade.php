@extends('user.layout')

@section('content')
@php
    $isSong = isset($source) && $source === 'song';
    $title = $isSong ? $item->name : $item->title;
    $artist = $item->artist ?? null;
    $album = $isSong ? null : $item->album;
    $year = $isSong ? null : $item->year;
    $description = $isSong ? null : $item->description;
    $image = $isSong ? asset('users/img/'.ltrim($item->image, '/')) : ($item->thumbnail_url ?: asset('users/img/weblogo.png'));
    $file = $isSong ? asset(ltrim($item->audio, '/')) : $item->file_url;
@endphp

<section class="media-detail-page">
    <div class="media-detail-shell">
        <a class="media-back" href="{{ url()->previous() !== url()->current() ? url()->previous() : route('media.index') }}">
            <i class="fa-solid fa-arrow-left"></i> Back to library
        </a>

        <div class="media-detail-card">
            <div class="media-cover-column">
                <div class="media-cover-frame">
                    <img src="{{ $image }}" alt="{{ $title }}">
                    @if(!$isSong && $item->type === 'video')
                        <span class="media-type-badge"><i class="fa-solid fa-video"></i> Video</span>
                    @else
                        <span class="media-type-badge"><i class="fa-solid fa-music"></i> Music</span>
                    @endif
                </div>
            </div>

            <div class="media-info-column">
                <div class="media-kicker">SOUND • {{ $isSong ? 'MUSIC' : strtoupper($item->type) }}</div>
                <h1>{{ $title }}</h1>
                @if($artist)<p class="media-artist"><i class="fa-solid fa-microphone-lines"></i> {{ $artist }}</p>@endif

                <div class="media-meta-row">
                    @if($album)<span><i class="fa-solid fa-compact-disc"></i> {{ $album }}</span>@endif
                    @if($year)<span><i class="fa-regular fa-calendar"></i> {{ $year }}</span>@endif
                    @if(!$isSong)<span><i class="fa-solid fa-layer-group"></i> {{ $item->categories->count() }} categor{{ $item->categories->count() === 1 ? 'y' : 'ies' }}</span>@endif
                </div>

                @if(!$isSong && $description)
                    <p class="media-description">{{ $description }}</p>
                @endif

                @if($isSong || $item->type === 'music')
                    <div class="sound-player-box">
                        <audio id="detailAudio" controls preload="metadata">
                            <source src="{{ $file }}" type="audio/mpeg">
                            Your browser does not support audio playback.
                        </audio>
                    </div>
                @else
                    <div class="sound-video-box">
                        <video controls preload="metadata" poster="{{ $image }}">
                            <source src="{{ $file }}">
                            Your browser does not support video playback.
                        </video>
                    </div>
                @endif

                @if(!$isSong)
                    <div class="media-rating-summary">
                        <div><span class="stars">★</span> <strong>{{ $averageRating ? number_format($averageRating, 1) : 'No rating' }}</strong> / 5</div>
                        <span>{{ $reviews->count() }} review{{ $reviews->count() === 1 ? '' : 's' }}</span>
                    </div>
                @endif
            </div>
        </div>

        @if(!$isSong)
        <div class="media-community-grid">
            <div class="media-community-card">
                <div class="community-heading"><h2>Rate this {{ $item->type }}</h2><span>1–5 stars</span></div>
                <form method="POST" action="{{ route('media.rating', $item) }}" class="rating-form">
                    @csrf
                    <div class="rating-options">
                        @for($star = 5; $star >= 1; $star--)
                            <input type="radio" id="rating-{{ $star }}" name="rating" value="{{ $star }}" required>
                            <label for="rating-{{ $star }}" title="{{ $star }} stars">★</label>
                        @endfor
                    </div>
                    <button class="detail-action-btn" type="submit">Save rating</button>
                </form>
            </div>

            <div class="media-community-card">
                <div class="community-heading"><h2>Write a review</h2><span>Your review can be updated</span></div>
                <form method="POST" action="{{ route('media.review', $item) }}">
                    @csrf
                    <textarea class="review-input" name="review" rows="4" minlength="3" maxlength="2000" required placeholder="Tell other listeners what you think..."></textarea>
                    <button class="detail-action-btn" type="submit">Publish review</button>
                </form>
            </div>
        </div>

        <div class="media-reviews-card">
            <div class="community-heading"><h2>Listener reviews</h2><span>{{ $reviews->count() }} total</span></div>
            @forelse($reviews as $review)
                <article class="review-item">
                    <div class="review-avatar">{{ strtoupper(substr($review->user->name ?? 'U', 0, 1)) }}</div>
                    <div><strong>{{ $review->user->name ?? 'User' }}</strong><small>{{ $review->created_at->format('d M Y') }}</small><p>{{ $review->review }}</p></div>
                </article>
            @empty
                <p class="empty-review">No reviews yet. Be the first listener to share your opinion.</p>
            @endforelse
        </div>
        @endif
    </div>
</section>
@endsection
