@extends('user.layout')
@section('content')
    

   
    <!-- About Section Begin -->
    <section class="about about--page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about__pic">
                        <img src="{{ asset('users/img/about/about.png') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about__text">
                        <div class="section-title">
                            <h2>Where Every Beat Tells a Story</h2>
                        </div>
                        <p>At BEATX, we bring your favorite music together in one place. From iconic Pakistani OSTs to 
                            trending hits and timeless melodies, our mission is to deliver a seamless and enjoyable 
                            listening experience for every music lover.</p>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->

    <!-- About Pic Begin -->
    <div class="about-pic">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 p-0">
                            <img src="{{ asset('users/img/about/ap-1.jpg') }}" alt="">
                            <img src="{{ asset('users/img/about/ap-2.jpg') }}" alt="">
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8 p-0">
                            <img src="{{ asset('users/img/about/ap-3.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8 p-0">
                            <img src="{{ asset('users/img/about/ap-4.jpg') }}" alt="">
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 p-0">
                            <img src="{{ asset('users/img/about/ap-5.jpg') }}" alt="">
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 p-0">
                            <img src="{{ asset('users/img/about/ap-6.jpg') }}" alt="">
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8 p-0">
                            <img src="{{ asset('users/img/about/ap-7.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Pic End -->

    <!-- About Services Section Begin -->
    <section class="about-services spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title center-title">
                        
                        <h1>Best Choice</h1>
                    </div>
                </div>
            </div>
          <hr>
          <hr>
            <div>
                <h3 class="para text-center text-light ">
                    BEATX is more than just sound — it’s a feeling, a memory, and
sometimes the perfect escape from a stressful day.
                </h3>
             
            </div>
        </div>
    </section>
    <!-- About Services Section End -->

   @endsection