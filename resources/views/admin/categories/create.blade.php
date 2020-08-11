@extends('layouts.app')

@section('content')

    <h2 class="text-center p-3">
        Create category
    </h2>

    <form action="{{ route('categories.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="name">Category</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="form-group">
            <button type="submit" name="btn-makeCategory" class="btn btn-block btn-success">Create category</button>
        </div>
    </form>

    @include('includes._errors')

@endsection
