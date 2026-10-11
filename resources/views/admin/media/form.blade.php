@extends('admin.layout', ['title' => ($item->exists ? 'Edit ' : 'Add ') . ucfirst($type)])
@section('content')
@php($routePrefix = $type === 'music' ? 'music' : 'videos')
<div class="page-title">
    <div><h1>{{ $item->exists ? 'Edit' : 'Add' }} {{ ucfirst($type) }}</h1><p>Keep your {{ $type }} information organized and ready for the website.</p></div>
    <a class="btn-outline-admin" href="{{ route("admin.{$routePrefix}.index") }}">← Back to Library</a>
</div>

<form method="POST" enctype="multipart/form-data" action="{{ $item->exists ? route("admin.{$routePrefix}.update", $item) : route("admin.{$routePrefix}.store") }}">
    @csrf
    @if($item->exists) @method('PUT') @endif
    <div class="admin-card">
        <div class="form-grid">
            <div class="form-group"><label class="form-label">Title *</label><input class="form-control-admin" name="title" value="{{ old('title', $item->title) }}" required></div>
            <div class="form-group"><label class="form-label">Artist</label><input class="form-control-admin" name="artist" value="{{ old('artist', $item->artist) }}" placeholder="e.g. Atif Aslam"></div>
            <div class="form-group"><label class="form-label">Album</label><input class="form-control-admin" name="album" value="{{ old('album', $item->album) }}" placeholder="Album name"></div>
            <div class="form-group"><label class="form-label">Year</label><input class="form-control-admin" type="number" min="1900" max="2100" name="year" value="{{ old('year', $item->year) }}" placeholder="2026"></div>
            <div class="form-group full"><label class="form-label">Description / Information</label><textarea class="form-control-admin" name="description" placeholder="Add details about this {{ $type }}...">{{ old('description', $item->description) }}</textarea></div>
            <div class="form-group"><label class="form-label">{{ ucfirst($type) }} File {{ $item->exists ? '(leave empty to keep current)' : '*' }}</label><input class="form-control-admin" type="file" name="file" {{ $item->exists ? '' : 'required' }} accept="{{ $type === 'music' ? 'audio/*' : 'video/*' }}">
                <small class="muted">{{ $type === 'music' ? 'MP3, WAV, OGG, M4A — max 50MB' : 'MP4, WEBM, MOV, AVI, MKV — max 200MB' }}</small>
            </div>
            <div class="form-group"><label class="form-label">Thumbnail / Cover</label><input class="form-control-admin" type="file" name="thumbnail" accept="image/jpeg,image/png,image/webp">
                <small class="muted">Optional JPG, PNG or WEBP — max 5MB</small>
            </div>
            <div class="form-group full">
                <label class="form-label">Categories</label>
                <div class="row">
                    @forelse($categories as $typeName => $typeCategories)
                        <div class="col-md-4 mb-3">
                            <div class="muted mb-2" style="font-size:11px;text-transform:uppercase;">{{ $typeName }}</div>
                            @foreach($typeCategories as $category)
                                <label class="check-row mb-2"><input type="checkbox" name="categories[]" value="{{ $category->id }}" {{ $item->categories->contains($category->id) || in_array($category->id, old('categories', [])) ? 'checked' : '' }}> {{ $category->name }}</label>
                            @endforeach
                        </div>
                    @empty
                        <div class="col-12 muted">No categories yet. <a style="color:#d29bff" href="{{ route('admin.categories.index') }}">Create categories first.</a></div>
                    @endforelse
                </div>
            </div>
            <div class="form-group full">
                <label class="check-row"><input type="checkbox" name="is_published" value="1" {{ old('is_published', $item->is_published) ? 'checked' : '' }}> Show this item on the website</label>
            </div>
        </div>
    </div>
    <button class="btn-admin" type="submit"><i class="fa fa-save"></i> {{ $item->exists ? 'Update' : 'Save' }} {{ ucfirst($type) }}</button>
</form>
@endsection
