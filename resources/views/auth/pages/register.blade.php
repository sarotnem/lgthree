@extends('auth.layouts.master')

@section('title', 'LGthree - Login')
@section('main')

<div class="row justify-content-center">

    <div class="col-md-6">
        <div class="card mx-4">
            <div class="card-body p-4">
                <h1>Register</h1>
                <p class="text-muted">Create your account</p>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                  <i class="icon-user"></i>
                </span>
                        </div>
                        <input id="name" name="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Name" required autofocus>
                        @if ($errors->has('name'))
                        <span class="invalid-feedback">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">@</span>
                        </div>
                        <input id="email" name="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" required>
                        @if ($errors->has('email'))
                        <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                  <i class="icon-lock"></i>
                </span>
                        </div>
                        <input id="password" name="password" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" required>
                        @if ($errors->has('password'))
                        <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                  <i class="icon-lock"></i>
                </span>
                        </div>
                        <input id="password-confirm" name="password_confirmation" type="password" class="form-control" placeholder="Repeat password">
                    </div>

                    <button type="submit" class="btn btn-block btn-success">Create Account</button>
                </form>
            </div>
        </div>
        <a class="btn btn-link btn-block px-0 text-center" href="{{ route('login') }}">Go Back to Login Page</a>
    </div>
</div>

@endsection