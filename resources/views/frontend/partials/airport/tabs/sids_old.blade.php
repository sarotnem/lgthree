<div class="tab-pane fade in show" id="sids" role="tabpanel">
    <h4 class="section-heading">SIDs</h4>
    <div class="row">
        <div class="col-12">
            <small>Click a header to sort the table by that column.</small>
            <table class="js-dynamitable table table-striped table-bordered table-hover table-condensed">
                <thead>
                    <tr>
                        <th class="text-center" data-sort="string">Exit Point</th>
                        <th class="text-center" data-sort="string">Runway</th>
                        <th class="text-center" data-sort="string">Departure</th>
                        <th class="text-center">Initial Alt/FL</th>
                        <th class="text-center">Release FL</th>
                    </tr>
                    <tr>
                        <th class="text-center"><input class="js-filter form-control" placeholder="Lookup Exit Point" type="text" value=""></th>
                        <th class="text-center"><input class="js-filter form-control" placeholder="Lookup Runway" type="text" value=""></th>
                        <th class="text-center"><input class="js-filter form-control" placeholder="Lookup Departure" type="text" value=""></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($airport->sids as $sid)
                    <tr>
                        <td class="text-center">{{ $sid->point }}</td>
                        <td class="text-center">{{ $sid->runway }}</td>
                        <td class="text-center">{{ $sid->name }}</td>
                        <td class="text-center">
                            @if ($sid->initial_flight_level == '') -
                            @else {{ $sid->initial_flight_level }}
                            @endif
                        </td>
                        <td class="text-center">
                            @if ($sid->release_flight_level == '') -
                            @else {{ $sid->release_flight_level }}
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> {{-- !sids --}}