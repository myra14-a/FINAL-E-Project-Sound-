
@extends('user.layout')
@section('content')
    <!-- Video Section Begin -->
  
<section class="videos spad">
    <div class="container">

        <div class="section-title text-center">
            <h2>Youtube Feed</h2>
            <h1>Latest Videos</h1>
        </div>

        @if(isset($uploadedVideos) && $uploadedVideos->count())

            <div class="sound-video-row">

                @foreach($uploadedVideos as $video)
                    <div class="sound-video-card">

                        <div class="sound-video-thumbnail">
                            <video controls preload="metadata">
                                <source src="{{ asset($video->video) }}">
                                Your browser does not support the video tag.
                            </video>
                        </div>

                        <div class="sound-video-title">
                            <h4>{{ $video->heading }}</h4>
                        </div>

                    </div>
                @endforeach

            </div>

        @else
            <p>No videos available.</p>
        @endif

    </div>
</section>

    <!-- Video Section End -->

   @endsection