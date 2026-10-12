<?php $__env->startSection('content'); ?>
<?php ($routePrefix = $type === 'music' ? 'music' : 'videos'); ?>
<div class="page-title">
    <div><h1><?php echo e(ucfirst($type)); ?> Library</h1><p>Add, edit and remove <?php echo e($type); ?> files and their information.</p></div>
    <a class="btn-admin" href="<?php echo e(route("admin.{$routePrefix}.create")); ?>"><i class="fa fa-plus"></i> Add <?php echo e(ucfirst($type)); ?></a>
</div>

<div class="admin-card">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($items->count()): ?>
        <div class="responsive-table">
        <table class="table-admin">
            <thead><tr><th>Title</th><th>Artist</th><th>Album</th><th>Year</th><th>Categories</th><th>Status</th><th>Actions</th></tr></thead>
            <tbody>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><strong><?php echo e($item->title); ?></strong><br><small class="muted"><?php echo e(basename($item->file_path)); ?></small></td>
                    <td><?php echo e($item->artist ?: '—'); ?></td>
                    <td><?php echo e($item->album ?: '—'); ?></td>
                    <td><?php echo e($item->year ?: '—'); ?></td>
                    <td><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $item->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><span class="badge-admin mr-1"><?php echo e($cat->type); ?>: <?php echo e($cat->name); ?></span><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?> <span class="muted">None</span><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></td>
                    <td><span class="badge-admin <?php echo e($item->is_published ? 'badge-success' : 'badge-danger'); ?>"><?php echo e($item->is_published ? 'Published' : 'Hidden'); ?></span></td>
                    <td style="white-space:nowrap;">
                        <a class="btn-outline-admin" href="<?php echo e(route("admin.{$routePrefix}.edit", $item)); ?>"><i class="fa fa-pencil"></i></a>
                        <form method="POST" action="<?php echo e(route("admin.{$routePrefix}.destroy", $item)); ?>" style="display:inline;" onsubmit="return confirm('Delete this <?php echo e($type); ?> permanently?');">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <button class="btn-danger-admin" type="submit"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </tbody>
        </table>
        </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($items->hasPages()): ?>
            <div class="pagination-clean" aria-label="Pagination">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($page=1; $page <= $items->lastPage(); $page++): ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($page === $items->currentPage()): ?><span class="active"><?php echo e($page); ?></span><?php else: ?><a href="<?php echo e($items->url($page)); ?>"><?php echo e($page); ?></a><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php else: ?>
        <div class="empty"><i class="fa fa-folder-open-o fa-2x"></i><h4 class="mt-3">No <?php echo e($type); ?> files yet</h4><p>Add your first file using the button above.</p></div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', ['title' => ucfirst($type)], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\LAPVY\Desktop\FINAL-E-Project-Sound-\resources\views/admin/media/index.blade.php ENDPATH**/ ?>