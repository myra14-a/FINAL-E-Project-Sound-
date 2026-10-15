<?php $__env->startSection('content'); ?>
<?php
    $isSong = isset($source) && $source === 'song';
    $title = $isSong ? $item->name : $item->title;
    $artist = $item->artist ?? null;
    $album = $isSong ? null : $item->album;
    $year = $isSong ? null : $item->year;
    $description = $isSong ? null : $item->description;
    $image = $isSong ? asset('users/img/'.ltrim($item->image, '/')) : ($item->thumbnail_url ?: asset('users/img/weblogo.png'));
    $file = $isSong ? asset(ltrim($item->audio, '/')) : $item->file_url;
?>

<section class="media-detail-page">
    <div class="media-detail-shell">
        <a class="media-back" href="<?php echo e(url()->previous() !== url()->current() ? url()->previous() : route('media.index')); ?>">
            <i class="fa-solid fa-arrow-left"></i> Back to library
        </a>

        <div class="media-detail-card">
            <div class="media-cover-column">
                <div class="media-cover-frame">
                    <img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$isSong && $item->type === 'video'): ?>
                        <span class="media-type-badge"><i class="fa-solid fa-video"></i> Video</span>
                    <?php else: ?>
                        <span class="media-type-badge"><i class="fa-solid fa-music"></i> Music</span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>

            <div class="media-info-column">
                <div class="media-kicker">SOUND • <?php echo e($isSong ? 'MUSIC' : strtoupper($item->type)); ?></div>
                <h1><?php echo e($title); ?></h1>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($artist): ?><p class="media-artist"><i class="fa-solid fa-microphone-lines"></i> <?php echo e($artist); ?></p><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <div class="media-meta-row">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($album): ?><span><i class="fa-solid fa-compact-disc"></i> <?php echo e($album); ?></span><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($year): ?><span><i class="fa-regular fa-calendar"></i> <?php echo e($year); ?></span><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$isSong): ?><span><i class="fa-solid fa-layer-group"></i> <?php echo e($item->categories->count()); ?> categor<?php echo e($item->categories->count() === 1 ? 'y' : 'ies'); ?></span><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$isSong && $description): ?>
                    <p class="media-description"><?php echo e($description); ?></p>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isSong || $item->type === 'music'): ?>
                    <div class="sound-player-box">
                        <audio id="detailAudio" controls preload="metadata">
                            <source src="<?php echo e($file); ?>" type="audio/mpeg">
                            Your browser does not support audio playback.
                        </audio>
                    </div>
                <?php else: ?>
                    <div class="sound-video-box">
                        <video controls preload="metadata" poster="<?php echo e($image); ?>">
                            <source src="<?php echo e($file); ?>">
                            Your browser does not support video playback.
                        </video>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$isSong): ?>
                    <div class="media-rating-summary">
                        <div><span class="stars">★</span> <strong><?php echo e($averageRating ? number_format($averageRating, 1) : 'No rating'); ?></strong> / 5</div>
                        <span><?php echo e($reviews->count()); ?> review<?php echo e($reviews->count() === 1 ? '' : 's'); ?></span>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$isSong): ?>
        <div class="media-community-grid">
            <div class="media-community-card">
                <div class="community-heading"><h2>Rate this <?php echo e($item->type); ?></h2><span>1–5 stars</span></div>
                <form method="POST" action="<?php echo e(route('media.rating', $item)); ?>" class="rating-form">
                    <?php echo csrf_field(); ?>
                    <div class="rating-options">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($star = 5; $star >= 1; $star--): ?>
                            <input type="radio" id="rating-<?php echo e($star); ?>" name="rating" value="<?php echo e($star); ?>" required>
                            <label for="rating-<?php echo e($star); ?>" title="<?php echo e($star); ?> stars">★</label>
                        <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <button class="detail-action-btn" type="submit">Save rating</button>
                </form>
            </div>

            <div class="media-community-card">
                <div class="community-heading"><h2>Write a review</h2><span>Your review can be updated</span></div>
                <form method="POST" action="<?php echo e(route('media.review', $item)); ?>">
                    <?php echo csrf_field(); ?>
                    <textarea class="review-input" name="review" rows="4" minlength="3" maxlength="2000" required placeholder="Tell other listeners what you think..."></textarea>
                    <button class="detail-action-btn" type="submit">Publish review</button>
                </form>
            </div>
        </div>

        <div class="media-reviews-card">
            <div class="community-heading"><h2>Listener reviews</h2><span><?php echo e($reviews->count()); ?> total</span></div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <article class="review-item">
                    <div class="review-avatar"><?php echo e(strtoupper(substr($review->user->name ?? 'U', 0, 1))); ?></div>
                    <div><strong><?php echo e($review->user->name ?? 'User'); ?></strong><small><?php echo e($review->created_at->format('d M Y')); ?></small><p><?php echo e($review->review); ?></p></div>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="empty-review">No reviews yet. Be the first listener to share your opinion.</p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\LAPVY\Desktop\FINAL-E-Project-Sound-\resources\views/user/media-show.blade.php ENDPATH**/ ?>