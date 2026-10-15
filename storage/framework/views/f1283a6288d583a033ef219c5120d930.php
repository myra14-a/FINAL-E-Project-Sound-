<?php $__env->startSection('content'); ?>
<?php
$singer = 'Talha Anjum'; $tagline = 'his most loved songs in one smooth player.';
$tracks = [
    ['Karachi Chal', 'karachi chal.jpg', 'KARACHI CHAL'],
    ['Sabar', 'sabar.jpg', 'SABAR'],
    ['Afsanay', 'AFSANAY.jpg', 'AFSANAY'],
    ['Gumaan', 'GUMAAN.jpg', 'GUMAAN'],
    ['4AM In Karachi', '4am karachi.jpg', '4AM in Karachi'],
    ['Downers At Dusk', 'downers at dusk.jpg', 'Downers At Dusk'],
    ['Heartbreak Kid', 'Heartbreak Kid.jpg', 'Talha Anjum - Heartbreak'],
    ['Departure Lane', 'departure lane.jpg', 'Talha Anjum - Departure'],
    ['Ye Duniya', 'duniya.jpg', 'Coke Studio  Season 14  Ye Dunya'],
    ['Phir Milenge', 'phr milenge.jpg', 'Coke Studio  Season 14  Phir Milenge'],
];
?>
<?php echo $__env->make('user.partials.singer-playlist', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('user.partials.track-player', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\123\OneDrive\Desktop\E-project-Sound\resources\views/user/talha anjum.blade.php ENDPATH**/ ?>