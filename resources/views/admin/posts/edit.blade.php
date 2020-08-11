@extends('layouts.app')

@section('content')

    <h2 class="text-center">Edit "<strong>{{ $post->title }}</strong>" post</h2>

    <form action="{{ route('posts.update', $post->slug) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $post->title }}">
        </div>

        <div class="custom-file">
            <input type="file" class="custom-file-input" id="featured" name="featured">
            <label class="custom-file-label" for="featured">Choose file</label>
        </div>

        <div class="form-group">
            <select name="category_id" id="category_id" class="form-control mt-3">
                <option selected disabled>Select post category</option>
                @foreach($categories as $category)
                    <option
                        value="{{ $category->id }}"

                        @if($post->category->id == $category->id)
                            selected
                        @endif
                    >{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tags">Select tags</label>
            @foreach($tags as $tag)
                <div class="form-check">
                    <input type="checkbox" name="tags[]" class="form-check-input" id="tags" value="{{ $tag->id }}"
                        @foreach($post->tags as $t)
                            @if($tag->id == $t->id)
                                checked
                            @endif
                        @endforeach
                    >
                    <label for="tags" class="form-check-label">{{ $tag->tag }}</label>
                </div>
            @endforeach
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{ $post->content }}</textarea>
        </div>

        <div class="form-group">
            <button type="submit" name="btn-editPost" class="btn btn-success btn-block">Edit post</button>
        </div>

    </form>

    @include('includes._errors')

@endsection
