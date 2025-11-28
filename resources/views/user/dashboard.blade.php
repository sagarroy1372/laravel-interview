@extends('layouts.user')

@section('user-content')
<div class="text-center py-5">

    <h2 class="fw-bold mb-3">Welcome, <span class="text-success">{{ auth()->user()->name }}</span></h2>
    <p class="lead">This is your user dashboard. Explore your options and manage your account.</p>

    <div class="mt-4 mb-5">
        <!-- User action buttons -->
        {{-- <a href="#" class="btn btn-primary me-2">Profile</a>
        <a href="#" class="btn btn-outline-secondary">Settings</a> --}}
    </div>

    <div class="row g-4">
        @php
            $categories = \App\Models\Category::whereNull('parent_id')->take(6)->get();
        @endphp

        @forelse($categories as $category)
            <div class="col-12 col-md-4">
                <div class="card h-100 shadow-sm border rounded">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="card-title mb-0">{{ $category->name }}</h5>
                            <span class="badge bg-secondary">
                                {{ $category->children->count() }} items
                            </span>
                        </div>

                        <!-- Nested Subcategories -->
                        @if($category->children->count())
                            <ul class="list-group mt-2">
                                @foreach($category->children as $child)
                                    <li class="list-group-item py-1 ps-3">
                                        {{ $child->name }}
                                        @if($child->children->count())
                                            @include('admin.categories.partials.children', ['children' => $child->children])
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <i class="fas fa-inbox text-secondary display-1 mb-3"></i>
                <p class="text-secondary">No categories available yet</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
