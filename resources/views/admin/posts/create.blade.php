@extends('layouts.app')

@section('content')

    <h2 class="text-center">Create new post</h2>

    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
        </div>

        <div class="custom-file">
            <input type="file" class="custom-file-input" id="featured" name="featured">
            <label class="custom-file-label" for="featured">Choose file</label>
        </div>

        <div class="form-group">
            <select name="category_id" id="category_id" class="form-control mt-3">
                <option selected disabled>Select post category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tag">Select tags</label>
            @foreach($tags as $tag)
                <div class="form-check">
                    <input type="checkbox" name="tags[]" class="form-check-input" id="tags" value="{{ $tag->id }}">
                    <label for="tags" class="form-check-label">{{ $tag->tag }}</label>
                </div>
            @endforeach
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{ old('content') }}</textarea>
        </div>

        <div class="form-group">
            <button type="submit" name="btn-createPost" class="btn btn-success btn-block">Create post</button>
        </div>

    </form>

    @include('includes._errors')

@endsection
