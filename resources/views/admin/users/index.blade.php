@extends('layouts.admin')

@section('admin-content')
<div class="mb-4">
    <h2 class="fw-bold">All Users</h2>
</div>

<div class="card shadow-sm">
    <div class="card-body table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    {{-- <th scope="col">Actions</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <span class="badge {{ $user->role == 'admin' ? 'bg-primary' : 'bg-success' }}">
                            {{ ucfirst($user->role) }}
                        </span>
                    </td>
                    {{-- <td>
                        <!-- Example actions: Edit/Delete -->
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-outline-primary me-1">
                            Edit
                        </a>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Are you sure you want to delete this user?');">
                                Delete
                            </button>
                        </form>
                    </td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
