<div class="table-responsive">
    <table class="table table-editable table-nowrap align-middle table-edits">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Owner</th>
            <th>Controls</th>
            <th>Created_at</th>
        </tr>
        </thead>
        <tbody>
        @forelse(\App\Models\Category::with("user")->get() as $category)

        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->title }}</td>
            <td>{{ $category->user->name}}</td>
            <td style="width: 100px">
                <a class="btn btn-outline-primary btn-sm edit" href="{{ route('category.edit',$category->id) }}" title="Edit">
                    <i class="fas fa-pencil-alt"></i>
                </a>
                <form action="{{ route('category.destroy',$category->id) }}" class="d-inline-block" method="post">
                    @csrf
                    @method('delete')
                <button class="btn btn-outline-danger btn-sm edit" title="Delete" onclick="return confirm('Are you sure to delete {{ $category->title }} category?')">
                    <i class="fas fa-trash-alt"></i>
                </button>
                </form>
            </td>
            <td>
             <span class="small">
              <i class="fas fa-calendar"></i>
              {{ $category->created_at->format('d-m-y') }}
              </span>
                <br>
                <span class="small">
                <i class="fas fa-clock"></i>
                {{ $category->created_at->format('h:i A') }}
                </span>
            </td>
        </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">There is no Category</td>
            </tr>
        @endforelse

        </tbody>
    </table>
</div>
