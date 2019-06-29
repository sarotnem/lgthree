<div class="tab-pane fade in show" id="weather" role="tabpanel">
    <div class="row">
        <div class="col-12">
            <h4 class="section-heading">Weather</h4>

            <metar :airport_id={{ $airport->id }} raw_text="{{ $airport->metar->raw_text }}" weather_station="{{ $airport->weather_station }}" >
            </metar>

            <div class="row">
                <div class="col-12">

                    <div class="card card-accent-primary">
                        <div class="card-header">
                            TAF
                            @if ($airport->weather_station)
                            <small>( Using weather data from {{$airport->weather_station }})</small>
                            @endif
                        </div>
                        <div class="card-body">
                            {{ $airport->taf->raw_text }}
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-12">

                    <div class="card card-accent-primary">
                        <div class="card-header">
                            NOTAM
                        </div>
                        @foreach ($airport->notams as $notam)
                        <div class="card-body bg-gray-200 m-2">
                            {!! nl2br($notam->raw_text) !!}
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>{{-- !weather --}}
