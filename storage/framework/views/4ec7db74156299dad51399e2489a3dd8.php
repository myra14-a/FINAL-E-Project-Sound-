<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="SOUND — Play, Stream, Feel">
    <meta name="keywords" content="SOUND, music, songs, Pakistani OST, albums, videos">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sound</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?php echo e(asset('users/css/bootstrap.min.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('users/css/font-awesome.min.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('users/css/barfiller.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('users/css/nowfont.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('users/css/rockville.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('users/css/magnific-popup.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('users/css/owl.carousel.min.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('users/css/slicknav.min.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('users/css/style.css')); ?>" type="text/css">
     <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    

</head>

<body>
    <!-- Global form notifications -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('message') || session('success')): ?>
        <div id="soundNotification" class="sound-notification sound-notification-success" role="alert">
            <i class="fa-solid fa-circle-check"></i>
            <span><?php echo e(session('message') ?? session('success')); ?></span>
            <button type="button" onclick="this.parentElement.remove()" aria-label="Close">&times;</button>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
        <div id="soundNotification" class="sound-notification sound-notification-error" role="alert">
            <i class="fa-solid fa-circle-exclamation"></i>
            <span><?php echo e($errors->first()); ?></span>
            <button type="button" onclick="this.parentElement.remove()" aria-label="Close">&times;</button>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
   <header class="sound-header">

    <!-- LEFT SIDE -->
    <div class="sound-header-left">

       <button class="menu-btn" id="menuBtn">
    ☰
</button>


<!-- SIDEBAR -->
<aside class="sound-sidebar" id="soundSidebar">

    <div class="sidebar-logo">
        <img src="<?php echo e(asset('users/img/weblogo.png')); ?>" alt="SOUND">
    </div>

    <div class="sidebar-menu">

        <a href="/index">
<i class="fa-solid fa-house"></i>            
<span>Home</span>
        </a>

        <a href="/about">
           <i class="fa-solid fa-circle-info"></i>
            <span>About</span>
        </a>

        <a href="/songvideo">
           <i class="fa-solid fa-circle-play"></i>
            <span>Videos</span>
        </a>

        <a href="/blogs">
          <i class="fa-brands fa-blogger"></i>
            <span>Blog</span>
        </a>

        <a href="/contact">
           <i class="fa-solid fa-address-book"></i>
            <span>Contact</span>
        </a>

    </div>

</aside>


<!-- Background Overlay -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

        <div class="sound-logo">
            <a href="/index">
                <img src="<?php echo e(asset('users/img/weblogo.png')); ?>" alt="SOUND">
            </a>
        </div>

    </div>


    <!-- CENTER SEARCH -->
    <div class="sound-search">

        <input
            type="text"
            id="searchInput"
            value="<?php echo e(request('search')); ?>"
            placeholder="Search songs, artists, albums..."
            autocomplete="off"
        >

        <button id="searchBtn" type="button">
           <i class="fa-solid fa-magnifying-glass"></i>
        </button>

        <div id="searchResults" class="sound-search-results" aria-live="polite"></div>

    </div>


    <!-- RIGHT SIDE -->
    <div class="sound-header-right">

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->guest()): ?>
        <a href="<?php echo e(route('register')); ?>" class="signup-link">Sign up</a>
        <a href="<?php echo e(route('login')); ?>" class="login-btn">Login</a>
        <?php else: ?>
        <span class="user-greeting">Hi, <?php echo e(auth()->user()->name); ?></span>
        <form method="POST" action="<?php echo e(route('logout')); ?>" class="header-logout-form">
            <?php echo csrf_field(); ?>
            <button type="submit" class="login-btn header-logout-btn">Logout</button>
        </form>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

       

    </div>

</header>


<!-- ================= SIDEBAR ================= -->

<aside class="sound-sidebar" id="soundSidebar">

    <!-- MAIN -->
    <div class="sidebar-section">

        <a href="/index" class="sidebar-link active">
            <span>⌂</span>
            <p>Home</p>
        </a>

        <a href="<?php echo e(route('songvideo')); ?>" class="sidebar-link">
            <span>▶</span>
            <p>Videos</p>
        </a>

    </div>


    <!-- MUSIC -->
    <div class="sidebar-section">

        <h3>
            Music
            <span>›</span>
        </h3>

        <a href="<?php echo e(url('/index')); ?>#popular-artists" class="sidebar-link">
            <span>🎤</span>
            <p>Popular Artists</p>
        </a>

        <a href="<?php echo e(url('/albumlist')); ?>" class="sidebar-link">
            <span>💿</span>
            <p>Albums</p>
        </a>

        <a href="<?php echo e(url('/index')); ?>" class="sidebar-link">
            <span>📋</span>
            <p>Playlists</p>
        </a>

    </div>


    <!-- YOUR MUSIC -->
    <div class="sidebar-section">

        <h3>
            Your Music
            <span>›</span>
        </h3>

        <a href="<?php echo e(route('media.index')); ?>" class="sidebar-link">
            <span>♥</span>
            <p>Liked Songs</p>
        </a>

        <a href="<?php echo e(route('media.index')); ?>" class="sidebar-link">
            <span>◷</span>
            <p>History</p>
        </a>

    </div>


    <!-- WEBSITE -->
    <div class="sidebar-section">

        <h3>
            Explore
        </h3>

        <a href="/about" class="sidebar-link">
            <span>ⓘ</span>
            <p>About</p>
        </a>

        <a href="/blogs" class="sidebar-link">
            <span>📝</span>
            <p>Blog</p>
        </a>

        <a href="/contact" class="sidebar-link">
            <span>✉</span>
            <p>Contact</p>
        </a>

    </div>


    <!-- OTHER -->
    <div class="sidebar-section">

        <a href="<?php echo e(route('profile.show')); ?>" class="sidebar-link">
            <span>⚙</span>
            <p>Settings</p>
        </a>

    </div>

</aside>


<!-- SIDEBAR OVERLAY -->

<div class="sidebar-overlay" id="sidebarOverlay"></div>


    <!-- Header Section End -->

<?php echo $__env->yieldContent('content'); ?>


     <!-- Footer Section Begin -->
    <footer class="footer footer--normal spad set-bg" data-setbg="<?php echo e(asset('users/img/footer-bg.png')); ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer__address">
                        <ul>
                            <li>
                                <i class="fa fa-phone"></i>
                                <p>Phone</p>
                                <h6>1-677-124-44227</h6>
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i>
                                <p>Email</p>
                                <h6>soundsupport@gmail.com</h6>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-1 col-md-6">
                    <div class="footer__social">
                        <img src="<?php echo e(asset('users/img/weblogo.png')); ?>" alt="" class="logoimg w-50 h-50">
                        <div class="footer__social__links">
                            <a href="https://www.facebook.com/?_rdr"><i class="fa-brands fa-facebook"></i></a>
                            <a href="https://x.com/"><i class="fa-brands fa-square-x-twitter"></i></a>
                            <a href="https://www.instagram.com/?flo=true"><i class="fa-brands fa-square-instagram"></i></a>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6">
                    <div class="footer__newslatter">
                        <h4>Stay With me</h4>
                        <form action="#">
                            <input type="text" placeholder="Email">
                            <button type="submit"><i class="fa fa-send-o"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="<?php echo e(asset('users/js/jquery-3.3.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('users/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('users/js/jquery.magnific-popup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('users/js/jquery.nicescroll.min.js')); ?>"></script>
    <script src="<?php echo e(asset('users/js/jquery.barfiller.js')); ?>"></script>
    <script src="<?php echo e(asset('users/js/jquery.countdown.min.js')); ?>"></script>
    <script src="<?php echo e(asset('users/js/jquery.slicknav.js')); ?>"></script>
    <script src="<?php echo e(asset('users/js/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('users/js/main.js')); ?>"></script>

    <!-- Music Plugin -->
    <script src="<?php echo e(asset('users/js/jquery.jplayer.min.js')); ?>"></script>
    <script src="<?php echo e(asset('users/js/jplayerInit.js')); ?>"></script>

    


<script>
    const menuBtn = document.getElementById("menuBtn");
const soundSidebar = document.getElementById("soundSidebar");
const sidebarOverlay = document.getElementById("sidebarOverlay");


menuBtn.addEventListener("click", function () {

    soundSidebar.classList.toggle("show");

    sidebarOverlay.classList.toggle("show");

});


sidebarOverlay.addEventListener("click", function () {

    soundSidebar.classList.remove("show");

    sidebarOverlay.classList.remove("show");

});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Auto-hide server response notifications.
    const notification = document.getElementById('soundNotification');
    if (notification) {
        setTimeout(() => notification.classList.add('hide'), 4500);
        setTimeout(() => notification.remove(), 5000);
    }

    // Intelligent search suggestions from published music/video records.
    const input = document.getElementById('searchInput');
    const results = document.getElementById('searchResults');
    let timer;
    if (input && results) {
        const render = (items) => {
            if (!items.length) {
                results.innerHTML = '<div class="search-empty">No matching music or video found.</div>';
                results.classList.add('show');
                return;
            }
            results.innerHTML = items.map(item => `
                <a class="search-result-item" href="${item.url}">
                    <span class="search-result-thumb"><img src="${escapeHtml(item.image || '<?php echo e(asset('users/img/weblogo.png')); ?>')}" alt=""></span>
                    <span class="search-result-copy"><strong>${escapeHtml(item.title || '')}</strong><small>${escapeHtml(item.artist || item.album || item.type || '')}</small></span>
                </a>
            `).join('');
            results.classList.add('show');
        };
        const escapeHtml = value => String(value).replace(/[&<>"']/g, c => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#039;'}[c]));
        const search = () => {
            const q = input.value.trim();
            clearTimeout(timer);
            if (!q) { results.innerHTML = ''; results.classList.remove('show'); return; }
            timer = setTimeout(() => {
                fetch(`<?php echo e(route('search')); ?>?q=${encodeURIComponent(q)}`, { headers: { 'Accept': 'application/json' } })
                    .then(response => response.ok ? response.json() : Promise.reject())
                    .then(data => render(data.results || []))
                    .catch(() => {
                        results.innerHTML = '<div class="search-empty">Search is temporarily unavailable.</div>';
                        results.classList.add('show');
                    });
            }, 220);
        };
        input.addEventListener('input', search);
        input.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' && input.value.trim()) {
                window.location.href = `<?php echo e(route('media.index')); ?>?search=${encodeURIComponent(input.value.trim())}`;
            }
        });
        const goToSearch = () => { if (input.value.trim()) window.location.href = `<?php echo e(route('media.index')); ?>?search=${encodeURIComponent(input.value.trim())}`; };
        document.getElementById('searchBtn')?.addEventListener('click', goToSearch);
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.sound-search')) results.classList.remove('show');
        });
    }

    // Admin-uploaded songs on the home page.
    document.querySelectorAll('.dynamic-play-btn').forEach(button => {
        button.addEventListener('click', function () {
            const card = button.closest('.song-card');
            const audio = card ? card.querySelector('.dynamic-song-audio') : null;
            if (!audio) return;
            document.querySelectorAll('.dynamic-song-audio').forEach(other => {
                if (other !== audio) { other.pause(); other.currentTime = 0; }
            });
            const playing = !audio.paused;
            if (playing) {
                audio.pause();
                button.textContent = '▶';
            } else {
                audio.play().then(() => button.textContent = '❚❚').catch(() => {});
            }
            audio.onended = () => button.textContent = '▶';
        });
    });
});
</script>


</body>

</html><?php /**PATH C:\Users\LAPVY\Downloads\E-project-Sound\E-project-Sound-FULL\resources\views/user/layout.blade.php ENDPATH**/ ?>