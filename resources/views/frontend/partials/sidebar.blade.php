<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">
          <i class="nav-icon icon-home"></i> Home
        </a>
            </li>
            <li class="nav-title">Airports</li>

            @foreach ($airportsByFir as $fir => $firAirports)

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle">
            <i class="nav-icon icon-paper-plane"></i> {{ $fir }}</a>
                <ul class="nav-dropdown-items">

                    @foreach ($firAirports as $airport)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('airport.show', $airport->icao) }}">
                <i class="nav-icon icon-plane"></i> {{ $airport->icao }}  <small class="text-muted">{{ $airport->city }}</small></a>
                    </li>
                    @endforeach

                </ul>
            </li>

            @endforeach

        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>