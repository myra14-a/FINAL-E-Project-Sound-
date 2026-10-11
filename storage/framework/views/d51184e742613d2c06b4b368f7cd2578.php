<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(config('app.name', 'SOUND')); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('users/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('users/css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('users/css/nowfont.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('users/css/rockville.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('users/css/style.css')); ?>">
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

    <style>
        /* Auth screens intentionally reuse the public Index/SOUND visual system. */
        html, body { min-height:100%; }
        body { margin:0; background:#000; color:#fff; font-family:"Now Regular", Arial, sans-serif; -webkit-font-smoothing:antialiased; }
        .auth-page {
            min-height:100vh;
            position:relative;
            display:flex;
            align-items:center;
            justify-content:center;
            padding:125px 18px 70px;
            overflow:hidden;
            background:#000 url('<?php echo e(asset('users/img/hero-bg.png')); ?>') center top / cover no-repeat;
        }
        .auth-page:before {
            content:"";
            position:absolute;
            inset:0;
            background:rgba(0,0,0,.55);
            pointer-events:none;
        }
        .auth-page:after {
            content:"";
            position:absolute;
            inset:0;
            background:linear-gradient(180deg,rgba(42,1,74,.32) 0%,rgba(0,0,0,.30) 45%,rgba(0,0,0,.82) 100%);
            pointer-events:none;
        }
        .auth-header {
            position:absolute;
            left:0;
            top:0;
            width:100%;
            min-height:88px;
            z-index:3;
            background:rgba(42,1,74,.5);
            border-bottom:1px solid rgba(255,255,255,.08);
        }
        .auth-header-inner {
            width:min(1140px, calc(100% - 36px));
            min-height:88px;
            margin:0 auto;
            display:flex;
            align-items:center;
            justify-content:space-between;
        }
        .auth-header-logo { display:flex; align-items:center; height:78px; }
        .auth-header-logo img { width:170px; height:76px; object-fit:contain; }
        .auth-home-link {
            color:#fff;
            text-transform:uppercase;
            font-size:15px;
            letter-spacing:1px;
            text-decoration:none;
            border-bottom:2px solid transparent;
            padding:6px 0;
        }
        .auth-home-link:hover { color:#fff; border-bottom-color:#fff; }
        .auth-wrap { width:100%; max-width:510px; position:relative; z-index:2; }
        .auth-brand { text-align:center; margin-bottom:18px; }
        .auth-brand img { width:min(310px,72vw); height:auto; max-height:150px; object-fit:contain; }
        .auth-card {
            background:rgba(8,8,8,.86);
            border:1px solid rgba(255,255,255,.18);
            border-radius:0;
            padding:34px 34px 30px;
            box-shadow:0 18px 60px rgba(0,0,0,.55);
        }
        .auth-heading { text-align:center; margin-bottom:25px; }
        .auth-heading h1 {
            font-size:38px;
            line-height:1.1;
            margin:0 0 10px;
            font-weight:700;
            color:#fff;
            font-family:"Rajdhani", sans-serif;
            text-transform:uppercase;
            letter-spacing:1px;
        }
        .auth-heading p { margin:0; color:#fff; font-size:15px; line-height:26px; }
        .auth-label { display:block; color:#fff; font-family:"Rajdhani",sans-serif; font-size:16px; font-weight:600; margin-bottom:7px; }
        .auth-input {
            display:block;
            width:100%;
            height:48px;
            padding:10px 14px;
            border-radius:0;
            border:1px solid rgba(255,255,255,.22);
            background:rgba(255,255,255,.07);
            color:#fff;
            outline:none;
            font-family:"Now Regular",Arial,sans-serif;
            transition:.2s;
        }
        .auth-input:focus { border-color:#5c00ce; box-shadow:0 0 0 2px rgba(92,0,206,.2); background:rgba(255,255,255,.10); }
        .auth-input::placeholder { color:rgba(255,255,255,.55); }
        .auth-field { margin-bottom:18px; }
        .auth-check { display:flex; align-items:center; gap:8px; color:#fff; font-size:14px; }
        .auth-check input { accent-color:#5c00ce; }
        .auth-row { display:flex; align-items:center; justify-content:space-between; gap:12px; margin-top:23px; }
        .auth-link { color:#fff; text-decoration:none; font-size:14px; }
        .auth-link:hover { color:#fff; text-decoration:underline; }
        .auth-button {
            border:0;
            border-radius:0;
            padding:14px 30px 12px;
            color:#fff;
            font-family:"Now Regular",Arial,sans-serif;
            font-size:15px;
            font-weight:700;
            letter-spacing:2px;
            text-transform:uppercase;
            background:#5c00ce;
            box-shadow:none;
            cursor:pointer;
        }
        .auth-button:hover { background:#7000f5; color:#fff; }
        .auth-errors { margin-bottom:18px; padding:12px 14px; color:#fff; background:rgba(244,67,54,.15); border-left:3px solid #f44336; font-size:14px; }
        .auth-status { margin-bottom:18px; padding:12px 14px; color:#fff; background:rgba(92,0,206,.16); border-left:3px solid #5c00ce; font-size:14px; }
        .auth-footer { text-align:center; margin-top:20px; color:#fff; font-size:14px; }
        .auth-divider { height:1px; background:rgba(255,255,255,.14); margin:24px 0; }
        .auth-required { color:#f44336; }
        @media(max-width:600px){
            .auth-page{padding:112px 14px 40px}
            .auth-card{padding:25px 20px}
            .auth-heading h1{font-size:31px}
            .auth-row{flex-direction:column;align-items:stretch}
            .auth-button{width:100%}
        }
    </style>
</head>
<body>
    <div class="auth-page">
        <div class="auth-header">
            <div class="auth-header-inner">
                <a class="auth-header-logo" href="<?php echo e(route('welcome')); ?>"><img src="<?php echo e(asset('users/img/logo.png')); ?>" alt="SOUND logo"></a>
                <a class="auth-home-link" href="<?php echo e(route('welcome')); ?>">Home</a>
            </div>
        </div>
        <div class="auth-wrap">
            <div class="auth-brand">
                <a href="<?php echo e(route('welcome')); ?>"><img src="<?php echo e(asset('users/img/logo.png')); ?>" alt="SOUND logo"></a>
            </div>
            <?php echo e($slot); ?>

        </div>
    </div>
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

</body>
</html>
<?php /**PATH C:\Users\LAPVY\Downloads\E-project-Sound-FULL\resources\views/layouts/guest.blade.php ENDPATH**/ ?>