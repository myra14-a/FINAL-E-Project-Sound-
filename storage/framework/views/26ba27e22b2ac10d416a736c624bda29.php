<?php $__env->startSection('content'); ?>
<?php
$singer = 'Arijit Singh'; $tagline = 'his most loved songs in one smooth player.';
$tracks = [
    ['Agar Tum Saath Ho', 'finder her.jpg', 'Agar Tum Saath Ho'],
    ['Sitaare', 'gal sun.jpg', 'Sitaare'],
    ['Darkhast', 'darkhast.png', 'Arijit Singh - Darkhaast'],
    ['Gehra Huwa', 'gehra huwa.jpg', 'Gehra Hua'],
    ['Heeriye', 'heeriye.jpg'],
    ['Humdard', 'humdard.jpg', 'Humdard'],
    ['Ilahi', 'ilahi.jpg', 'Ilahi song'],
    ['Keseriya', 'keserya.jpg', 'Kesariya'],
    ['Sanam Re', 'sanam re.jpg', 'Sanam Re'],
    ['Satranga', 'satranga.jpg', 'Satranga'],
    ['Sooraj Dooba Hain', 'soraj dooba h.jpg', 'SOORAJ DOOBA'],
    ['Rabta', 'rabta.jpg', 'Arijit Singh - Raabta'],
    ['Tujhe Kitna Chane Lage Hum', 'tujhe kitna chane lagai.jpg', 'Tujhe kitna'],
    ['Chaleya', 'chaleya.jpg', 'Chaleya'],
];
?>
<?php echo $__env->make('user.partials.singer-playlist', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('user.partials.track-player', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\LAPVY\Downloads\E-project-Sound-FULL\resources\views/user/arijitplaylist.blade.php ENDPATH**/ ?>