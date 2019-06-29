<div class="tab-pane fade in show active" id="charts" role="tabpanel">
    <div class="row">
        <div class="col-12">
            <charts-table :charts_initial="{{ $airport->charts }}" :airport_id="{{ $airport->id }}"></charts-table>
        </div>
    </div>
</div>