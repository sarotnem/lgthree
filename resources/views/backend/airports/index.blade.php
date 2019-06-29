@extends('backend.layouts.master')

@section('title', 'Airports | LGthree Admin Panel')

@section('main')

<div class="row mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header text-center">
                <strong>AIRPORTS</strong>
            </div>
            <div class="card-body">
                <table class="table table-responsive-sm table-sm table-striped">
                    <thead class="thead-inverse">
                        <tr>
                            <th>ICAO</th>
                            <th>Name</th>
                            <th>City</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($airports as $airport)
                        <tr>
                            <td><strong>{{ $airport->icao }}</strong></td>
                            <td>{{ $airport->name }}</td>
                            <td>{{ $airport->city }}</td>
                            <td><a href="{{ route('airports.edit', $airport->id) }}" class="btn btn-md btn-primary btn-block">Edit</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection