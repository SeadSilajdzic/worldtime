@extends('layouts.app')

@section('content')

    <h2 class="text-center p-3">
        Edit <strong>"{{ $category->name }}"</strong> category
    </h2>

    <form action="{{ route('categories.update', $category->id) }}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Category</label>
            <input type="text" value="{{ $category->name }}" name="name" class="form-control">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-block btn-success" name="btn-editCategory">Edit category</button>
        </div>
    </form>

    @include('includes._errors')

@endsection
