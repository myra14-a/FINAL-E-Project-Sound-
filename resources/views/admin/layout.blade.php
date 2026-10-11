<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Panel' }} | {{ config('app.name', 'SOUND') }}</title>
    <link rel="stylesheet" href="{{ asset('users/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('users/css/font-awesome.min.css') }}">
    <style>
        :root {
            --admin-bg:#09070d; --admin-panel:#121019; --admin-panel-2:#191521;
            --admin-border:rgba(255,255,255,.08); --admin-text:#f8f7fb; --admin-muted:#9b95a7;
            --admin-accent:#b86bff; --admin-accent-2:#ff4fd8; --admin-success:#36d399; --admin-danger:#ff5c7c;
        }
        * { box-sizing:border-box; }
        body { margin:0; background:var(--admin-bg); color:var(--admin-text); font-family:Arial, sans-serif; }
        a { color:inherit; text-decoration:none; }
        .admin-shell { min-height:100vh; display:flex; }
        .admin-sidebar { width:270px; flex:none; min-height:100vh; background:linear-gradient(180deg,#15111d 0%,#0d0a12 100%); border-right:1px solid var(--admin-border); padding:26px 16px; position:sticky; top:0; height:100vh; }
        .brand { display:flex; align-items:center; justify-content:center; padding:2px 8px 26px; }
        .brand-mark { width:100%; max-width:225px; height:88px; display:flex; align-items:center; justify-content:flex-start; overflow:hidden; }
        .brand-mark img { width:100%; max-height:88px; object-fit:contain; object-position:left center; }
        .brand strong { font-size:21px; letter-spacing:.5px; }
        .brand small { display:block; color:var(--admin-muted); font-size:11px; margin-top:2px; }
        .nav-label { color:#6e6879; text-transform:uppercase; letter-spacing:1.3px; font-size:10px; padding:14px 12px 8px; }
        .admin-nav a { display:flex; align-items:center; gap:12px; padding:12px 13px; border-radius:11px; color:#b8b2c3; margin:3px 0; transition:.2s; }
        .admin-nav a:hover,.admin-nav a.active { background:rgba(184,107,255,.13); color:#fff; }
        .admin-nav i { width:18px; text-align:center; color:#9e72d1; }
        .sidebar-bottom { position:absolute; left:16px; right:16px; bottom:20px; }
        .sidebar-bottom a { display:block; padding:10px 12px; color:var(--admin-muted); font-size:13px; }
        .admin-main { min-width:0; flex:1; }
        .admin-topbar { height:72px; display:flex; align-items:center; justify-content:space-between; padding:0 30px; border-bottom:1px solid var(--admin-border); background:rgba(9,7,13,.85); }
        .admin-topbar .crumb { color:var(--admin-muted); font-size:13px; }
        .admin-topbar .user-pill { padding:8px 12px; border:1px solid var(--admin-border); border-radius:999px; font-size:13px; }
        .admin-content { padding:32px; max-width:1540px; }
        .page-title { display:flex; align-items:flex-end; justify-content:space-between; gap:20px; margin-bottom:24px; }
        .page-title h1 { font-size:31px; margin:0 0 6px; font-weight:700; }
        .page-title p { margin:0; color:var(--admin-muted); }
        .btn-admin { border:0; border-radius:10px; padding:10px 16px; font-weight:700; color:#fff; background:linear-gradient(135deg,var(--admin-accent),var(--admin-accent-2)); box-shadow:0 8px 22px rgba(184,107,255,.18); }
        .btn-admin:hover { color:#fff; opacity:.92; }
        .btn-outline-admin { border:1px solid var(--admin-border); background:var(--admin-panel); color:#ddd7e5; border-radius:9px; padding:9px 13px; }
        .btn-danger-admin { border:1px solid rgba(255,92,124,.25); background:rgba(255,92,124,.09); color:#ff9db2; border-radius:9px; padding:8px 12px; }
        .stat-grid { display:grid; grid-template-columns:repeat(4,minmax(0,1fr)); gap:16px; margin-bottom:24px; }
        .stat-card,.admin-card { background:linear-gradient(145deg,rgba(25,21,33,.98),rgba(12,9,16,.98)); border:1px solid var(--admin-border); border-radius:18px; box-shadow:0 18px 45px rgba(0,0,0,.16); }
        .stat-card { padding:22px; position:relative; overflow:hidden; }
        .stat-card:after { content:""; position:absolute; width:100px; height:100px; border-radius:50%; right:-35px; top:-35px; background:rgba(184,107,255,.08); }
        .stat-icon { width:42px;height:42px;border-radius:12px;display:grid;place-items:center;background:rgba(184,107,255,.13);color:#d49cff;margin-bottom:18px; }
        .stat-card .value { font-size:31px; font-weight:800; }
        .stat-card .label { color:var(--admin-muted); font-size:13px; margin-top:3px; }
        .admin-card { padding:22px; margin-bottom:20px; }
        .card-heading { display:flex; align-items:center; justify-content:space-between; margin-bottom:18px; }
        .card-heading h3 { margin:0; font-size:18px; }
        .table-admin { width:100%; border-collapse:collapse; }
        .table-admin th { color:#7f788b; text-transform:uppercase; letter-spacing:.7px; font-size:10px; font-weight:700; padding:12px 10px; border-bottom:1px solid var(--admin-border); text-align:left; }
        .table-admin td { padding:14px 10px; border-bottom:1px solid rgba(255,255,255,.05); color:#ddd9e2; vertical-align:middle; }
        .table-admin tr:last-child td { border-bottom:0; }
        .muted { color:var(--admin-muted)!important; }
        .badge-admin { display:inline-block; padding:5px 9px; border-radius:999px; background:rgba(184,107,255,.12); color:#d6a8ff; font-size:11px; font-weight:700; }
        .badge-success { background:rgba(54,211,153,.10); color:#69e5b4; }
        .badge-danger { background:rgba(255,92,124,.10); color:#ff9db2; }
        .form-grid { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:18px; }
        .form-group { margin-bottom:0; }
        .form-group.full { grid-column:1/-1; }
        .form-label { display:block; color:#c8c2d0; font-size:12px; font-weight:700; margin-bottom:7px; }
        .form-control-admin,.form-select-admin { width:100%; background:#0c0910; border:1px solid var(--admin-border); border-radius:9px; color:#f7f3fa; padding:11px 12px; outline:0; }
        .form-control-admin:focus,.form-select-admin:focus { border-color:rgba(184,107,255,.55); box-shadow:0 0 0 3px rgba(184,107,255,.08); }
        textarea.form-control-admin { min-height:115px; resize:vertical; }
        .check-row { display:flex; gap:10px; align-items:center; color:#c9c3d0; font-size:13px; }
        .alert-admin { padding:12px 15px; border-radius:10px; margin-bottom:18px; background:rgba(54,211,153,.09); color:#74e8bd; border:1px solid rgba(54,211,153,.16); }
        .alert-error { background:rgba(255,92,124,.09); color:#ff9db2; border-color:rgba(255,92,124,.16); }
        .empty { text-align:center; padding:45px 15px; color:var(--admin-muted); }
        .media-thumb { width:48px;height:48px;border-radius:9px;object-fit:cover;background:#211b2a; }
        .pagination-wrap { margin-top:18px; }
        .pagination { margin:0; gap:5px; }
        .pagination .page-link { background:#14101a; color:#c8c2d0; border-color:var(--admin-border); border-radius:8px!important; }
        .pagination .active .page-link { background:#a66be0; border-color:#a66be0; color:#fff; }
        .responsive-table { overflow-x:auto; }
        .admin-card + .admin-card { margin-top:20px; }
        .admin-nav a, .btn-admin, .btn-outline-admin, .btn-danger-admin, .sidebar-bottom a, .sidebar-bottom button { cursor:pointer; }
        .admin-nav a:focus-visible, .btn-admin:focus-visible, .btn-outline-admin:focus-visible, .btn-danger-admin:focus-visible { outline:2px solid #d39cff; outline-offset:2px; }
        .pagination-clean { display:flex; align-items:center; gap:7px; margin-top:20px; flex-wrap:wrap; }
        .pagination-clean a, .pagination-clean span { min-width:38px; height:38px; padding:0 11px; display:inline-flex; align-items:center; justify-content:center; border-radius:10px; border:1px solid var(--admin-border); background:#14101a; color:#cfc8d9; font-size:13px; font-weight:700; }
        .pagination-clean a:hover { color:#fff; border-color:rgba(184,107,255,.45); background:rgba(184,107,255,.12); }
        .pagination-clean .active { color:#fff; background:linear-gradient(135deg,var(--admin-accent),var(--admin-accent-2)); border-color:transparent; }
        .pagination-clean .disabled { opacity:.35; pointer-events:none; }
        .admin-sidebar:after { content:""; position:absolute; left:18px; right:18px; top:118px; height:1px; background:linear-gradient(90deg,transparent,rgba(184,107,255,.25),transparent); }
        @media(max-width:1000px){ .admin-sidebar{width:78px;padding:20px 10px}.brand div:last-child,.nav-label,.admin-nav span,.sidebar-bottom span{display:none}.brand{padding:0 8px 22px}.admin-nav a{justify-content:center}.sidebar-bottom{left:8px;right:8px}.stat-grid{grid-template-columns:repeat(2,1fr)}}
        @media(max-width:700px){ .admin-sidebar{display:none}.admin-content{padding:20px 15px}.admin-topbar{padding:0 15px}.form-grid{grid-template-columns:1fr}.stat-grid{grid-template-columns:1fr 1fr}.page-title{align-items:flex-start;flex-direction:column}.page-title .btn-admin{width:100%}}
    </style>
</head>
<body>
@if(session('success') || session('message') || $errors->any())
<div class="sound-notification sound-notification-{{ $errors->any() ? 'error' : 'success' }}" id="adminNotification"><i class="fa-solid {{ $errors->any() ? 'fa-circle-exclamation' : 'fa-circle-check' }}"></i><span>{{ $errors->first() ?: (session('success') ?? session('message')) }}</span><button type="button" onclick="this.parentElement.remove()">&times;</button></div>
@endif
<div class="admin-shell">
    <aside class="admin-sidebar">
        <a class="brand" href="{{ route('admin.dashboard') }}">
            <span class="brand-mark"><img src="{{ asset('users/img/logo.png') }}" alt="SOUND logo"></span>
        </a>

        <div class="nav-label">Overview</div>
        <nav class="admin-nav">
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
        </nav>

        <div class="nav-label">Media</div>
        <nav class="admin-nav">
            <a href="{{ route('admin.music.index') }}" class="{{ request()->routeIs('admin.music.*') ? 'active' : '' }}"><i class="fa fa-headphones"></i><span>Music</span></a>
            <a href="{{ route('admin.videos.index') }}" class="{{ request()->routeIs('admin.videos.*') ? 'active' : '' }}"><i class="fa fa-video-camera"></i><span>Videos</span></a>
            <a href="{{ route('admin.categories.index') }}" class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}"><i class="fa fa-tags"></i><span>Categories</span></a>
        </nav>

        <div class="nav-label">Management</div>
        <nav class="admin-nav">
            <a href="{{ route('admin.users.index') }}" class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}"><i class="fa fa-users"></i><span>Users & Logins</span></a>
            <a href="{{ route('admin.website.edit') }}" class="{{ request()->routeIs('admin.website.*') ? 'active' : '' }}"><i class="fa fa-globe"></i><span>Website Details</span></a>
        </nav>

        <div class="sidebar-bottom">
            <a href="{{ url('/index') }}" target="_blank"><i class="fa fa-external-link"></i> <span>View Website</span></a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" style="background:none;border:0;color:#8f899a;padding:10px 12px;width:100%;text-align:left;"><i class="fa fa-sign-out"></i> <span>Logout</span></button>
            </form>
        </div>
    </aside>

    <main class="admin-main">
        <header class="admin-topbar">
            <div class="crumb">Administrator / {{ $title ?? 'Dashboard' }}</div>
            <div class="user-pill"><i class="fa fa-user-circle-o"></i> {{ auth()->user()->name }}</div>
        </header>

        <section class="admin-content">
            @if(session('success'))
                <div class="alert-admin">{{ session('success') }}</div>
            @endif
            @if($errors->any())
                <div class="alert-admin alert-error">
                    <strong>Please fix these fields:</strong>
                    <ul style="margin:7px 0 0 18px;">
                        @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                    </ul>
                </div>
            @endif
            @yield('content')
        </section>
    </main>
</div>
<script>setTimeout(function(){var n=document.getElementById("adminNotification");if(n){n.classList.add("hide");setTimeout(function(){n.remove()},500)}},4500);</script>
</body>
</html>
