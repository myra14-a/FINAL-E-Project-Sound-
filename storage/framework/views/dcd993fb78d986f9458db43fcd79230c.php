<?php $dir = 'users/music-files/songs/'; ?>
<section class="ost-library-page playlist-library-page"><div class="ost-library-shell">
<div class="ost-library-hero"><div><span class="media-kicker">SOUND • <?php echo e(strtoupper($singer)); ?></span><h1><?php echo e($singer); ?></h1><p><?php echo e($singer); ?> — <?php echo e($tagline); ?></p></div><a href="<?php echo e(route('home')); ?>" class="ost-library-link"><i class="fa-solid fa-house"></i> Back to Home</a></div>
<div class="ost-grid playlist-grid" id="ostTrackList">
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $tracks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php
$img = asset('users/img/'.$t[1]);
$m = isset($t[2]) ? glob(public_path($dir.$t[2]).'*') : [];
$audio = $m ? asset($dir.rawurlencode(basename($m[0]))) : null;
?>
<article class="ost-card playlist-track<?php echo e($audio ? ' ost-track' : ''); ?>"<?php if($audio): ?> data-title="<?php echo e($t[0]); ?>" data-artist="<?php echo e($singer); ?>" data-image="<?php echo e($img); ?>" data-audio="<?php echo e($audio); ?>"<?php endif; ?>><div class="ost-cover"><img src="<?php echo e($img); ?>" alt="<?php echo e($t[0]); ?>" loading="lazy" onerror="this.onerror=null;this.src='<?php echo e(asset('users/img/play-default.png')); ?>';"><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($audio): ?><button type="button" class="ost-play-btn"><i class="fa-solid fa-play"></i></button><?php else: ?><span class="ost-play-btn playlist-music-icon" aria-hidden="true"><i class="fa-solid fa-music"></i></span><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></div><div class="ost-card-body"><h3><?php echo e($t[0]); ?></h3><p><?php echo e($singer); ?></p></div></article>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div></div></section>
<?php /**PATH C:\Users\123\OneDrive\Desktop\E-project-Sound\resources\views/user/partials/singer-playlist.blade.php ENDPATH**/ ?>