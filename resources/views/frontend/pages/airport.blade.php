@extends('frontend.layouts.master')

@section('title') [{{ $airport->icao }}] {{ $airport->name }}, {{ $airport->city }} | LGthree
@endsection

@section('main_outside_container_top')

@include('frontend.partials.breadcrumbs')

@include('frontend.partials.airport.tabnav')

@endsection

@section('main')

<div class="row">
    <div class="col-12">
        @include('frontend.partials.airport.tabcontent')
    </div>
</div>

@endsection
