@extends('layouts.app')

@section('content')

    @if(count($tags) > 0)
    <h2 class="text-center p-3">Tags</h2>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tag</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tags as $tag)

                <tr>
                    <td>{{ $tag->id }}</td>
                    <td>{{ $tag->tag }}</td>
                    <td>
                        <a href="{{ route('tags.edit', $tag->slug) }}" class="btn btn-info btn-sm" style="color: white;">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('tags.destroy', $tag->slug) }}" method="post">
                            @csrf
                            @method('delete')

                            <button type="submit" name="btn-deleteTag" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>
    @else
        <h2 class="text-center">There are no tags yet!</h2>
    @endif
@endsection
