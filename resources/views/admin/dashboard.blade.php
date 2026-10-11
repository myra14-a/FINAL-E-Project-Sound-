@extends('admin.layout', ['title' => 'Dashboard'])
@section('content')
<div class="page-title">
    <div><h1>Admin Dashboard</h1><p>Everything you need to manage SOUND — music, videos, categories and users.</p></div>
    <a class="btn-admin" href="{{ route('admin.music.create') }}"><i class="fa fa-plus"></i> Add Music</a>
</div>

<div class="stat-grid">
    <div class="stat-card"><div class="stat-icon"><i class="fa fa-headphones"></i></div><div class="value">{{ $musicCount }}</div><div class="label">Music Files</div></div>
    <div class="stat-card"><div class="stat-icon"><i class="fa fa-video-camera"></i></div><div class="value">{{ $videoCount }}</div><div class="label">Video Files</div></div>
    <div class="stat-card"><div class="stat-icon"><i class="fa fa-tags"></i></div><div class="value">{{ $categoryCount }}</div><div class="label">Categories</div></div>
    <div class="stat-card"><div class="stat-icon"><i class="fa fa-users"></i></div><div class="value">{{ $userCount }}</div><div class="label">Users / Logins</div></div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="admin-card">
            <div class="card-heading"><h3>Latest Music</h3><a class="muted" href="{{ route('admin.music.index') }}">View all →</a></div>
            @if($latestMusic->count())
                <div class="responsive-table"><table class="table-admin"><tbody>
                    @foreach($latestMusic as $item)
                        <tr><td><div style="display:flex;align-items:center;gap:12px;"><img class="media-thumb" src="{{ $item->thumbnail_url ?: asset('users/img/weblogo.png') }}" alt=""><div><strong>{{ $item->title }}</strong><br><small class="muted">{{ $item->artist ?: 'Unknown artist' }}</small></div></div></td><td class="text-right"><span class="badge-admin">{{ $item->year ?: '—' }}</span></td></tr>
                    @endforeach
                </tbody></table></div>
            @else <div class="empty">No music added yet.</div> @endif
        </div>
    </div>
    <div class="col-lg-6">
        <div class="admin-card">
            <div class="card-heading"><h3>Latest Videos</h3><a class="muted" href="{{ route('admin.videos.index') }}">View all →</a></div>
            @if($latestVideos->count())
                <div class="responsive-table"><table class="table-admin"><tbody>
                    @foreach($latestVideos as $item)
                        <tr><td><div style="display:flex;align-items:center;gap:12px;"><img class="media-thumb" src="{{ $item->thumbnail_url ?: asset('users/img/weblogo.png') }}" alt=""><div><strong>{{ $item->title }}</strong><br><small class="muted">{{ $item->artist ?: 'Video' }}</small></div></div></td><td class="text-right"><span class="badge-admin">VIDEO</span></td></tr>
                    @endforeach
                </tbody></table></div>
            @else <div class="empty">No videos added yet.</div> @endif
        </div>
    </div>
</div>

<div class="admin-card">
    <div class="card-heading"><h3>Administrator Tools</h3></div>
    <div class="row">
        <div class="col-md-3 mb-3"><a class="btn-outline-admin d-block text-center" href="{{ route('admin.music.create') }}"><i class="fa fa-plus"></i> Add Music</a></div>
        <div class="col-md-3 mb-3"><a class="btn-outline-admin d-block text-center" href="{{ route('admin.videos.create') }}"><i class="fa fa-plus"></i> Add Video</a></div>
        <div class="col-md-3 mb-3"><a class="btn-outline-admin d-block text-center" href="{{ route('admin.categories.index') }}"><i class="fa fa-tags"></i> Manage Categories</a></div>
        <div class="col-md-3 mb-3"><a class="btn-outline-admin d-block text-center" href="{{ route('admin.website.edit') }}"><i class="fa fa-globe"></i> Website Details</a></div>
    </div>
</div>
@endsection
