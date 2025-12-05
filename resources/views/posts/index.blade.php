@extends('partials.layout')
@section('content')
    <a href="{{ route('posts.create') }}" class="btn join-item btn-primary">New Post</a>
    @if(Route::is('posts.deleted'))
        <a href="{{ route('posts.index') }}" class="btn join-item btn-secondary">All Posts</a>
    @else
        <a href="{{ route('posts.deleted') }}" class="btn join-item btn-secondary">Deleted Posts</a>
    @endif

    {{ $posts->links() }}
    <table class="table table-zebra">
        <thead>
            <th>ID</th>
            <th>Title</th>
            <th>Created</th>
            <th>Update</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr class="hover:bg-base-300">
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>{{ $post->updated_at }}</td>
                    <td>
                        <div class="join">
                            @if($post->trashed())
                                <form action="{{route('posts.restore', $post)}}" method="POST">
                                    @csrf
                                    <button class="btn join-item btn-success">Restore</button>
                                </form>
                                <form action="{{route('posts.permadestroy', $post)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn join-item btn-error">Perma Delete</button>
                                </form>
                            @else
                                <a class="btn join-item btn-info">View</a>
                                <a href="{{ route('posts.edit', $post) }}" class="btn join-item btn-warning">Edit</a>
                                <form action="{{route('posts.destroy', $post)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn join-item btn-error">Delete</button>
                                </form>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
