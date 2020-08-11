@if($errors->any())
    <div>
        <ul style="list-style-type: none;" class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li class="p-1" style="font-size: 1rem;">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
