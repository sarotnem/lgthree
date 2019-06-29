@extends('auth.layouts.master')

@section('title', 'LGthree - Login')
@section('main')

<div class="row justify-content-center">
    <div class="col-md-8 text-center mb-4">
        <img src="{{ URL::asset('img/brand/lgthree-logo.svg') }}" alt="LGthree logo" width="300px">
    </div>
    <div class="col-md-8">
        <div class="card-group">
            <div class="card p-4">
                <div class="card-body">
                    <h1>Login</h1>
                    <p class="text-muted">Sign In to your account</p>
                    <form method="POST" action="{{ route('login') }}" id="login_form">
                        @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                        <i class="icon-user"></i>
                      </span>
                            </div>
                            <input id="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="E-Mail" autocomplete="new-password" required autofocus>
                            @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                        <i class="icon-lock"></i>
                      </span>
                            </div>
                            <input id="password" type="password" class="form-control" name="password" placeholder="Password" auto-complete="off-2" required>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary px-4">Login</button>
                            </div>
                            <div class="col-6 text-right">
                                <a class="btn btn-link px-0" href="{{ route('password.request') }}">
                                  Forgot password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card text-white bg-primary py-5">
                <div class="card-body text-center">
                    <div>
                        <h2>Sign up</h2>
                        <p>Not having an account yet? Registering one is just a matter of seconds!</p>
                        <a class="btn btn-primary active mt-3" href="{{ route('register') }}">Register Now!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection