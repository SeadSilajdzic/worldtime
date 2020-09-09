@extends('layouts.app')

@section('content')

    @if(count($posts) > 0)
        <h2 class="text-center p-4">All posts</h2>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Featured</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Created</th>
                    <th>View post</th>
                    <th>Edit</th>
                    <th>Trash</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)

                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>
                            <img src="{{ $post->featured }}" alt="Featured image" style="width: 150px; height: 80px;">
                        </td>
                        <td><a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a></td>
                        <td>{{ $post->category->name }}</td>
                        <td>{{ $post->created_at->toFormattedDateString() }}</td>
                        <td><a href="{{ route('post.single', $post->slug) }}" type="button" class="btn btn-sm btn-secondary" target="_blank">View</a></td>
                        <td>
                            <a href="{{ route('posts.edit', $post->slug) }}" class="btn btn-info btn-sm" style="color: white;">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('posts.trash', $post->id) }}" method="get">
                                @csrf
                                @method('delete')

                                <button type="submit" name="btn-trashPost" class="btn btn-danger btn-sm" style="color: white;">Trash</button>
                            </form>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    @else
        <h2 class="text-center">There are no posts yet!</h2>
    @endif

@endsection
