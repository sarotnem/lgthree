<div class="tab-pane fade in show" id="procedures" role="tabpanel">
    <div class="row">
        <div class="col-12">
            <h4 class="section-heading mb-4">Procedures</h4>
            @if($airport->procedures) {!! $airport->procedures !!}
                @else
                <p class="text-danger">There is not a procedures guide for this airport.</p>
                @endif
        </div>
    </div>
</div>{{-- !details --}}