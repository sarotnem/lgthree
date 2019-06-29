<div class="tab-pane fade in show" id="vfr" role="tabpanel">
    <div class="row">
        <div class="col-12">
            <h4 class="section-heading mb-4">VFR Briefing</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @if ($airport->vfr_overview) {!! $airport->vfr_overview !!}
            @else
            <p class="text-danger">VFR Overview is not provided for this airport.</p>
            @endif
        </div>

    </div>
</div> {{-- !vfr --}}