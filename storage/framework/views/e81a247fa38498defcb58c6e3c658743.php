<?php $__env->startSection('content'); ?>

 <!-- ost list -->
<div class="container">
    <section class="recommended-section">

    <div class="recommended-header">
        <h2 class="hd text-light">Popular Albums</h2>

    </div>


    <div class="detail_card" id="songCards">

       <!-- Card 1 -->
        <div class="song-card">
            <div class="song-image-box">
                <img src="<?php echo e(asset('users/img/finder her.jpg')); ?>" alt="">
                <button class="play-btn">▶</button>
            </div>

            <h3> Agar Tum Saath Ho</h3>
           
        </div>


        <!-- Card 2 -->
        <div class="song-card">
            <div class="song-image-box">
               <img src="<?php echo e(asset('users/img/gal sun.jpg')); ?>" alt="">
                <button class="play-btn">▶</button>
            </div>

            <h3>Sitaare</h3>
           
        </div>


          <!--  Card 3-->
        <div class="song-card">
            <div class="song-image-box">
                <img src="<?php echo e(asset('users/img/darkhast.png')); ?>" alt="">
                <button class="play-btn">▶</button>
            </div>

            <h3> Darkhast</h3>
            
        </div>

          <!--  Card 4-->
        <div class="song-card">
            <div class="song-image-box">
                <img src="<?php echo e(asset('users/img/gehra huwa.jpg')); ?>" alt="">
                <button class="play-btn">▶</button>
            </div>

            <h3>Gehra Huwa</h3>
           
        </div>


        <!-- Card 5 -->
        <div class="song-card">
            <div class="song-image-box">
                <img src="<?php echo e(asset('users/img/heeriye.jpg')); ?>" alt="">
                <button class="play-btn">▶</button>
            </div>

            <h3>Heeriye</h3>
           
        </div>


        <!-- Card 6 -->
        <div class="song-card">
            <div class="song-image-box">
               <img src="<?php echo e(asset('users/img/humdard.jpg')); ?>" alt="">
                <button class="play-btn">▶</button>
            </div>

            <h3> Humdard </h3>
          
        </div>


        <!--  Card 7 -->
        <div class="song-card">
            <div class="song-image-box">
               <img src="<?php echo e(asset('users/img/ilahi.jpg')); ?>" alt="">
                <button class="play-btn">▶</button>
            </div>

            <h3>Ilahi</h3>
           
        </div>

          <!--  Card  8-->
        <div class="song-card">
            <div class="song-image-box">
               <img src="<?php echo e(asset('users/img/keserya.jpg')); ?>" alt="">
                <button class="play-btn">▶</button>
            </div>

            <h3>Keseriya</h3>
          
        </div>

          <!--  Card 9-->
        <div class="song-card">
            <div class="song-image-box">
               <img src="<?php echo e(asset('users/img/sanam re.jpg')); ?>" alt="">
                <button class="play-btn">▶</button>
            </div>

            <h3>Sanam Re</h3>
           
        </div>
  

          <!--  Card 10 -->
        <div class="song-card">
            <div class="song-image-box">
                <img src="<?php echo e(asset('users/img/satranga.jpg')); ?>" alt="">
                <button class="play-btn">▶</button>
            </div>

            <h3>Satranga</h3>
          
        </div>

        
          <!--  Card 11 -->
        <div class="song-card">
            <div class="song-image-box">
                <img src="<?php echo e(asset('users/img/soraj dooba h.jpg')); ?>" alt="">
                <button class="play-btn">▶</button>
            </div>

            <h3>Sooraj Dooba Hain</h3>
           
        </div>

        
          <!--  Card 12-->
        <div class="song-card">
            <div class="song-image-box">
                <img src="<?php echo e(asset('users/img/rabta.jpg')); ?>" alt="">
                <button class="play-btn">▶</button>
            </div>

            <h3>Rabta</h3>
           
        </div>

        
          <!--  Card 13 -->
        <div class="song-card">
            <div class="song-image-box">
                <img src="<?php echo e(asset('users/img/tujhe kitna chane lagai.jpg')); ?>" alt="">
                <button class="play-btn">▶</button>
            </div>

            <h3>Tujhe Kitna Chane Lage Hum</h3>
        
        </div>
       
               <!--  Card 14-->
        <div class="song-card">
            <div class="song-image-box">
                <img src="<?php echo e(asset('users/img/chaleya.jpg')); ?>" alt="">
                <button class="play-btn">▶</button>
            </div>

            <h3>Chaleya</h3>
        
        </div>


       
    </div>

</section>

</div>
    
  <!-- ost list end here -->

   <?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\E-project-Sound-FULL\resources\views/user/arijitplaylist.blade.php ENDPATH**/ ?>