<?php $__env->startSection('content'); ?>
    <!-- Video Section Begin -->
  
<section class="videos spad">
    <div class="container">

        <div class="section-title text-center">
            <h2>Youtube Feed</h2>
            <h1>Latest Videos</h1>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($uploadedVideos) && $uploadedVideos->count()): ?>

            <div class="sound-video-row">

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $uploadedVideos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="sound-video-card">

                        <div class="sound-video-thumbnail">
                            <video controls preload="metadata">
                                <source src="<?php echo e(asset($video->video)); ?>">
                                Your browser does not support the video tag.
                            </video>
                        </div>

                        <div class="sound-video-title">
                            <h4><?php echo e($video->heading); ?></h4>
                        </div>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            </div>

        <?php else: ?>
            <p>No videos available.</p>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    </div>
</section>

    <!-- Video Section End -->

   <?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\123\OneDrive\Desktop\E-project-Sound\resources\views/user/videos.blade.php ENDPATH**/ ?>