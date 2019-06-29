<div class="tab-pane fade in show" id="details" role="tabpanel">
    <div class="row">
        <div class="col-12">
            <form action="{{ route('airports.update', $airport->id) }}" method="POST" class="form-horizontal">
                {{ method_field('PUT') }} {{ csrf_field() }}
                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="icao">ICAO</label>
                    <div class="col-md-10">
                        <input type="text" id="icao" name="icao" class="form-control" value="{{ $airport->icao }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="iata">IATA</label>
                    <div class="col-md-10">
                        <input type="text" id="iata" name="iata" class="form-control" value="{{ $airport->iata }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="name">Name</label>
                    <div class="col-md-10">
                        <input type="text" id="name" name="name" class="form-control" value="{{ $airport->name }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="city">City</label>
                    <div class="col-md-10">
                        <input type="text" id="city" name="city" class="form-control" value="{{ $airport->city }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="lat">Latitude</label>
                    <div class="col-md-10">
                        <input type="text" id="lat" name="lat" class="form-control" value="{{ $airport->lat }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="lon">Longtitude</label>
                    <div class="col-md-10">
                        <input type="text" id="lon" name="lon" class="form-control" value="{{ $airport->lon }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="elevation">Elevation</label>
                    <div class="col-md-10">
                        <input type="text" id="elevation" name="elevation" class="form-control" value="{{ $airport->elevation }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="transition_altitude">Tr. Altitude</label>
                    <div class="col-md-10">
                        <input type="text" id="transition_altitude" name="transition_altitude" class="form-control" value="{{ $airport->transition_altitude }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="msa">MSA</label>
                    <div class="col-md-10">
                        <input type="text" id="msa" name="msa" class="form-control" value="{{ $airport->msa }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="weather_station">Weather Station</label>
                    <div class="col-md-10">
                        <input type="text" id="weather_station" name="weather_station" class="form-control" value="{{ $airport->weather_station }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="maps_zoom">Maps Zoom</label>
                    <div class="col-md-10">
                        <input type="text" id="maps_zoom" name="maps_zoom" class="form-control" value="{{ $airport->maps_zoom }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="sector">FIR</label>
                    <div class="col-md-10">
                        {{ Form::select('sector_id', [ 1 => 'Athens East', 2 => 'Athens West', 3 => 'Makedonia'], $airport->sector_id, [ 'class' => 'form-control' ] ) }}
                    </div>
                </div>

                <div class="form-group bg-info row px-4 py-2">
                    <span><strong>Reminder!</strong> Remember to apply the correct styles after any changes you've made! <button type="button" class="btn btn-light ml-3 btn-sm" data-toggle="modal" data-target="#stylesModal">View Available Styles</button></span>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="vfr_overview">VFR Overview</label>
                    <div class="col-md-10">
                        <textarea id="vfr_overview" name="vfr_overview" rows="9" class="form-control">{{ $airport->vfr_overview }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="procedures">Procedures</label>
                    <div class="col-md-10">
                        <textarea id="procedures" name="procedures" rows="9" class="form-control">{{ $airport->procedures }}</textarea>
                    </div>
                </div>

                <button type="submit" name="submit" class="btn btn-success btn-block btn-lg mt-3">Submit</button>

            </form>
        </div>
    </div>
</div>

@include('backend.airports.partials.modals.stylesModal')