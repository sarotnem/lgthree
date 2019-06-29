<div class="tab-pane fade in show" id="sids" role="tabpanel">
    <h4 class="section-heading">SIDs</h4>
    <div class="row">
        <div class="col-12">
            @if (!$airport->sids->isEmpty())
            <sids :sids="{{ $airport->sids }}"></sids>
            @else
            <p class="text-danger mt-3">This airport does not have assigned SIDs</p>
            @endif
        </div>
    </div>
</div> {{-- !sids --}}