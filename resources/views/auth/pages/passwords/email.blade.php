@extends('auth.layouts.master')

@section('title', 'LGthree - Forgot Password')
@section('main')

@if (session('status'))
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    </div>
</div>
@endif

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card mx-4">
            <div class="card-body p-4">
                <h1>Forgot Password?</h1>
                <p class="text-muted">Please fill your e-mail</p>
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

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


                    <button type="submit" class="btn btn-block btn-success">{{ __('Send Password Reset Link') }}</button>
                </form>
            </div>
        </div>
        <a class="btn btn-link btn-block px-0 text-center" href="{{ route('login') }}">Go Back to Login Page</a>
    </div>
</div>

@endsection