@extends('layouts.app')

@section('content')

    @if(count($replies) > 0)
        <h2 class="text-center">Replies</h2>

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
            @foreach($replies as $reply)
                <tr>
                    <td>{{ $reply->author}}</td>
                    <td>{{ $reply->email }}</td>
                    <td>{{ $reply->content }}</td>
                    <td>
                        @if($reply->is_active == 1)
                            <form action="{{ route('reply.un.approve', $reply->id) }}" method="post">
                                @csrf

                                <button type="submit" class="btn btn-warning btn-sm">Unapprove</button>
                            </form>
                        @else
                            <form action="{{ route('reply.approve', $reply->id) }}" method="post">
                                @csrf

                                <button type="submit" class="btn btn-success btn-sm">Approve</button>
                            </form>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('posts.show', $reply->comment->post->slug) }}" type="button" class="btn btn-sm btn-info" style="color: white;" target="_blank">View</a>
                    </td>
                    <td>
                        <form action="{{ route('replies.destroy', $reply->id) }}" method="post">
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
        <h2 class="text-center">There are no replies yet!</h2>
    @endif
@endsection
