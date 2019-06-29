@extends('backend.layouts.master')

@section('title', 'Users')

@section('main')

<div class="row mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header text-center">
                <strong>USERS</strong>
            </div>
            <div class="card-body">
                <table class="table table-responsive-sm table-sm table-striped table-bordered">
                    <thead class="thead-inverse">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Admin Access</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td><strong>{{ $user->id }}</strong></td>
                            <td>{{ $user->name }}</td>
                            <td>
                                @if ($user->isAdmin())
                                <span class="text-success">Yes</span>
                                @else
                                <span class="text-danger">No</span>
                                @endif
                            </td>
                            <td><a href="{{ route('users.edit', $user->id) }}" class="btn btn-md btn-primary btn-block">Edit</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection