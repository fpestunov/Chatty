@extends('layouts.default')

@section('title', 'Search Friends')

@section('content')
    <h3>Search for {{ Request::input('query') }}</h3>

    @if (!$users->count())
        <p>No results found.</p>
    @else
        <div class="row">
            <div class="col-lg-12">
                @foreach ($users as $user)
                    @include('user/userblock')
                @endforeach
            </div>
        </div>
    @endif
@endsection
