@extends('layouts.admin')

@section('admin-content')
<div class="text-center py-5">

    <h2 class="fw-bold mb-3">Welcome to the Admin Dashboard</h2>
    <p class="lead">Hello, <span class="text-primary">{{ auth()->user()->name }}</span>!</p>

    <div class="mt-4">
        <a href="{{ route('admin.users') }}" class="btn btn-outline-primary me-2">
            Manage Users
        </a>
        <a href="{{ route('categories.index') }}" class="btn btn-outline-success">
            Manage Categories
        </a>
    </div>

</div>
@endsection
