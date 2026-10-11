<?php $__env->startSection('content'); ?>
<?php
$singer = 'Shreya Ghoshal'; $tagline = 'her most loved songs in one smooth player.';
$tracks = [
    ['Param Sundari', 'param sundari.jpg', 'Param_Sundari'],
    ['Hasi', 'hasi.jpg', 'Hasi Ban Gaye'],
    ['Guli Mata', 'gulli mata.jpg', 'Guli Mata'],
    ['Saathiya', 'saathiya.jpg', 'Sathiya'],
    ['Deewani Mastani', 'dewani.jpg', 'Deewani Mastani'],
    ['Pal Pal Har Pal', 'pal pal har pal.jpg', 'Pal Pal Har Pal'],
    ['O bekhabar', 'bekhbar.jpg', 'O Bekhabar'],
    ['Yimmy Yimmy', 'yimmy.jpg', 'Yimmy Yimmy'],
    ['Manwa lage', 'manwa lagai.jpg', 'Manwa laage'],
    ['BESOS', 'BESOS.jpg', 'BESOS'],
];
?>
<?php echo $__env->make('user.partials.singer-playlist', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('user.partials.track-player', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\LAPVY\Downloads\E-project-Sound-FULL\resources\views/user/shreya.blade.php ENDPATH**/ ?>