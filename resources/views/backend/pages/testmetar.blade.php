@extends('backend.layouts.master')

@section('title', 'Test METAR')

@section('main')

@if(Session::has('metar-changed'))
<div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
    METAR has changed succesfully.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="row mt-3">
    <div class="col-12">
        <div class="card card-accent-primary">
            <div class="card-header">
                Test METAR for: <strong class="bg-primary p-1 ml-2">{{ $airport->icao }}</strong>
            </div>
            <div class="card-body">
                <form action="{{ route('test.metar', $airport->icao) }}" method="post" class="form-horizontal">
                    {{ csrf_field() }}

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="hf-email">RAW text</label>
                        <div class="col-md-10">
                            <input type="text" id="raw_text" name="raw_text" class="form-control" value="{{ $airport->metar->raw_text }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="hf-email">Observation Time</label>
                        <div class="col-md-10">
                            <input type="text" id="observation_time" name="observation_time" class="form-control" value="{{ $airport->metar->observation_time }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="hf-email">Wind Direction</label>
                        <div class="col-md-10">
                            <input type="text" id="wind_direction" name="wind_direction" class="form-control" value="{{ $airport->metar->wind_direction }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="hf-email">Wind Speed</label>
                        <div class="col-md-10">
                            <input type="text" id="wind_speed" name="wind_speed" class="form-control" value="{{ $airport->metar->wind_speed }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-1 col-form-label" for="hf-email">Gust</label>
                        <div class="col-md-3">
                            <input type="text" id="wind_gust" name="wind_gust" class="form-control" value="{{ $airport->metar->wind_gust }}">
                            <small>1 or NULL</small>
                        </div>
                        <label class="col-md-1 col-form-label" for="hf-email">VRB</label>
                        <div class="col-md-3">
                            <input type="text" id="wind_variable" name="wind_variable" class="form-control" value="{{ $airport->metar->wind_variable }}">
                            <small>1 or NULL</small>
                        </div>
                        <label class="col-md-1 col-form-label" for="hf-email">Calm</label>
                        <div class="col-md-3">
                            <input type="text" id="wind_calm" name="wind_calm" class="form-control" value="{{ $airport->metar->wind_calm }}">
                            <small>1 or NULL</small>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-square btn-success btn-lg btn-block" name="submit">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection