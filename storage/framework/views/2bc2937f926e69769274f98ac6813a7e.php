<?php $__env->startSection('content'); ?>
<?php
$singer = 'Honey Singh'; $tagline = 'his most loved songs in one smooth player.';
$tracks = [
    ['Jatt Mehkma', 'jat mehkma.jpg', 'Jatt Mehkma'],
    ['Laal Pari', 'laal pari.jpg', 'LAAL PARI'],
    ['Blue Eyes', 'blue eyes.jpg', 'Blue Eyes'],
    ['Bonita', 'bonita.jpg', 'Bonita'],
    ['Lungi Dance', 'lungi dance.jpg', 'Lungi Dance'],
    ['Millionaire', 'MILLIONAIRE.jpg', 'MILLIONARE'],
    ['Love Doose', 'love doose.jpg', 'LOVE DOSE'],
    ['Payal', 'payal.jpg', 'PAYAL'],
    ['Casa Tupka Anthemo', 'Casa Tupka Anthemo.jpg', 'Casa Tupka'],
    ['Rooh', 'rooh.jpg', 'ROOH'],
];
?>
<?php echo $__env->make('user.partials.singer-playlist', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('user.partials.track-player', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\123\OneDrive\Desktop\E-project-Sound\resources\views/user/honey.blade.php ENDPATH**/ ?>