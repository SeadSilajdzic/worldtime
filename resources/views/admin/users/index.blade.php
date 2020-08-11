@extends('layouts.app')

@section('content')

    @if(count($users) > 0)
        <h2 class="text-center">
            All users
        </h2>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Permission</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        @if(Auth::user()->id != $user->id)
                            <td>
                                @if($user->isAdmin)
                                    <a href="{{ route('users.remove.admin', $user->id) }}" class="btn btn-sm btn-danger">Remove admin</a>
                                @else
                                    <a href="{{ route('users.make.admin', $user->id) }}" class="btn btn-sm btn-success">Make admin</a>
                                @endif
                            </td>
                        @else
                            <td>-----</td>
                        @endif
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if(Auth::user()->id != $user->id)
                                <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" name="btn_deleteUser" class="btn btn-sm btn-danger">Delete</button>

                                </form>
                            @else
                                -----
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
    <h2 class="text-center">There are no users yet!</h2>
    @endif

@endsection
