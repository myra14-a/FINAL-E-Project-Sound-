@extends('admin.layout', ['title' => ucfirst($type)])
@section('content')
@php($routePrefix = $type === 'music' ? 'music' : 'videos')
<div class="page-title">
    <div><h1>{{ ucfirst($type) }} Library</h1><p>Add, edit and remove {{ $type }} files and their information.</p></div>
    <a class="btn-admin" href="{{ route("admin.{$routePrefix}.create") }}"><i class="fa fa-plus"></i> Add {{ ucfirst($type) }}</a>
</div>

<div class="admin-card">
    @if($items->count())
        <div class="responsive-table">
        <table class="table-admin">
            <thead><tr><th>Title</th><th>Artist</th><th>Album</th><th>Year</th><th>Categories</th><th>Status</th><th>Actions</th></tr></thead>
            <tbody>
            @foreach($items as $item)
                <tr>
                    <td><strong>{{ $item->title }}</strong><br><small class="muted">{{ basename($item->file_path) }}</small></td>
                    <td>{{ $item->artist ?: '—' }}</td>
                    <td>{{ $item->album ?: '—' }}</td>
                    <td>{{ $item->year ?: '—' }}</td>
                    <td>@forelse($item->categories as $cat)<span class="badge-admin mr-1">{{ $cat->type }}: {{ $cat->name }}</span>@empty <span class="muted">None</span>@endforelse</td>
                    <td><span class="badge-admin {{ $item->is_published ? 'badge-success' : 'badge-danger' }}">{{ $item->is_published ? 'Published' : 'Hidden' }}</span></td>
                    <td style="white-space:nowrap;">
                        <a class="btn-outline-admin" href="{{ route("admin.{$routePrefix}.edit", $item) }}"><i class="fa fa-pencil"></i></a>
                        <form method="POST" action="{{ route("admin.{$routePrefix}.destroy", $item) }}" style="display:inline;" onsubmit="return confirm('Delete this {{ $type }} permanently?');">
                            @csrf @method('DELETE')
                            <button class="btn-danger-admin" type="submit"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
        @if($items->hasPages())
            <div class="pagination-clean" aria-label="Pagination">
                @for($page=1; $page <= $items->lastPage(); $page++)
                    @if($page === $items->currentPage())<span class="active">{{ $page }}</span>@else<a href="{{ $items->url($page) }}">{{ $page }}</a>@endif
                @endfor
            </div>
        @endif
    @else
        <div class="empty"><i class="fa fa-folder-open-o fa-2x"></i><h4 class="mt-3">No {{ $type }} files yet</h4><p>Add your first file using the button above.</p></div>
    @endif
</div>
@endsection
