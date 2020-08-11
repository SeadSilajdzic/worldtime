@extends('layouts.frontend')

@section('content')
    <div class="container-scroller">
        <div class="main-panel">
        @include('includes._navbar')

        <!-- partial -->
            <div class="content-wrapper">
                <div class="container">
                    <div class="col-sm-12">
                        <div class="card" data-aos="fade-up">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h1 class="font-weight-600 mb-4">
                                            {{ $tag->tag }}
                                        </h1>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            @foreach($tag->posts as $post)
                                                <div class="col-sm-4 grid-margin">
                                                    <div class="rotate-img">
                                                        <img
                                                            src="{{ $post->featured }}"
                                                            alt="banner"
                                                            class="img-fluid"
                                                        />
                                                    </div>
                                                </div>
                                                <div class="col-sm-8 grid-margin">
                                                    <h2 class="font-weight-600 mb-2">
                                                        <a style="color: black; text-decoration: none;" href="{{ route('post.single', $post->slug) }}">{{ $post->title }}</a>
                                                    </h2>
                                                    <p class="fs-13 text-muted mb-0">
                                                        <span class="mr-2">Photo </span>{{ $post->created_at->diffForHumans() }}
                                                    </p>
                                                    <p class="fs-15">
                                                        {!! Str::limit($post->content, 90) !!}
                                                    </p>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- main-panel ends -->
            <!-- container-scroller ends -->

            @include('includes._footer')

        </div>
    </div>
@endsection
