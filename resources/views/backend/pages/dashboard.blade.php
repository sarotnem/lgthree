@extends('backend.layouts.master')

@section('title', 'Admin Dashboard')

@section('main')

<div class="row mt-3">
    <div class="col-12 text-center">
        <h2>Hello, {{ Auth::user()->name }}!</h2>
    </div>
    <div class="col-12 text-center mt-5">
        <img src="{{ URL::asset('img/brand/lgthree-logo.svg') }}" alt="Logo" class="w-75">
    </div>
    <div class="col-12 text-center mt-3">
        <h1>Admin Panel</h1>
    </div>
</div>

@endsection