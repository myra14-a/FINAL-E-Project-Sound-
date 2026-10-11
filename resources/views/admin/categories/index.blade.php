@extends('admin.layout', ['title' => 'Categories'])
@section('content')
<div class="page-title"><div><h1>Categories</h1><p>Create reusable filters such as YEAR, ARTIST, ALBUM, GENRE and more.</p></div></div>

<div class="row">
    <div class="col-lg-4">
        <div class="admin-card">
            <div class="card-heading"><h3>Add Category</h3></div>
            <form method="POST" action="{{ route('admin.categories.store') }}">
                @csrf
                <div class="form-group mb-3"><label class="form-label">Category Type *</label><input class="form-control-admin" name="type" placeholder="YEAR / ARTIST / ALBUM / GENRE" required></div>
                <div class="form-group mb-3"><label class="form-label">Category Name *</label><input class="form-control-admin" name="name" placeholder="e.g. 2026 or Atif Aslam" required></div>
                <button class="btn-admin" type="submit">Create Category</button>
            </form>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="admin-card">
            <div class="card-heading"><h3>Category List</h3><span class="muted">{{ $categories->total() }} total</span></div>
            @if($categories->count())
            <div class="responsive-table"><table class="table-admin"><thead><tr><th>Type</th><th>Name</th><th>Used by</th><th>Actions</th></tr></thead><tbody>
            @foreach($categories as $category)
                <tr>
                    <td><span class="badge-admin">{{ $category->type }}</span></td>
                    <td><strong>{{ $category->name }}</strong></td>
                    <td class="muted">{{ $category->mediaItems()->count() }} media</td>
                    <td>
                        <details>
                            <summary class="btn-outline-admin" style="display:inline-block;cursor:pointer;">Edit</summary>
                            <form method="POST" action="{{ route('admin.categories.update', $category) }}" class="mt-3">
                                @csrf @method('PUT')
                                <div class="row">
                                    <div class="col-md-5"><input class="form-control-admin" name="type" value="{{ $category->type }}" required></div>
                                    <div class="col-md-5"><input class="form-control-admin" name="name" value="{{ $category->name }}" required></div>
                                    <div class="col-md-2 mt-2 mt-md-0"><button class="btn-admin" type="submit">Save</button></div>
                                </div>
                            </form>
                        </details>
                        <form method="POST" action="{{ route('admin.categories.destroy', $category) }}" style="display:inline;" onsubmit="return confirm('Delete this category?');">
                            @csrf @method('DELETE') <button class="btn-danger-admin" type="submit"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody></table></div>
            <div class="pagination-wrap">{{ $categories->links() }}</div>
            @else <div class="empty">No categories created yet.</div> @endif
        </div>
    </div>
</div>
@endsection
