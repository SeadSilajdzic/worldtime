@extends('layouts.app')

@section('content')

    @if(count($categories) > 0)
        <h2 class="text-center p-4">Categories</h2>

        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)

                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category->slug) }}" class="btn btn-info btn-sm" style="color: white;">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                            @csrf
                            @method('Delete')

                            <button type="submit" name="btn-trashPost" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
    @else
        <h2 class="text-center">There are no categories yet!</h2>
    @endif

@endsection
