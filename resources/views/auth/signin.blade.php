@extends('layouts.default')

@section('title', 'Sign In')

@section('content')
    <h1>Sign In</h1>
    <div class="row">
        <div class="col-lg-6">
            <form method="POST" action="{{ route('signin') }}">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="email">E-mail</label>
                  <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" id="email" name="email" value="{{ Request::old('email') ?: '' }}" placeholder="Enter email">
                  @if ($errors->has('email'))
                      <span class="help-block">{{ $errors->first('email')}}</span>
                  @endif
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" id="password" name="password" placeholder="Enter password">
                  @if ($errors->has('password'))
                      <span class="help-block">{{ $errors->first('password')}}</span>
                  @endif
                </div>
                <div class="form-group">
                  <input type="checkbox" class="form-group" id="rememberMe">
                  <label class="form-group" for="rememberMe">Remember me</label>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Sign In</button>
                </div>
            </form>
        </div>
    </div>
@endsection
