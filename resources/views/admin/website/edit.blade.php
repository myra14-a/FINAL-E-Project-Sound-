@extends('admin.layout', ['title' => 'Website Details'])
@section('content')
<div class="page-title"><div><h1>Website Details</h1><p>Manage the main text and contact/social information shown across the website.</p></div></div>

<form method="POST" action="{{ route('admin.website.update') }}">
    @csrf @method('PUT')
    <div class="admin-card">
        <div class="card-heading"><h3>Brand & Hero</h3></div>
        <div class="form-grid">
            <div class="form-group"><label class="form-label">Website Name *</label><input class="form-control-admin" name="site_name" value="{{ old('site_name', $settings->site_name) }}" required></div>
            <div class="form-group"><label class="form-label">Tagline</label><input class="form-control-admin" name="tagline" value="{{ old('tagline', $settings->tagline) }}"></div>
            <div class="form-group"><label class="form-label">Hero Title *</label><input class="form-control-admin" name="hero_title" value="{{ old('hero_title', $settings->hero_title) }}" required></div>
            <div class="form-group"><label class="form-label">Hero Subtitle</label><input class="form-control-admin" name="hero_subtitle" value="{{ old('hero_subtitle', $settings->hero_subtitle) }}"></div>
            <div class="form-group full"><label class="form-label">Hero Description</label><textarea class="form-control-admin" name="hero_description">{{ old('hero_description', $settings->hero_description) }}</textarea></div>
        </div>
    </div>
    <div class="admin-card">
        <div class="card-heading"><h3>Contact & Footer</h3></div>
        <div class="form-grid">
            <div class="form-group"><label class="form-label">Phone</label><input class="form-control-admin" name="phone" value="{{ old('phone', $settings->phone) }}"></div>
            <div class="form-group"><label class="form-label">Email</label><input class="form-control-admin" type="email" name="email" value="{{ old('email', $settings->email) }}"></div>
            <div class="form-group full"><label class="form-label">Footer Text</label><textarea class="form-control-admin" name="footer_text">{{ old('footer_text', $settings->footer_text) }}</textarea></div>
        </div>
    </div>
    <div class="admin-card">
        <div class="card-heading"><h3>Social Links</h3></div>
        <div class="form-grid">
            <div class="form-group"><label class="form-label">Facebook URL</label><input class="form-control-admin" name="facebook_url" value="{{ old('facebook_url', $settings->facebook_url) }}"></div>
            <div class="form-group"><label class="form-label">Instagram URL</label><input class="form-control-admin" name="instagram_url" value="{{ old('instagram_url', $settings->instagram_url) }}"></div>
            <div class="form-group"><label class="form-label">Twitter / X URL</label><input class="form-control-admin" name="twitter_url" value="{{ old('twitter_url', $settings->twitter_url) }}"></div>
            <div class="form-group"><label class="form-label">YouTube URL</label><input class="form-control-admin" name="youtube_url" value="{{ old('youtube_url', $settings->youtube_url) }}"></div>
        </div>
    </div>
    <button class="btn-admin" type="submit"><i class="fa fa-save"></i> Save Website Details</button>
</form>
@endsection
