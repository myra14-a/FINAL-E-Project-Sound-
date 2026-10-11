@extends('admin.layout', ['title' => 'Users & Logins'])
@section('content')
<div class="page-title"><div><h1>Users & Logins</h1><p>Create accounts, change login details and control administrator access.</p></div></div>

<div class="row">
    <div class="col-lg-5">
        <div class="admin-card">
            <div class="card-heading"><h3>Create User</h3></div>
            <form method="POST" action="{{ route('admin.users.store') }}">
                @csrf
                <div class="form-group mb-3"><label class="form-label">Name *</label><input class="form-control-admin" name="name" required></div>
                <div class="form-group mb-3"><label class="form-label">User ID *</label><input class="form-control-admin" name="username" required></div>
                <div class="form-group mb-3"><label class="form-label">Address *</label><input class="form-control-admin" name="address" required></div>
                <div class="form-group mb-3"><label class="form-label">Phone *</label><input class="form-control-admin" name="phone" required></div>
                <div class="form-group mb-3"><label class="form-label">Email / Login *</label><input class="form-control-admin" type="email" name="email" required></div>
                <div class="form-group mb-3"><label class="form-label">Password *</label><input class="form-control-admin" type="password" name="password" required></div>
                <div class="form-group mb-3"><label class="form-label">Confirm Password *</label><input class="form-control-admin" type="password" name="password_confirmation" required></div>
                <label class="check-row mb-3"><input type="checkbox" name="is_admin" value="1"> Administrator access</label>
                <button class="btn-admin" type="submit">Create Login</button>
            </form>
        </div>
    </div>
    <div class="col-lg-7">
        <div class="admin-card">
            <div class="card-heading"><h3>All Users</h3></div>
            <div class="responsive-table"><table class="table-admin"><thead><tr><th>User</th><th>Role</th><th>Actions</th></tr></thead><tbody>
            @foreach($users as $user)
                <tr>
                    <td><strong>{{ $user->name }}</strong><br><small class="muted">ID: {{ $user->username }} · {{ $user->email }}</small></td>
                    <td><span class="badge-admin {{ $user->is_admin ? 'badge-success' : '' }}">{{ $user->is_admin ? 'Administrator' : 'User' }}</span></td>
                    <td>
                        <details>
                            <summary class="btn-outline-admin" style="display:inline-block;cursor:pointer;">Edit</summary>
                            <form method="POST" action="{{ route('admin.users.update', $user) }}" class="mt-3">
                                @csrf @method('PUT')
                                <input class="form-control-admin mb-2" name="name" value="{{ $user->name }}" required>
                                <input class="form-control-admin mb-2" name="username" value="{{ $user->username }}" required>
                                <input class="form-control-admin mb-2" name="address" value="{{ $user->address }}" required>
                                <input class="form-control-admin mb-2" name="phone" value="{{ $user->phone }}" required>
                                <input class="form-control-admin mb-2" type="email" name="email" value="{{ $user->email }}" required>
                                <input class="form-control-admin mb-2" type="password" name="password" placeholder="New password (optional)">
                                <input class="form-control-admin mb-2" type="password" name="password_confirmation" placeholder="Confirm new password">
                                <label class="check-row mb-2"><input type="checkbox" name="is_admin" value="1" {{ $user->is_admin ? 'checked' : '' }}> Administrator</label>
                                <button class="btn-admin" type="submit">Save Changes</button>
                            </form>
                        </details>
                        @if(auth()->id() !== $user->id)
                            <form method="POST" action="{{ route('admin.users.destroy', $user) }}" style="display:inline;" onsubmit="return confirm('Delete this user?');">
                                @csrf @method('DELETE') <button class="btn-danger-admin" type="submit"><i class="fa fa-trash"></i></button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody></table></div>
            <div class="pagination-wrap">{{ $users->links() }}</div>
        </div>
    </div>
</div>
@endsection
