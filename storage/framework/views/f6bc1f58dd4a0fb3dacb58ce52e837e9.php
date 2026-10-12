<?php $__env->startSection('content'); ?>
<div class="container">
    <h2 class="hd text-white text-center p-5">
        Video Uploading
    </h2>
    <form action="/videoupload" method="post" class="text-center"  enctype="multipart/form-data" >
        <?php echo csrf_field(); ?>
        
        <input type="file" name="video" id=""  placeholder="Select video" class="bg-white p-2 m-3 w-50 " style="border-radius: 5px;">
        <br>
         <input type="text" name="name" id="" placeholder="Select name" class="bg-white p-2 m-3 w-50 "  style="border-radius: 5px;">
         <br>
         <button type="submit" name="submit" class="bg-white p-2 m-3 w-50 "  style="border-radius: 5px;">Upload Now</button>

    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\LAPVY\Desktop\FINAL-E-Project-Sound-\resources\views/admin/media/form.blade.php ENDPATH**/ ?>