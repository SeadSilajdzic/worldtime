@extends('layouts.app')

@section('content')

    <h2 class="text-center p-3">
        Edit <strong>"{{ $tag->tag }}"</strong> category
    </h2>

    <form action="{{ route('tags.update', $tag->slug) }}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="tag">Tag</label>
            <input type="text" value="{{ $tag->tag }}" name="tag" class="form-control">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-block btn-success" name="btn-editTag">Edit tag</button>
        </div>
    </form>

    @include('includes._errors')

@endsection
