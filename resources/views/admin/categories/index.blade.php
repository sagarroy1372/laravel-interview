@extends('layouts.admin')

@section('admin-content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Categories</h2>
    <a href="{{ route('categories.create') }}" class="btn btn-success">
        <i class="bi bi-plus-circle"></i> Add New Category
    </a>
</div>

<!-- Categories Tree -->
<ul class="list-group">
    @foreach($categories as $category)
        <li class="list-group-item">
            <div class="d-flex justify-content-between align-items-center">
                <span>{{ $category->name }}</span>
                {{-- <div>
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-outline-primary me-1">
                        Edit
                    </a>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                onclick="return confirm('Are you sure you want to delete this category?');">
                            Delete
                        </button>
                    </form>
                </div> --}}
            </div>

            @if($category->children->count())
                <ul class="list-group mt-2 ms-4">
                    @foreach($category->children as $child)
                        @include('admin.categories.partials.children', ['children' => collect([$child])])
                    @endforeach
                </ul>
            @endif
        </li>
    @endforeach
</ul>
@endsection
