<div class="tab-pane fade in show active" id="details" role="tabpanel">
    <div class="row">
        <div class="col-12">
            <h4 class="section-heading">Details</h4>
            <table class="table table-striped table-bordered table-hover table-condensed">
                <tbody>
                    <tr>
                        <td><strong>ICAO</strong></td>
                        <td class="text-center">{{ $airport->icao }}</td>
                    </tr>
                    <tr>
                        <td><strong>IATA</strong></td>
                        <td class="text-center">{{ $airport->iata }}</td>
                    </tr>
                    <tr>
                        <td><strong>Name</strong></td>
                        <td class="text-center">{{ $airport->name }}</td>
                    </tr>
                    <tr>
                        <td><strong>City</strong></td>
                        <td class="text-center">{{ $airport->city }}</td>
                    </tr>
                    <tr>
                        <td><strong>Major</strong></td>
                        <td class="text-center">
                            @if ($airport->major)
                            <span class="badge badge-success">✓</span>
                            @else
                            <span class="badge badge-danger">✗</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Elevation</strong></td>
                        <td class="text-center">{{ $airport->elevation }} ft.</td>
                    </tr>
                    <tr>
                        <td><strong>Transition altitude</strong></td>
                        <td class="text-center">{{ $airport->transition_altitude }} ft.</td>
                    </tr>
                    <tr>
                        <td><strong>Transition Level</strong><small>(Based on the QNH)</small></td>
                        <td class="text-center">
                            <transition-level :qnh="{{ $airport->metar->barometer }}" :ta="{{ $airport->transition_altitude }}"></transition-level>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>MSA</strong></td>
                        <td class="text-center">{{ $airport->msa }} ft.</td>
                    </tr>
                    <tr>
                        <td><strong>Latitude</strong></td>
                        <td class="text-center">{{ $airport->lat }}</td>
                    </tr>
                    <tr>
                        <td><strong>Longitude</strong></td>
                        <td class="text-center">{{ $airport->lon }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <h4 class="section-heading">Runways</h4>
            <table class="table table-striped table-bordered table-hover table-condensed">
                <thead>
                    <td class="text-center"><strong>Identifier</strong></td>
                    <td class="text-center"><strong>Course</strong></td>
                    <td class="text-center"><strong>Length</strong></td>
                    <td class="text-center"><strong>Elevation</strong></td>
                    <td class="text-center"><strong>Lat</strong></td>
                    <td class="text-center"><strong>Lon</strong></td>
                    <td class="text-center"><strong>ILS</strong></td>
                    <td class="text-center"><strong>ILS Freq</strong></td>
                    <td class="text-center"><strong>ILS FAC</strong></td>
                    <td class="text-center"><strong>GP</strong></td>
                </thead>
                <tbody>
                    @foreach ($airport->runways as $runway)
                    <tr>
                        <td class="text-center">{{ $runway->designator }}</td>
                        <td class="text-center">
                            @if (strlen($runway->heading) == 3) {{ $runway->heading }}°
                            @else 0{{ $runway->heading }}°
                            @endif
                        </td>
                        <td class="text-center">{{ $runway->length }} ft / {{ ceil($runway->length * 0.3048) }} m</td>
                        <td class="text-center">{{ $runway->elevation }}ft</td>
                        <td class="text-center">{{ round($runway->arrival_lat,4) }}</td>
                        <td class="text-center">{{ round($runway->arrival_lon,4) }}</td>

                        @if ($runway->ils)
                        <td class="text-center"><span class="badge badge-success">✓</span>
                        </td>
                        <td class="text-center">{{ $runway->ils_frequency }}</td>
                        <td class="text-center">
                            @if (strlen($runway->heading) == 3) {{ $runway->heading }}°
                            @else 0{{ $runway->heading }}°
                            @endif
                        </td>
                        @else
                        <td class="text-center"><span class="badge badge-danger">✗</span>
                        </td>
                        <td class="text-center">-</td>
                        <td class="text-center">-</td>
                        @endif

                        <td class="text-center">{{ $runway->glidepath }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>{{-- !details --}}