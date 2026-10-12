<?php $__env->startSection('content'); ?>
<div class="page-title"><div><h1>Categories</h1><p>Create reusable filters such as YEAR, ARTIST, ALBUM, GENRE and more.</p></div></div>

<div class="row">
    <div class="col-lg-4">
        <div class="admin-card">
            <div class="card-heading"><h3>Add Category</h3></div>
            <form method="POST" action="<?php echo e(route('admin.categories.store')); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-group mb-3"><label class="form-label">Category Type *</label><input class="form-control-admin" name="type" placeholder="YEAR / ARTIST / ALBUM / GENRE" required></div>
                <div class="form-group mb-3"><label class="form-label">Category Name *</label><input class="form-control-admin" name="name" placeholder="e.g. 2026 or Atif Aslam" required></div>
                <button class="btn-admin" type="submit">Create Category</button>
            </form>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="admin-card">
            <div class="card-heading"><h3>Category List</h3><span class="muted"><?php echo e($categories->total()); ?> total</span></div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($categories->count()): ?>
            <div class="responsive-table"><table class="table-admin"><thead><tr><th>Type</th><th>Name</th><th>Used by</th><th>Actions</th></tr></thead><tbody>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><span class="badge-admin"><?php echo e($category->type); ?></span></td>
                    <td><strong><?php echo e($category->name); ?></strong></td>
                    <td class="muted"><?php echo e($category->mediaItems()->count()); ?> media</td>
                    <td>
                        <details>
                            <summary class="btn-outline-admin" style="display:inline-block;cursor:pointer;">Edit</summary>
                            <form method="POST" action="<?php echo e(route('admin.categories.update', $category)); ?>" class="mt-3">
                                <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                                <div class="row">
                                    <div class="col-md-5"><input class="form-control-admin" name="type" value="<?php echo e($category->type); ?>" required></div>
                                    <div class="col-md-5"><input class="form-control-admin" name="name" value="<?php echo e($category->name); ?>" required></div>
                                    <div class="col-md-2 mt-2 mt-md-0"><button class="btn-admin" type="submit">Save</button></div>
                                </div>
                            </form>
                        </details>
                        <form method="POST" action="<?php echo e(route('admin.categories.destroy', $category)); ?>" style="display:inline;" onsubmit="return confirm('Delete this category?');">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?> <button class="btn-danger-admin" type="submit"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </tbody></table></div>
            <div class="pagination-wrap"><?php echo e($categories->links()); ?></div>
            <?php else: ?> <div class="empty">No categories created yet.</div> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', ['title' => 'Categories'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\LAPVY\Desktop\FINAL-E-Project-Sound-\resources\views/admin/categories/index.blade.php ENDPATH**/ ?>