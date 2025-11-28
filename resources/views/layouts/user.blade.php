@extends('layouts.app')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">User Dashboard</h1>
    </div>

    <!-- Optional User Navigation -->
    <div class="mb-4">
        <nav class="nav nav-pills">
            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                <i class="bi bi-house"></i> Home
            </a>
            <!-- Add more user links here if needed -->
        </nav>
    </div>

    <!-- User Dynamic Content -->
    <div class="card shadow-sm">
        <div class="card-body">
            @yield('user-content')
        </div>
    </div>

</div>
@endsection
