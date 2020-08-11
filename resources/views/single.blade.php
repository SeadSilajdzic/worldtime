@extends('layouts.frontend')

@section('content')
    @include('includes._navbar')
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

            @foreach($post->tags as $tag)
                <a href="{{ route('tags.single', $tag->id) }}"><span class="badge badge-secondary mt-3 mb-3 p-2 mx-2" style="font-size: .9rem; border-radius: 20%;"> {{ $tag->tag }} </span></a>
            @endforeach
        </div>
    </div>
    @include('includes._footer')
@endsection
