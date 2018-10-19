@extends('layouts.default')

@section('title', 'Sign Up')

@section('content')
    <h1>Sign Up</h1>
    <div class="row">
        <div class="col-lg-6">
            <form method="POST" action="{{ route('signup') }}">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="username">Name</label>
                  <input type="text" class="form-control {{ $errors->has('username') ? 'is-invalid' : ''}}" id="username" name="username" placeholder="Enter name" required>
              @if ($errors->has('username'))
                  <span class="help-block">{{ $errors->first('username')}}</span>
              @endif
                </div>
                <div class="form-group">
                  <label for="email">E-mail</label>
                  <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" id="email" name="email" value="{{ Request::old('email') ?: '' }}" placeholder="Enter email" required>
                  @if ($errors->has('email'))
                      <span class="help-block">{{ $errors->first('email')}}</span>
                  @endif
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" id="password" name="password" placeholder="Enter password" required>
                </div>
                <div class="form-group">
                  <label for="password_confirmation">Password confirmation</label>
                  <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter password confirmation" required>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </form>
        </div>
    </div>
@endsection
