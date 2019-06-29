<div class="tab-pane fade in show" id="runways" role="tabpanel">
    <div class="row">
        <div class="col-12">
            <runways-table :runways_initial="{{ $airport->runways }}" :airport_id="{{ $airport->id }}"></runways-table>
        </div>
    </div>
</div>