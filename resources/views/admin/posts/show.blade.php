@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Post Content Column -->
            <div class="col-lg-12">

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

            <div>
                @foreach($post->tags as $tag)
                    <span class="badge badge-secondary mt-3 mb-3 p-2 mx-2" style="font-size: .9rem; border-radius: 20%;"> {{ $tag->tag }} </span>
                @endforeach
            </div>
        </div>

        <div class="alert alert-warning text-center py-4"><strong>Note:</strong>These tags are not clickable here. Their purpose is to show admin which tags are included in this post.</div>

        <div>
            @if(count($comments) > 0)
                <h3 class="text-center">Comments</h3>
                @foreach($comments as $comment)
                    <div style="border: 1px solid #ccc; padding: 1rem; margin-bottom: 1rem; margin-top: 1rem;">
                        <h4>{{ $comment->author }} <small class="text-muted">{{ $comment->created_at->toFormattedDateString() }} - {{ $comment->created_at->diffForHumans() }}</small></h4>
                        <p>{{ $comment->content }}</p>

                        <div class="create-reply">
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
                        </div>

                        <div class="show-replies clearfix">
                            @if(count($comment->replies) > 0)
                                @foreach($comment->replies as $reply)
                                    <div class="float-right " style="border: 1px solid #ccc; padding: 1rem; margin-bottom: 1rem; margin-top: 1rem; width: 95%;">
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

        <a href="{{ route('posts.index') }}" type="button" class="btn btn-primary btn-block mt-4">Go back</a>
    </div>
@endsection
