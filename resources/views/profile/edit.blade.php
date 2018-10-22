@extends('layouts.default')

@section('title', 'Edit profile')

@section('content')
    <h1>Update your profile</h1>
    <div class="row">
        <div class="col-lg-6">
            <form method="POST" action="{{ route('profile.edit') }}">
                {{ csrf_field() }}
                <div class="form-group has-error">
                  <label for="first_name">First name</label>
                  <input type="text" class="form-control {{ $errors->has('first_name') ? 'is-invalid' : 'is_valid'}}" id="first_name" name="first_name" placeholder="Enter first name" value="{{  Request::old('first_name') ?: Auth::user()->first_name }}" required>
                  @if ($errors->first('first_name'))
                    <div class="invalid-feedback">{{ $errors->first('first_name') }}</div>
                  @endif
                </div>
                <div class="form-group">
                  <label for="last_name">Last name</label>
                  <input type="text" class="form-control {{ $errors->has('last_name') ? 'is-invalid' : 'is_valid'}}" id="last_name" name="last_name" placeholder="Enter last name" value="{{ Request::old('last_name') ?: Auth::user()->last_name }}" required>
                  @if ($errors->first('last_name'))
                      <div class="invalid-feedback">{{ $errors->first('last_name') }}</div>
                  @endif
                </div>
                <div class="form-group">
                  <label for="location">Location</label>
                  <input type="text" class="form-control {{ $errors->has('location') ? 'is-invalid' : 'is_valid'}}" id="location" name="location" placeholder="Enter location" value="{{ Request::old('location') ?: Auth::user()->location }}" required>
                  @if ($errors->first('location'))
                      <div class="invalid-feedback">{{ $errors->first('location') }}</div>
                  @endif
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
