@extends('layouts.frontend')

@section('content')
    @include('includes._navbar')
    <div class="container">
        <div class="row">
            <!-- Post Content Column -->
            <div class="col-lg-12">

                @if(Session::has('comment_message'))
                    <div class="alert alert-warning">
                        <p class="text-center">{{ session('comment_message') }}</p>
                    </div>
                @endif

                @if(Session::has('reply_message'))
                    <div class="alert alert-warning">
                        <p class="text-center">{{ session('reply_message') }}</p>
                    </div>
                @endif

                <!-- Title -->
                <h1 class="mt-4">{{ $post->title }}</h1>

                <!-- Author -->
                <p class="lead">
                    by {{ $post->user->name }}
                </p>

                <hr>

                <!-- Date/Time -->
                <p>Posted on {{ $post->created_at->toFormattedDateString() }}</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-fluid rounded" src="{{ $post->featured }}" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead">{{ $post->title }}</p>

                <p>{!! $post->content !!}</p>
            </div>

            @foreach($post->tags as $tag)
                <a href="{{ route('tags.single', $tag->slug) }}"><span class="badge badge-secondary mt-3 mb-3 p-2 mx-2" style="font-size: .9rem; border-radius: 20%;"> {{ $tag->tag }} </span></a>
            @endforeach
        </div>

        <div>
            <h3>Leave comment</h3>
            @guest
                <h4>If you want to leave your comment please concider to
                <a href="{{ route('login') }}" type="button" class="btn btn-primary btn-sm">Login</a> or
                <a href="{{ route('register') }}" type="button" class="btn btn-info btn-sm" style="color: white;">Register</a></h4>
            @else
                <form action="{{ route('comment.create') }}" method="post">
                    @csrf

                    <input type="hidden" name="post_id" value="{{ $post->id }}">

                    <div class="form-group">
                        <label for="content">Comment</label>
                        <textarea name="content" id="content" class="form-control" style="height: 130px;"></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" name="btn-comment" class="btn btn-lg btn-primary">Comment</button>
                    </div>
                </form>
            @endguest
        </div>

        <div>
            @if(count($comments) > 0)
                <h3 class="text-center">Comments</h3>
                @foreach($comments as $comment)
                    <div style="border: 1px solid #ccc; padding: 1rem; margin-bottom: 1rem; margin-top: 1rem;">
                        <h4>{{ $comment->author }} <small class="text-muted">{{ $comment->created_at->toFormattedDateString() }} - {{ $comment->created_at->diffForHumans() }}</small></h4>
                        <p>{{ $comment->content }}</p>

                        <form action="{{ route('reply.create') }}" method="post">
                            @csrf

                            <input type="hidden" name="comment_id" value="{{ $comment->id }}">

                            <div class="form-group">
                                <textarea name="content" id="content" class="form-control" style="height: 50px;" placeholder="Reply..."></textarea>
                            </div>

                            <div class="form-group">
                                <button type="submit" name="btn-reply" class="btn btn-sm btn-primary">Reply</button>
                            </div>
                        </form>

                        <div class="clearfix">
                            @if(count($comment->replies) > 0)
                                @foreach($comment->replies as $reply)
                                    <div class="float-right" style="border: 1px solid #ccc; padding: 1rem; margin-bottom: 1rem; margin-top: 1rem; width: 95%;">
                                        <h5>{{ $reply->author }} <small class="text-muted">{{ $reply->created_at->toFormattedDateString() }} - {{ $reply->created_at->diffForHumans() }}</small></h5>
                                        <p>{{ $reply->content }}</p>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                @endforeach

                {{ $comments->links() }}
            @endif
        </div>
    </div>
    @include('includes._footer')
@endsection
