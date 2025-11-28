@extends('layouts.admin')

@section('admin-content')
<div class="container">
    <div class="card shadow-sm p-4">
        <h2 class="fw-bold mb-4">Edit Category</h2>

        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Category Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="name" name="name" 
                       value="{{ $category->name }}" required placeholder="Enter category name">
            </div>

            <!-- Parent Category -->
            <div class="mb-3">
                <label for="parent_id" class="form-label">Parent Category</label>
                <select class="form-select" id="parent_id" name="parent_id">
                    <option value="">-- None --</option>
                    @foreach($allCategories as $cat)
                        <option value="{{ $cat->id }}" {{ $category->parent_id == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-pencil-square"></i> Update Category
            </button>
        </form>
    </div>
</div>
@endsection
