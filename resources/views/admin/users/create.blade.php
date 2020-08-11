@extends('layouts.app')

@section('content')

    <h2 class="text-center">Create new user</h2>

    <form action="{{ route('users.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <select name="isAdmin" id="isAdmin" class="form-control mt-3">
                <option selected disabled>Select users role</option>
                <option value="0">User</option>
                <option value="1">Admin</option>
            </select>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="form-group">
            <button type="submit" name="btn-createUser" class="btn btn-success btn-block">Create user</button>
        </div>

    </form>

    @include('includes._errors')

@endsection
