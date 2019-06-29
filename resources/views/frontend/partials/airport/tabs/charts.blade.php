<div class="tab-pane fade in show" id="charts" role="tabpanel">
    <div class="row">
        <div class="col-12">
            <h4 class="section-heading mb-4">Charts</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @if (!$airport->charts->isEmpty())
            <charts :charts="{{ $airport->charts }}" :route="'/airports/{{ $airport->icao }}/charts/'"></charts>
            @else
            <p class="text-danger">Charts are not provided for this airport.</p>
            @endif

        </div>
    </div>
</div> {{-- !charts --}}