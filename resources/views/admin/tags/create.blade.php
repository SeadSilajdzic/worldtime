@extends('layouts.app')

@section('content')

    <h2 class="text-center p-3">
        Create tag
    </h2>

    <form action="{{ route('tags.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="tag">Tag</label>
            <input type="text" name="tag" class="form-control">
        </div>

        <div class="form-group">
            <button type="submit" name="btn-makeTag" class="btn btn-block btn-success">Create tag</button>
        </div>
    </form>

    @include('includes._errors')

@endsection
