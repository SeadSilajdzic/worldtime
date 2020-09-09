@extends('layouts.app')

@section('content')

    @if(count($comments) > 0)
    <h2 class="text-center">Comments</h2>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Approve</th>
                <th>View post</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($comments as $comment)
                <tr>
                    <td>{{ $comment->author}}</td>
                    <td>{{ $comment->email }}</td>
                    <td>{{ Str::words($comment->content, 15) }}</td>
                    <td>
                        @if($comment->is_active == 1)
                            <form action="{{ route('comment.un.approve', $comment->id) }}" method="post">
                                @csrf

                                <button type="submit" class="btn btn-warning btn-sm">Unapprove</button>
                            </form>
                        @else
                            <form action="{{ route('comment.approve', $comment->id) }}" method="post">
                                @csrf

                                <button type="submit" class="btn btn-success btn-sm">Approve</button>
                            </form>
                        @endif
                    </td>
                    <td><a href="{{ route('posts.show', $comment->post->slug) }}" type="button" class="btn btn-sm btn-info" style="color: white;" target="_blank">View</a></td>
                    <td>
                        <form action="{{ route('comments.destroy', $comment->id) }}" method="post">
                            @csrf
                            @method('delete')

                            <button type="submit" class="btn btn-danger btn-sm" name="btn-delete">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <h2 class="text-center">There are no comments yet!</h2>
    @endif
@endsection
