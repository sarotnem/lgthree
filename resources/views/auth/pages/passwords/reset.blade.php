@extends('auth.layouts.master')

@section('title', 'LGthree - Forgot Password')
@section('main')

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card mx-4">
            <div class="card-body p-4">
                <h1>Reset your Password</h1>
                <p class="text-muted">Please type your new password</p>
                <form method="POST" action="{{ route('password.request') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Email</span>
                        </div>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                        <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Password</span>
                        </div>
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                        <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                        @endif
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Confirm Password</span>
                        </div>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>


                    <button type="submit" class="btn btn-block btn-success">{{ __('Reset Password') }}</button>
                </form>
            </div>
        </div>
        <a class="btn btn-link btn-block px-0 text-center" href="{{ route('login') }}">Go Back to Login Page</a>
    </div>
</div>

@endsection