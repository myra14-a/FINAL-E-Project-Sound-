<?php $__env->startSection('content'); ?>
<div class="page-title">
    <div><h1>Admin Dashboard</h1><p>Everything you need to manage SOUND — music, videos, categories and users.</p></div>
    <a class="btn-admin" href="<?php echo e(route('admin.music.create')); ?>"><i class="fa fa-plus"></i> Add Music</a>
</div>

<div class="stat-grid">
    <div class="stat-card"><div class="stat-icon"><i class="fa fa-headphones"></i></div><div class="value"><?php echo e($musicCount); ?></div><div class="label">Music Files</div></div>
    <div class="stat-card"><div class="stat-icon"><i class="fa fa-video-camera"></i></div><div class="value"><?php echo e($videoCount); ?></div><div class="label">Video Files</div></div>
    <div class="stat-card"><div class="stat-icon"><i class="fa fa-tags"></i></div><div class="value"><?php echo e($categoryCount); ?></div><div class="label">Categories</div></div>
    <div class="stat-card"><div class="stat-icon"><i class="fa fa-users"></i></div><div class="value"><?php echo e($userCount); ?></div><div class="label">Users / Logins</div></div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="admin-card">
            <div class="card-heading"><h3>Latest Music</h3><a class="muted" href="<?php echo e(route('admin.music.index')); ?>">View all →</a></div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($latestMusic->count()): ?>
                <div class="responsive-table"><table class="table-admin"><tbody>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $latestMusic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr><td><div style="display:flex;align-items:center;gap:12px;"><img class="media-thumb" src="<?php echo e($item->thumbnail_url ?: asset('users/img/weblogo.png')); ?>" alt=""><div><strong><?php echo e($item->title); ?></strong><br><small class="muted"><?php echo e($item->artist ?: 'Unknown artist'); ?></small></div></div></td><td class="text-right"><span class="badge-admin"><?php echo e($item->year ?: '—'); ?></span></td></tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </tbody></table></div>
            <?php else: ?> <div class="empty">No music added yet.</div> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="admin-card">
            <div class="card-heading"><h3>Latest Videos</h3><a class="muted" href="<?php echo e(route('admin.videos.index')); ?>">View all →</a></div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($latestVideos->count()): ?>
                <div class="responsive-table"><table class="table-admin"><tbody>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $latestVideos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr><td><div style="display:flex;align-items:center;gap:12px;"><img class="media-thumb" src="<?php echo e($item->thumbnail_url ?: asset('users/img/weblogo.png')); ?>" alt=""><div><strong><?php echo e($item->title); ?></strong><br><small class="muted"><?php echo e($item->artist ?: 'Video'); ?></small></div></div></td><td class="text-right"><span class="badge-admin">VIDEO</span></td></tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </tbody></table></div>
            <?php else: ?> <div class="empty">No videos added yet.</div> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</div>

<div class="admin-card">
    <div class="card-heading"><h3>Administrator Tools</h3></div>
    <div class="row">
        <div class="col-md-3 mb-3"><a class="btn-outline-admin d-block text-center" href="<?php echo e(route('admin.music.create')); ?>"><i class="fa fa-plus"></i> Add Music</a></div>
        <div class="col-md-3 mb-3"><a class="btn-outline-admin d-block text-center" href="<?php echo e(route('admin.videos.create')); ?>"><i class="fa fa-plus"></i> Add Video</a></div>
        <div class="col-md-3 mb-3"><a class="btn-outline-admin d-block text-center" href="<?php echo e(route('admin.categories.index')); ?>"><i class="fa fa-tags"></i> Manage Categories</a></div>
        <div class="col-md-3 mb-3"><a class="btn-outline-admin d-block text-center" href="<?php echo e(route('admin.website.edit')); ?>"><i class="fa fa-globe"></i> Website Details</a></div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', ['title' => 'Dashboard'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\LAPVY\Desktop\FINAL-E-Project-Sound-\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>