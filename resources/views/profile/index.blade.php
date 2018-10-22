@extends('layouts.default')

@section('title', 'User profile')

@section('content')
    <h1>Profile</h1>
    <div class="row">
        <div class="col-lg-5">
            @include('user.userblock')
        </div>
        <div class="col-lg-4 col-lg-offset-3">
            Some text.
        </div>
    </div>
@endsection
