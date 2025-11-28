<ul class="list-group mt-2 ms-4">
@foreach($children as $child)
    <li class="list-group-item">
        <div class="d-flex justify-content-between align-items-center">
            <span>{{ $child->name }}</span>
            {{-- <div>
                <a href="{{ route('categories.edit', $child->id) }}" class="btn btn-sm btn-outline-primary me-1">
                    Edit
                </a>
                <form action="{{ route('categories.destroy', $child->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger"
                            onclick="return confirm('Are you sure you want to delete this category?');">
                        Delete
                    </button>
                </form>
            </div> --}}
        </div>

        @if($child->children->count())
            @include('admin.categories.partials.children', ['children' => $child->children])
        @endif
    </li>
@endforeach
</ul>
