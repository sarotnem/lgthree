<div class="tab-pane fade in show" id="stars" role="tabpanel">
    <h4 class="section-heading">STARs</h4>
    <div class="row">
        <div class="col-12">
            @if (!$airport->sids->isEmpty())
            <stars :stars="{{ $airport->stars }}"></stars>
            @else
            <p class="text-danger mt-3">This airport does not have assigned STARs</p>
            @endif

        </div>
    </div>
</div> {{-- !stars --}}