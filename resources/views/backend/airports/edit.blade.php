@extends('backend.layouts.master')

@section('title', $airport->icao . ' | LGthree Admin Panel')

@section('stylesheets')
<style>
    tr.edit {
        background-color: #94C9A9 !important
    }

    tr.delete {
        background-color: #F0544F !important
    }
</style>

@endsection

@section('main')

@if(Session::has('airport-saved'))
<div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
    Airport has been succesfully saved!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
</div>
@endif

<div class="row mt-3">
    <div class="col-12">
        <h3>Edit Airport [{{ $airport->icao }}]</h3>

        <ol class="tabs">
            <ul class="nav nav-tabs nav-fill" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" data-target="#details" role="tab">Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" data-target="#charts" role="tab">Charts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" data-target="#runways" role="tab">Runways</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" data-target="#sids" role="tab">SIDs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" data-target="#stars" role="tab">STARs</a>
                </li>
            </ul>
        </ol>

        <div class="tab-content hidden">
            @include('backend.airports.partials.tabs.details')
            @include('backend.airports.partials.tabs.charts')
            @include('backend.airports.partials.tabs.runways')
            @include('backend.airports.partials.tabs.sids')
            @include('backend.airports.partials.tabs.stars')
        </div>
    </div>
</div>

@endsection

@section('javascripts')
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=apmr8ic9ham6cke7monmxeygtkl7s0od2j3439oofbwe5am2"></script>

<script>
    tinymce.init({
        selector: 'textarea',
        branding: false,
    });
</script>

@endsection