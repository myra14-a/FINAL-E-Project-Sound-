<?php $__env->startSection('content'); ?>
<?php
$singer = 'Atif Aslam'; $tagline = 'his most loved songs in one smooth player.';
$tracks = [
    ['Darasal', 'darasal.jpg', 'Darasal'],
    ['Tera Hone Laga Hoon', 'tera hone laga ho.jpg', 'Atif_Aslam_Alisha_Chinoy_-_Tera_Hone_Laga_Hoon_mp3.pm'],
    ['Dil Diyan Gallan', 'dil diya galla.jpg', 'Dil Diyan Gallan'],
    ['Tere Sang Yara', 'tere sang yara.jpg', 'Rustom - Tere Sang'],
    ['Aadat', 'aadat.jpg', 'Aadat'],
    ['Tajdar E Haram', 'tajdare haram.jpg', 'Coke Studio Season 8 Tajdar'],
    ['Woh Lamhe', 'wo lamhe.jpg', 'wo lamhe'],
    ['Hona Tha Pyaar', 'hona tha pyar.jpg', 'Hona tha pyaar'],
    ['O Meri Laila', 'o meri laila.jpg', 'o meri laila'],
    ['Dil Meri Na Sune', 'dil meri na sunai.jpg', 'dil  meri  na'],
    ['Jeene Laga Hoon', 'jene laga ho.jpg', 'Jeena Laga Hoon'],
    ['Pheli Nazar Mein', 'pheli nazar mai.jpg', 'pheli nazar'],
    ['Piya O Re Piya', 'piya o piya.jpg', 'Atif Aslam, Shreya Ghoshal - Piya'],
    ['Dekhte Dekhte', 'dekhte dekhte.jpg', 'dekhte dekhte'],
    ['Tu Chahiye', 'tu chahiye.jpg', 'Tu Chahiye'],
];
?>
<?php echo $__env->make('user.partials.singer-playlist', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('user.partials.track-player', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\123\OneDrive\Desktop\E-project-Sound\resources\views/user/atifplaylist.blade.php ENDPATH**/ ?>