<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('backend.dashboard') }}">
          <i class="nav-icon icon-home"></i> Home
        </a>
            </li>
            <li class="nav-title">Airports</li>

            <a class="nav-link" href="{{ route('airports.index') }}">  <i class="nav-icon icon-plane"></i> All Airports</a>

            @foreach ($airportsByFir as $fir => $firAirports)

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle">
            <i class="nav-icon icon-paper-plane"></i> {{ $fir }}</a>
                <ul class="nav-dropdown-items">

                    @foreach ($firAirports as $airport)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('airports.edit', $airport->id) }}">
                <i class="nav-icon icon-plane"></i> {{ $airport->icao }}  <small class="text-muted">{{ $airport->city }}</small></a>
                    </li>
                    @endforeach

                </ul>
            </li>

            @endforeach

            <li class="nav-title">MISC</li>

            <a class="nav-link" href="{{ route('users.index') }}">  <i class="nav-icon icon-user"></i> Users</a>

        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>