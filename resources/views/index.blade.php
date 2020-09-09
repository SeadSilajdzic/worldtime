@extends('layouts.frontend')

@section('content')
<div class="container-scroller">
    <div class="main-panel">
        @include('includes._navbar')

        <div class="content-wrapper">
            <div class="container">
                <div class="row" data-aos="fade-up">
                    @if($latest_post)
                        <div class="col-xl-8 stretch-card grid-margin">
                            <div class="position-relative">
                                <img
                                    src="{{ $latest_post->featured }}"
                                    alt="banner"
                                    class="img-fluid"
                                />
                                <div class="banner-content">
                                    <div class="fs-12 font-weight-bold mb-3">
                                        @foreach($latest_post->tags as $tag)
                                            <a href="{{ route('tags.single', $tag->slug) }}"><span class="badge badge-info ml-1" style="font-size: .9rem; border-radius: 20%;"> {{ $tag->tag }} </span></a>
                                        @endforeach
                                    </div>
                                    <h1 style="text-shadow: 2px 2px 2px black">
                                        <a style="color: white; text-decoration: none;" href="{{ route('post.single', $latest_post->slug) }}">{{ $latest_post->title }}</a>
                                    </h1>
                                    <div class="fs-12">
                                        <span style="text-shadow: 2px 2px 2px black" class="mr-2">Photo </span><span style="text-shadow: 1px 1px 3px black">{{ $latest_post->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="col-xl-4 stretch-card grid-margin">
                        <div class="card bg-dark text-white">
                            <div class="card-body">
                                <h2>Latest news</h2>

                                @if($three_posts)
                                    @foreach($three_posts as $post)
                                        <div class="d-flex border-bottom-blue pt-3 pb-4 align-items-center justify-content-between">
                                            <div class="pr-3">
                                                <h5><a style="color: white; text-decoration: none;" href="{{ route('post.single', $post->slug) }}">{{ $post->title }}</a></h5>
                                                <div class="fs-12">
                                                    <span class="mr-2">Photo </span>{{ $post->created_at->diffForHumans() }}
                                                </div>
                                            </div>
                                            <div class="rotate-img">
                                                <img
                                                    src="{{ $post->featured }}"
                                                    alt="thumb"
                                                    class="img-fluid img-lg"
                                                />
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" data-aos="fade-up">
                    <div class="col-lg-3 stretch-card grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h2>Categories</h2>
                                <ul class="vertical-menu">
                                    @foreach($all_categories as $category)
                                        <li><a href="{{ route('categories.single', $category->slug) }}">{{ $category->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 stretch-card grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    @foreach($three_posts as $post)
                                        <div class="col-sm-4 grid-margin">
                                            <div class="position-relative">
                                                <div class="rotate-img">
                                                    <img src="{{ $post->featured }}" alt="thumb" class="img-fluid"/>
                                                </div>
                                                <div class="badge-positioned">
                                                    <span class="font-weight-bold">
                                                        @foreach($post->tags as $tag)
                                                            <a href="{{ route('tags.single', $tag->slug) }}"><span class="badge badge-info ml-1" style="font-size: .9rem; border-radius: 20%;"> {{ $tag->tag }} </span></a>
                                                        @endforeach
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-8  grid-margin">
                                            <h2 class="mb-2 font-weight-600">
                                                <a style="color: black; text-decoration: none;" href="{{ route('post.single', $post->slug) }}">{{ $post->title }}</a>
                                            </h2>
                                            <div class="fs-13 mb-2">
                                                <span class="mr-2">Photo </span>{{ $post->created_at->diffForHumans() }}
                                            </div>
                                            <p class="mb-0">
                                                {!! Str::limit($post->content, 120) !!}
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
        <!-- main-panel ends -->
        <!-- container-scroller ends -->

        <!-- partial:partials/_footer.blade.php -->
        @include('includes._footer')

        <!-- partial -->
    </div>
</div>
@endsection

