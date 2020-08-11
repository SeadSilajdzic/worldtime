@extends('layouts.app')

@section('content')

    @if(count($posts) > 0)
        <h2 class="text-center p-4">Trashed posts</h2>

        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Featured</th>
                <th>Title</th>
                <th>Content</th>
                <th>Category</th>
                <th>Trashed</th>
                <th>Restore</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)

                <tr>
                    <td>{{ $post->id }}</td>
                    <td>
                        <img src="{{ $post->featured }}" alt="Featured image" style="width: 150px; height: 80px;">
                    </td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->content }}</td>
                    <td>{{ $post->category->name }}</td>
                    <td>{{ $post->deleted_at->toFormattedDateString() }}</td>
                    <td>
                        <form action="{{ route('posts.restore', $post->id) }}" method="get">
                            @csrf

                            <button type="submit" name="btn-restorePost" class="btn btn-success btn-sm">Restore</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                            @csrf
                            @method('delete')

                            <button type="submit" name="btn-trashPost" class="btn btn-danger btn-sm" style="color: white;">Delete</button>
                        </form>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
    @else
        <h2 class="text-center">There are no trashed posts yet!</h2>
    @endif

@endsection
