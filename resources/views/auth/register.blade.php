@extends('layouts.app')

@section('content')
<section class="vh-100">
    <div class="container pt-5 h-100">
      <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-md-8 col-lg-7 col-xl-6">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
            class="img-fluid" alt="Phone image">
        </div>
        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
          <form method="POST" action="{{ route('register') }}">
              @csrf
            <!-- Email input -->
            <div class="form-outline mb-4">
                <label for="name" class="text-white col-form-label text-md-end">{{ __('Name') }}</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
                <label for="email" class="text-white col-form-label text-md-end">{{ __('Email Address') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
            <!-- Password input -->
            <div class="form-outline mb-4">
                <label for="password" class="text-white col-form-label text-md-end">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

          </div>
            <div class="form-outline mb-4">
                <label for="password-confirm" class="text-white col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
          </div>


            <!-- Submit button -->
            <div class="d-flex justify-content-center">
              <button type="submit" class="btn btn-primary btn-lg btn-block rounded-pill px-5">Register</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </section>
  @endsection

  @section('css')
  <style>
  .divider:after,
  .divider:before {
  content: "";
  flex: 1;
  height: 1px;
  background: #eee;
  }

  body{
       background:linear-gradient(to bottom, rgb(26, 4, 87), rgb(37, 3, 163));   }
  </style>
@endsection
