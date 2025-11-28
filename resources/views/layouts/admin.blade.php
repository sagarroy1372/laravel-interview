@extends('layouts.app')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">Admin Dashboard</h1>
    </div>

    <!-- Admin Navigation -->
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <nav class="nav nav-pills">
                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                   href="{{ route('admin.dashboard') }}">
                    <i class="bi bi-house"></i> Home
                </a>

                <a class="nav-link {{ request()->routeIs('admin.users') ? 'active' : '' }}"
                   href="{{ route('admin.users') }}">
                    <i class="bi bi-people"></i> Users
                </a>

                <a class="nav-link {{ request()->routeIs('categories.index') ? 'active' : '' }}"
                   href="{{ route('categories.index') }}">
                    <i class="bi bi-diagram-3"></i> Categories
                </a>
            </nav>
        </div>
    </div>

    <!-- Admin Dynamic Content -->
    <div class="card shadow-sm">
        <div class="card-body">
            @yield('admin-content')
        </div>
    </div>

</div>
@endsection
