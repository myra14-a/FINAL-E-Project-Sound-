<?php $__env->startSection('content'); ?>

<section class="blog-page">

    <div class="container">

        <!-- Heading -->
        <div class="blog-heading">
            <span>From The World Of Music</span>

            <h1>SOUND <span style="color:#c026d3;">Blogs</span></h1>

            <p>
                Discover inspiring stories, music history, artist journeys,
                new trends and everything that makes music unforgettable.
            </p>
        </div>


        <!-- Blog Cards -->
        <div class="row">

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $blogs ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-card">
                        <div class="blog-image">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($blog->Image): ?>
                                <img src="<?php echo e(asset('storage/'.$blog->Image)); ?>" alt="<?php echo e($blog->Title); ?>">
                            <?php else: ?>
                                <img src="<?php echo e(asset('users/img/blog/atif blog.jpg')); ?>" alt="<?php echo e($blog->Title); ?>">
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        <div class="blog-content">
                            <span class="blog-category"><?php echo e($blog->Heading ?: 'Music Blog'); ?></span>
                            <h3><?php echo e($blog->Title); ?></h3>
                            <p>
                                <?php echo e(\Illuminate\Support\Str::limit($blog->Description, 130)); ?>

                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(strlen((string) $blog->Description) > 130): ?>
                                    <span class="blog-full-description"><?php echo e(\Illuminate\Support\Str::substr((string) $blog->Description, 130)); ?></span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </p>
                            <a href="#" class="read-more blog-expand">
                                Read More <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


            <!-- Blog 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="blog-card">

                    <div class="blog-image">
                        <img src="<?php echo e(asset('users/img/blog/atif blog.jpg')); ?>"
                             alt="Atif Aslam">
                    </div>

                    <div class="blog-content">

                        <span class="blog-category">
                            Artist Journey
                        </span>

                        <h3>
                            Atif Aslam – The Journey of a Musical Icon
                        </h3>

                        <p>
                            Explore the musical journey of one of Pakistan's
                            most loved voices and his impact on the music world.
                            <span class="blog-full-description">From his early performances to international stages, his distinctive voice and collaborations have helped bring Pakistani music to a wide audience while keeping a strong connection with local musical traditions.</span>
                        </p>

                        <a href="#"
                           class="read-more blog-expand">
                            Read More <i class="fa fa-arrow-right"></i>
                        </a>

                    </div>
                </div>
            </div>


            <!-- Blog 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="blog-card">

                    <div class="blog-image">
                        <img src="<?php echo e(asset('users/img/blog/90s blog.jpg')); ?>"
                             alt="90s Music">
                    </div>

                    <div class="blog-content">

                        <span class="blog-category">
                            Music History
                        </span>

                        <h3>
                            Why 90s Music Still Lives in Our Hearts
                        </h3>

                        <p>
                            Take a nostalgic journey through the songs, melodies and unforgettable sounds of the 90s.
                        <span class="blog-full-description">The 90s brought memorable melodies, expressive vocals and a distinct sound that continues to influence listeners and artists today.</span>
                        </p>

                        <a href="#"
                           class="read-more blog-expand">
                            Read More <i class="fa fa-arrow-right"></i>
                        </a>

                    </div>
                </div>
            </div>


            <!-- Blog 3 -->
            <div class="col-lg-4 col-md-6">
                <div class="blog-card">

                    <div class="blog-image">
                        <img src="<?php echo e(asset('users/img/blog/evalutation blog.jpg')); ?>"
                             alt="Pakistani Music">
                    </div>

                    <div class="blog-content">

                        <span class="blog-category">
                            Pakistani Music
                        </span>

                        <h3>
                            The Evolution of Pakistani Music
                        </h3>

                        <p>
                            From classical melodies to modern pop and indie sounds, discover how Pakistani music has evolved.
                        <span class="blog-full-description">Pakistani music has grown from classical and folk traditions into pop, rock, qawwali, film music and independent sounds while continuing to preserve its cultural identity.</span>
                        </p>

                        <a href="#"
                           class="read-more blog-expand">
                            Read More <i class="fa fa-arrow-right"></i>
                        </a>

                    </div>
                </div>
            </div>


            <!-- Blog 4 -->
            <div class="col-lg-4 col-md-6">
                <div class="blog-card">

                    <div class="blog-image">
                        <img src="<?php echo e(asset('users/img/blog/rahat blog.jpg')); ?>"
                             alt="Music Streaming">
                    </div>

                    <div class="blog-content">

                        <span class="blog-category">
                            Artist Journey
                        </span>

                        <h3>
                           The Voice That Touched Millions
                        </h3>

                        <p>
                           Discover the journey of a legendary voice that took Pakistani Qawwali and music to audiences around the world.
                        <span class="blog-full-description">The journey of a legendary qawwali voice shows how traditional Pakistani music can reach international audiences while keeping its emotional and cultural character.</span>
                        </p>

                        <a href="#"
                           class="read-more blog-expand">
                            Read More <i class="fa fa-arrow-right"></i>
                        </a>

                    </div>
                </div>
            </div>


            <!-- Blog 5 -->
            <div class="col-lg-4 col-md-6">
                <div class="blog-card">

                    <div class="blog-image">
                        <img src="<?php echo e(asset('users/img/blog/sufi blog.jpg')); ?>"
                             alt="Sufi Music">
                    </div>

                    <div class="blog-content">

                        <span class="blog-category">
                            Music & Culture
                        </span>

                        <h3>
                            Sufi Music – The Sound of Soul
                        </h3>

                        <p>
                            Discover the spiritual beauty, history and emotional depth behind the timeless tradition of Sufi music.
                        <span class="blog-full-description">Sufi music combines poetry, devotion and melody to create an expressive musical tradition that has remained deeply connected with South Asian culture.</span>
                        </p>

                        <a href="#"
                           class="read-more blog-expand">
                            Read More <i class="fa fa-arrow-right"></i>
                        </a>

                    </div>
                </div>
            </div>


            <!-- Blog 6 -->
            <div class="col-lg-4 col-md-6">
                <div class="blog-card">

                    <div class="blog-image">
                        <img src="<?php echo e(asset('users/img/blog/mood blog.jpg')); ?>"
                             alt="Music and Mood">
                    </div>

                    <div class="blog-content">

                        <span class="blog-category">
                            Music & Life
                        </span>

                        <h3>
                            How Music Influences Our Mood
                        </h3>

                        <p>
                            Discover why certain songs make us happy, relaxed, emotional or motivated.
                        <span class="blog-full-description">Music can influence mood through rhythm, melody, memories and personal associations, which is why different songs can feel calming, exciting or deeply emotional.</span>
                        </p>

                        <a href="#"
                           class="read-more blog-expand">
                            Read More <i class="fa fa-arrow-right"></i>
                        </a>

                    </div>
                </div>
            </div>

        </div>

    </div>

</section>
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.blog-expand').forEach(function (button) {
        button.addEventListener('click', function (event) {
            event.preventDefault();
            const card = button.closest('.blog-content');
            const extra = card ? card.querySelector('.blog-full-description') : null;
            if (!extra) return;

            const open = extra.classList.toggle('show');
            button.innerHTML = open
                ? 'Read Less <i class="fa fa-arrow-up"></i>'
                : 'Read More <i class="fa fa-arrow-right"></i>';
        });
    });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\123\OneDrive\Desktop\E-project-Sound\resources\views/user/blog.blade.php ENDPATH**/ ?>