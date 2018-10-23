@extends('layouts.default')

@section('title', 'User profile')

@section('content')
    <h1>Profile</h1>
    <div class="row">
        <div class="col-lg-5">
            @include('user.userblock')
        </div>
        <div class="col-lg-4 col-lg-offset-3">
            <h4>{{ $user->getFirstNameOrUsername() }}'s friends.</h4>
            @if (!$user->friends()->count())
                <p>{{ $user->getFirstNameOrUsername() }} has no friends.</p>
            @else
                @foreach ($user->friends() as $user)
                    @include('user.userblock')
                @endforeach
            @endif
        </div>
    </div>
@endsection
