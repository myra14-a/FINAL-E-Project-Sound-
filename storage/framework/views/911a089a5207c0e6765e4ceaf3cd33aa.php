<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#050308">
    <title>SOUND — Music. Stream. Feel.</title>
    <link rel="stylesheet" href="<?php echo e(asset('users/css/font-awesome.min.css')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500;600;700&display=swap" rel="stylesheet">
    <style>
        :root{color-scheme:dark;--pink:#f000ce;--purple:#6b16ff;--blue:#154dff}
        *{box-sizing:border-box}html,body{margin:0;min-height:100%;background:#030205;color:#fff;font-family:Arial,sans-serif}
        body{min-height:100vh;overflow:hidden;position:relative;display:grid;place-items:center}
        .ambient{position:absolute;inset:0;pointer-events:none;background:radial-gradient(ellipse at 50% 42%,rgba(103,0,190,.24),transparent 46%),radial-gradient(ellipse at 12% 90%,rgba(240,0,206,.12),transparent 35%),#030205}
        .grid{position:absolute;inset:0;opacity:.14;background-image:linear-gradient(rgba(255,255,255,.06) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.06) 1px,transparent 1px);background-size:54px 54px;mask-image:linear-gradient(to bottom,transparent,#000 20%,#000 85%,transparent)}
        .top{position:absolute;top:0;left:0;right:0;display:flex;align-items:center;justify-content:space-between;padding:22px clamp(20px,5vw,76px);z-index:2;border-bottom:1px solid rgba(255,255,255,.08);background:rgba(0,0,0,.25);backdrop-filter:blur(12px)}
        .wordmark{font-family:Rajdhani,Arial,sans-serif;font-size:20px;font-weight:700;letter-spacing:5px;text-transform:uppercase}.status{display:flex;align-items:center;gap:9px;color:#c7bfd2;font-size:12px;letter-spacing:2px;text-transform:uppercase}.dot{width:7px;height:7px;border-radius:50%;background:#e600d5;box-shadow:0 0 14px #e600d5}
        main{position:relative;z-index:1;width:min(900px,92vw);text-align:center;padding:110px 0 60px;animation:rise .8s ease both}
        .logo-frame{width:min(470px,78vw);height:220px;margin:0 auto 8px;display:flex;align-items:center;justify-content:center;filter:drop-shadow(0 0 30px rgba(151,0,255,.18))}.logo-frame img{display:block;width:100%;height:100%;object-fit:contain}
        .eyebrow{font-size:12px;letter-spacing:5px;text-transform:uppercase;color:#d9b9ff;margin:0 0 14px}.headline{font-family:Rajdhani,Arial,sans-serif;font-weight:700;text-transform:uppercase;font-size:clamp(35px,6vw,66px);line-height:.98;letter-spacing:2px;margin:0 auto 18px;max-width:780px}.headline span{background:linear-gradient(90deg,#ff36d2,#a21bff 48%,#3278ff);-webkit-background-clip:text;background-clip:text;color:transparent}.sub{color:#a9a2b4;font-size:15px;line-height:1.8;max-width:540px;margin:0 auto 35px}
        .actions{display:flex;justify-content:center;gap:16px;flex-wrap:wrap}.btn{min-width:175px;display:inline-flex;align-items:center;justify-content:center;gap:10px;padding:15px 25px;border-radius:7px;text-decoration:none;text-transform:uppercase;font-family:Rajdhani,Arial,sans-serif;font-size:16px;font-weight:700;letter-spacing:2px;transition:transform .2s,box-shadow .2s,border-color .2s}.btn:hover{transform:translateY(-3px)}.primary{color:white;background:linear-gradient(100deg,#f000c9,#701cff 60%,#244cff);box-shadow:0 8px 35px rgba(155,0,255,.27)}.secondary{color:white;border:1px solid rgba(211,163,255,.55);background:rgba(255,255,255,.035)}.secondary:hover{border-color:#f000ce;box-shadow:0 0 22px rgba(240,0,206,.17)}
        .bottom{position:absolute;bottom:22px;left:20px;right:20px;text-align:center;color:#5f5969;font-size:10px;letter-spacing:3px;text-transform:uppercase}.equalizer{display:flex;align-items:center;justify-content:center;gap:5px;height:30px;margin:0 auto 22px}.equalizer i{display:block;width:4px;border-radius:9px;background:linear-gradient(to top,#4b37ff,#f000ce);animation:wave 1s ease-in-out infinite alternate}.equalizer i:nth-child(1),.equalizer i:nth-child(7){height:10px}.equalizer i:nth-child(2),.equalizer i:nth-child(6){height:20px;animation-delay:.2s}.equalizer i:nth-child(3),.equalizer i:nth-child(5){height:15px;animation-delay:.4s}.equalizer i:nth-child(4){height:28px;animation-delay:.1s}
        @keyframes wave{to{transform:scaleY(.55);opacity:.65}}@keyframes rise{from{opacity:0;transform:translateY(15px)}to{opacity:1;transform:translateY(0)}}
        @media(max-width:600px){.top{padding:17px 20px}.status{font-size:9px;letter-spacing:1px}.wordmark{font-size:16px;letter-spacing:3px}main{padding-top:90px}.logo-frame{width:min(94vw,420px);height:170px;margin-bottom:8px}.eyebrow{font-size:10px;letter-spacing:3px}.sub{font-size:13px;padding:0 10px}.btn{width:min(100%,290px)}.actions{gap:11px}.bottom{font-size:8px;letter-spacing:2px}}
    </style>
</head>
<body>
    <div class="ambient"></div><div class="grid"></div>
    <header class="top"><div class="wordmark">SOUND</div><div class="status"><span class="dot"></span> Your music universe</div></header>
    <main>
        <div class="logo-frame"><img src="<?php echo e(asset('users/img/logo.png')); ?>" alt="SOUND — Play • Stream • Feel"></div>
        <div class="equalizer" aria-hidden="true"><i></i><i></i><i></i><i></i><i></i><i></i><i></i></div>
        <p class="eyebrow">Your world. Your rhythm.</p>
        <h1 class="headline">Feel every beat.<br><span>Live every sound.</span></h1>
        <p class="sub">Discover music, explore videos, and find the soundtrack for every mood — all in one place.</p>
        <div class="actions">
            <a class="btn primary" href="<?php echo e(route('register')); ?>"><i class="fa fa-user-plus"></i> Sign Up</a>
            <a class="btn secondary" href="<?php echo e(route('login')); ?>"><i class="fa fa-sign-in"></i> Log In</a>
        </div>
    </main>
    <footer class="bottom">SOUND &nbsp;•&nbsp; PLAY &nbsp;•&nbsp; STREAM &nbsp;•&nbsp; FEEL</footer>
</body>
</html>
<?php /**PATH C:\Users\LAPVY\Downloads\E-project-Sound-FULL\resources\views/auth/landing.blade.php ENDPATH**/ ?>