@extends('layouts.frontend')

@section('content')

    <div class="fullpage d-flex justify-content-center align-items-center" style="height: 100vh;">
        <h1 class="text-center">There are no posts yet. <br>
            Please, wait until admin post something!
            <br>
            @if(!Auth::check())
                <span><a class="btn btn-primary" href="{{ route('login') }}">{{ __('Login') }}</a></span> or <span><a class="btn btn-secondary" style="color: white; text-decoration: none;" href="{{ route('register') }}">{{ __('Register') }}</a></span>
            @else
                @if(Auth::user()->isAdmin)
                    <a class="btn btn-primary btn-lg btn-block mt-3" href="{{ route('home') }}">Admin panel</a>
                @else
                    <br>
                    <p>Thank you for registration! Please come back later :)</p>
                @endif
            @endif
        </h1>
    </div>

@endsection
