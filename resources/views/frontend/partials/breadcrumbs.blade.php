<ol class="breadcrumb">
    <li class="breadcrumb-item text-primary">
        <strong>{{ $airport->icao }} </strong> | <small>{{ $airport->name }}, {{ $airport->city }}</small>
    </li>
    <!-- Breadcrumb Menu-->
    <li class="breadcrumb-menu">
        <favorite :airport="{{ $airport }}" :favorited={{ $airport->favorited() ? 'true' : 'false' }} >
        </favorite>
    </li>
</ol>