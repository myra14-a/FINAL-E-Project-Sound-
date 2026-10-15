<?php $__env->startSection('content'); ?>
<?php ($routePrefix = $type === 'music' ? 'music' : 'videos'); ?>
<div class="page-title">
    <div><h1><?php echo e($item->exists ? 'Edit' : 'Add'); ?> <?php echo e(ucfirst($type)); ?></h1><p>Keep your <?php echo e($type); ?> information organized and ready for the website.</p></div>
    <a class="btn-outline-admin" href="<?php echo e(route("admin.{$routePrefix}.index")); ?>">← Back to Library</a>
</div>

<form method="POST" enctype="multipart/form-data" action="<?php echo e($item->exists ? route("admin.{$routePrefix}.update", $item) : route("admin.{$routePrefix}.store")); ?>">
    <?php echo csrf_field(); ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($item->exists): ?> <?php echo method_field('PUT'); ?> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <div class="admin-card">
        <div class="form-grid">
            <div class="form-group"><label class="form-label">Title *</label><input class="form-control-admin" name="title" value="<?php echo e(old('title', $item->title)); ?>" required></div>
            <div class="form-group"><label class="form-label">Artist</label><input class="form-control-admin" name="artist" value="<?php echo e(old('artist', $item->artist)); ?>" placeholder="e.g. Atif Aslam"></div>
            <div class="form-group"><label class="form-label">Album</label><input class="form-control-admin" name="album" value="<?php echo e(old('album', $item->album)); ?>" placeholder="Album name"></div>
            <div class="form-group"><label class="form-label">Year</label><input class="form-control-admin" type="number" min="1900" max="2100" name="year" value="<?php echo e(old('year', $item->year)); ?>" placeholder="2026"></div>
            <div class="form-group full"><label class="form-label">Description / Information</label><textarea class="form-control-admin" name="description" placeholder="Add details about this <?php echo e($type); ?>..."><?php echo e(old('description', $item->description)); ?></textarea></div>
            <div class="form-group"><label class="form-label"><?php echo e(ucfirst($type)); ?> File <?php echo e($item->exists ? '(leave empty to keep current)' : '*'); ?></label><input class="form-control-admin" type="file" name="file" <?php echo e($item->exists ? '' : 'required'); ?> accept="<?php echo e($type === 'music' ? 'audio/*' : 'video/*'); ?>">
                <small class="muted"><?php echo e($type === 'music' ? 'MP3, WAV, OGG, M4A — max 50MB' : 'MP4, WEBM, MOV, AVI, MKV — max 200MB'); ?></small>
            </div>
            <div class="form-group"><label class="form-label">Thumbnail / Cover</label><input class="form-control-admin" type="file" name="thumbnail" accept="image/jpeg,image/png,image/webp">
                <small class="muted">Optional JPG, PNG or WEBP — max 5MB</small>
            </div>
            <div class="form-group full">
                <label class="form-label">Categories</label>
                <div class="row">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $typeName => $typeCategories): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="col-md-4 mb-3">
                            <div class="muted mb-2" style="font-size:11px;text-transform:uppercase;"><?php echo e($typeName); ?></div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $typeCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <label class="check-row mb-2"><input type="checkbox" name="categories[]" value="<?php echo e($category->id); ?>" <?php echo e($item->categories->contains($category->id) || in_array($category->id, old('categories', [])) ? 'checked' : ''); ?>> <?php echo e($category->name); ?></label>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="col-12 muted">No categories yet. <a style="color:#d29bff" href="<?php echo e(route('admin.categories.index')); ?>">Create categories first.</a></div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
            <div class="form-group full">
                <label class="check-row"><input type="checkbox" name="is_published" value="1" <?php echo e(old('is_published', $item->is_published) ? 'checked' : ''); ?>> Show this item on the website</label>
            </div>
        </div>
    </div>
    <button class="btn-admin" type="submit"><i class="fa fa-save"></i> <?php echo e($item->exists ? 'Update' : 'Save'); ?> <?php echo e(ucfirst($type)); ?></button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', ['title' => ($item->exists ? 'Edit ' : 'Add ') . ucfirst($type)], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\LAPVY\Desktop\FINAL-E-Project-Sound-\resources\views/admin/media/form.blade.php ENDPATH**/ ?>