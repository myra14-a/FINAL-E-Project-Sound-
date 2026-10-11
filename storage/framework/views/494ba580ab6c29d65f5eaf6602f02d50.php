<?php $__env->startSection('content'); ?>
   <!-- Hero Section Begin -->
   <video class="hero-video" autoplay muted loop playsinline>
    <source src="<?php echo e(asset('users/video/sound add.mp4')); ?>" type="video/mp4">
    Your browser does not support the video tag.
</video>
    <!-- Hero Section End -->



<section class="artists-section" id="popular-artists">
    <div class="artists-header"><h2>Popular artists</h2></div>
    <div class="artists-wrapper">
        <div class="artists-container" id="artistsContainer">
            <?php
                $popularArtists = [
                    ['name'=>'Arijit Singh','image'=>'arijit singh.jpg','url'=>'/playlist1'],
                    ['name'=>'Shaan','image'=>'shaan.jpg','url'=>'/playlist2'],
                    ['name'=>'Atif Aslam','image'=>'atifaslam.jpg','url'=>'/playlist3'],
                    ['name'=>'Shreya Goshal','image'=>'shreya.jpg','url'=>'/playlist4'],
                    ['name'=>'Talha Anjum','image'=>'talha.jpg','url'=>'/playlist5'],
                    ['name'=>'Honey Singh','image'=>'honey.jpg','url'=>'/playlist6'],
                ];
            ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $popularArtists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="artist-card">
                    <div class="artist-image-wrapper">
                        <img src="<?php echo e(asset('users/img/'.$artist['image'])); ?>" alt="<?php echo e($artist['name']); ?>" class="artist-image">
                        <div class="play-button"><a href="<?php echo e($artist['url']); ?>"><i class="fa-solid fa-play"></i></a></div>
                    </div>
                    <div class="artist-name"><?php echo e($artist['name']); ?></div>
                    <div class="artist-type">Artist</div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</section>

    <!-- ost list -->
<div class="container">
    <section class="recommended-section">

    <div class="recommended-header">
        <h2 class="hd text-light">Pakistani OST</h2>

        <div class="scroll-buttons">

            <a href="/ostlist">Show all</a>
        </div>
    </div>


    <div class="song-cards" id="songCards">

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($latestMusic) && $latestMusic->count()): ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $latestMusic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $music): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="song-card media-link-card" data-detail-url="<?php echo e(route('media.show', $music)); ?>">
                    <div class="song-image-box">
                        <img src="<?php echo e($music->thumbnail_url ?: asset('users/img/weblogo.png')); ?>" alt="<?php echo e($music->title); ?>">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($music->created_at && $music->created_at->gt(now()->subDays(7))): ?><span class="new-media-badge">NEW</span><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <button class="play-btn dynamic-play-btn" type="button">▶</button>
                    </div>
                    <h3><?php echo e($music->title); ?></h3>
                    <p><?php echo e($music->artist ?: 'Sound'); ?></p>
                    <audio class="dynamic-song-audio" preload="none">
                        <source src="<?php echo e($music->file_url); ?>" type="audio/mpeg">
                    </audio>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $ostSongs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $song): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="song-card media-link-card" data-detail-url="<?php echo e(route('song.show', $song)); ?>">
                <div class="song-image-box">
                    <img src="<?php echo e(asset('users/img/'.ltrim($song->image, '/'))); ?>" alt="<?php echo e($song->name); ?>">
                    <button class="play-btn dynamic-play-btn" type="button">▶</button>
                </div>
                <h3><?php echo e($song->name); ?></h3>
                <p><?php echo e($song->artist); ?></p>
                <audio class="dynamic-song-audio" preload="none">
                    <source src="<?php echo e(asset(ltrim($song->audio, '/'))); ?>" type="audio/mpeg">
                </audio>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

       


       
    </div>

</section>

</div>
    
  <!-- ost list end here -->

    <!-- About Section Begin -->
    <section class="about spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about__pic">
                        <img src="<?php echo e(asset('users/img/about/about.png')); ?>" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about__text">
                        <div class="section-title">
                           
                            <h1>About us</h1>
                        </div>
                        <hr>
                        <hr>
                        <hr>
                        <p>Music is more than just sound — it’s a feeling, a memory, and <br> sometimes the perfect escape from a stressful day.</p>
                        <a href="/contact" class="primary-btn">CONTACT us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->

    <!-- album list -->
<div class="container">
    <section class="recommended-section">

    <div class="recommended-header">
        <h2 class="hd text-light">Popular Albums</h2>

        <div class="scroll-buttons">
  <a href="/albumlist">Show all</a>
           
        </div>
    </div>


    <div class="song-cards" id="songCards">

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($popularSongs->count()): ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $popularSongs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $song): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="song-card">
                <div class="song-image-box">
                    <img src="<?php echo e(asset('users/img/'.ltrim($song->image, '/'))); ?>" alt="<?php echo e($song->name); ?>">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($song->audio): ?><button class="play-btn dynamic-play-btn" type="button">▶</button><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <h3><?php echo e($song->name); ?></h3>
                <p><?php echo e($song->artist); ?></p>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($song->audio): ?>
                <audio class="dynamic-song-audio" preload="none">
                    <source src="<?php echo e(asset(ltrim($song->audio, '/'))); ?>" type="audio/mpeg">
                </audio>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php else: ?>

        <!-- Card 1 -->
        <div class="song-card">
            <div class="song-image-box">
                <img src="<?php echo e(asset('users/img/finder her.jpg')); ?>" alt="">
                <button class="play-btn">▶</button>
            </div>

            <h3> Finding Her</h3>
            <p>Kushagra Thakur</p>
        </div>


        <!-- Card 2 -->
        <div class="song-card">
            <div class="song-image-box">
               <img src="<?php echo e(asset('users/img/gal sun.jpg')); ?>" alt="">
                <button class="play-btn">▶</button>
            </div>

            <h3>Gal Sun</h3>
            <p> Sabat Batin</p>
        </div>


          <!-- Extra Card -->
        <div class="song-card">
            <div class="song-image-box">
                <img src="<?php echo e(asset('users/img/jhol.png')); ?>" alt="">
                <button class="play-btn">▶</button>
            </div>

            <h3> Jhol</h3>
            <p>Maanu and Annural Khalid</p>
        </div>

          <!-- Extra Card -->
        <div class="song-card">
            <div class="song-image-box">
                <img src="<?php echo e(asset('users/img/kalyani.jpg')); ?>" alt="">
                <button class="play-btn">▶</button>
            </div>

            <h3>Kalyani</h3>
            <p> Shreya Ghoshal</p>
        </div>


        <!-- Card 3 -->
        <div class="song-card">
            <div class="song-image-box">
                <img src="<?php echo e(asset('users/img/sheesha.jpg')); ?>" alt="">
                <button class="play-btn">▶</button>
            </div>

            <h3>Sheesha</h3>
            <p>Mitta Ror and Swara Verma</p>
        </div>


        <!-- Card 4 -->
        <div class="song-card">
            <div class="song-image-box">
               <img src="<?php echo e(asset('users/img/shaky.jpg')); ?>" alt="">
                <button class="play-btn">▶</button>
            </div>

            <h3> Shaky </h3>
            <p>  Sanju Rathod</p>
        </div>


        <!-- Extra Card -->
        <div class="song-card">
            <div class="song-image-box">
               <img src="<?php echo e(asset('users/img/pal pal.jpg')); ?>" alt="">
                <button class="play-btn">▶</button>
            </div>

            <h3>Pal Pal</h3>
            <p> Talwiinder</p>
        </div>

          <!-- Extra Card -->
        <div class="song-card">
            <div class="song-image-box">
               <img src="<?php echo e(asset('users/img/tere liye.jpg')); ?>" alt="">
                <button class="play-btn">▶</button>
            </div>

            <h3>Tere Liye</h3>
            <p>Atif Aslam</p>
        </div>

          <!-- Extra Card -->
        <div class="song-card">
            <div class="song-image-box">
               <img src="<?php echo e(asset('users/img/sahiba.jpg')); ?>" alt="">
                <button class="play-btn">▶</button>
            </div>

            <h3>Sahiba</h3>
            <p> Stebin Ben and Jasleen Royal</p>
        </div>

    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    </div>

</section>

</div>

  <!-- album list end here -->
    
   <!-- 90s list -->
<div class="container">
    <section class="recommended-section">

    <div class="recommended-header">
        <h2 class="hd text-light">90's Playlist</h2>

        <div class="scroll-buttons">
          
  <a href="/90splay">Show all</a>
           
        </div>
    </div>


    <div class="song-cards" id="songCards">

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ninetiesSongs->count()): ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $ninetiesSongs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $song): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="song-card">
                <div class="song-image-box">
                    <img src="<?php echo e(asset('users/img/'.ltrim($song->image, '/'))); ?>" alt="<?php echo e($song->name); ?>">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($song->audio): ?><button class="play-btn dynamic-play-btn" type="button">▶</button><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <h3><?php echo e($song->name); ?></h3>
                <p><?php echo e($song->artist); ?></p>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($song->audio): ?>
                <audio class="dynamic-song-audio" preload="none">
                    <source src="<?php echo e(asset(ltrim($song->audio, '/'))); ?>" type="audio/mpeg">
                </audio>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php else: ?>

        <!-- Card 1 -->
        <div class="song-card">
            <div class="song-image-box">
                <img src="<?php echo e(asset('users/img/kali kali ankhe.jpg')); ?>" alt="">
                <button class="play-btn">▶</button>
            </div>

            <h3>Yeh Kaali Kaali Aankhen</h3>
            <p>Kumar Sanu and Anu Malik</p>
        </div>


        <!-- Card 2 -->
        <div class="song-card">
            <div class="song-image-box">
               <img src="<?php echo e(asset('users/img/phele nasha.jpg')); ?>" alt="">
                <button class="play-btn">▶</button>
            </div>

            <h3>Pehla Nasha</h3>
            <p> Udit Narayan and Sadhana Sargam</p>
        </div>


          <!-- Extra Card -->
        <div class="song-card">
            <div class="song-image-box">
                <img src="<?php echo e(asset('users/img/jaadu teri nazar.jpg')); ?>" alt="">
                <button class="play-btn">▶</button>
            </div>

            <h3> Jaadu Teri Nazar</h3>
            <p>Udit Narayan</p>
        </div>

          <!-- Extra Card -->
        <div class="song-card">
            <div class="song-image-box">
                <img src="<?php echo e(asset('users/img/tujhe dekha.jpg')); ?>" alt="">
                <button class="play-btn">▶</button>
            </div>

            <h3>Tujhe Dekha To</h3>
            <p> Kumar Sanu and Lata Mangeshkar</p>
        </div>


        <!-- Card 3 -->
        <div class="song-card">
            <div class="song-image-box">
                <img src="<?php echo e(asset('users/img/tan tana.jpg')); ?>" alt="">
                <button class="play-btn">▶</button>
            </div>

            <h3>Tan Tana Tan</h3>
            <p>Abhijeet Bhattacharya and Poornima</p>
        </div>


        <!-- Card 4 -->
        <div class="song-card">
            <div class="song-image-box">
               <img src="<?php echo e(asset('users/img/oo jane jana.jpg')); ?>" alt="">
                <button class="play-btn">▶</button>
            </div>

            <h3> O O Jaane Jaana  </h3>
            <p>Kamaal Khan </p>
        </div>


        <!-- Extra Card -->
        <div class="song-card">
            <div class="song-image-box">
               <img src="<?php echo e(asset('users/img/chaiya.jpg')); ?>" alt="">
                <button class="play-btn">▶</button>
            </div>

            <h3>Chaiyya Chaiyya</h3>
            <p> Sukhwinder Singh & Sapna Awasthi </p>
        </div>

          <!-- Extra Card -->
        <div class="song-card">
            <div class="song-image-box">
               <img src="<?php echo e(asset('users/img/humko hamai se.jpg')); ?>" alt="">
                <button class="play-btn">▶</button>
            </div>

            <h3>Humko Humise Chura Lo</h3>
            <p>Lata Mangeshkar and Udit Narayan</p>
        </div>

          <!-- Extra Card -->
        <div class="song-card">
            <div class="song-image-box">
               <img src="<?php echo e(asset('users/img/bht pyar krtee.jpg')); ?>" alt="">
                <button class="play-btn">▶</button>
            </div>

            <h3>Bahut Pyar Karte Hain</h3>
            <p> by Anuradha Paudwal </p>
        </div>

    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    </div>

</section>

</div>
    
  <!-- 90s list end here -->

    <!-- Services Section Begin -->
    <section class="services">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 p-0">
                    <div class="services__left set-bg" data-setbg="<?php echo e(asset('users/img/services/service-left.jpg')); ?>">
                       
                    </div>
                </div>
                <div class="col-lg-6 p-0">
                    <div class="row services__list">
                        <div class="col-lg-6 p-0 order-lg-1 col-md-6 order-md-1">
                            <div class="service__item deep-bg">
                                <img src="<?php echo e(asset('users/img/services/service-1.png')); ?>" alt="">
                                <h4>Wedding</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 p-0 order-lg-2 col-md-6 order-md-2">
                            <div class="service__item">
                                <img src="<?php echo e(asset('users/img/services/service-2.png')); ?>" alt="">
                                <h4>Clubs and bar</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 p-0 order-lg-4 col-md-6 order-md-4">
                            <div class="service__item deep-bg">
                                <img src="<?php echo e(asset('users/img/services/service-4.png')); ?>" alt="">
                                <h4>DJ lessons</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 p-0 order-lg-3 col-md-6 order-md-3">
                            <div class="service__item">
                                <img src="<?php echo e(asset('users/img/services/service-3.png')); ?>" alt="">
                                <h4>Corporate events</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section End -->

 
   <?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\LAPVY\Downloads\E-project-Sound-FULL\resources\views/user/index.blade.php ENDPATH**/ ?>