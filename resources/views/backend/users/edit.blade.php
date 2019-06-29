@extends('backend.layouts.master')

@section('title', 'Edit User')

@section('main')

<div class="row mt-3">
    <div class="col-12">

        @if (Session::has('user:edited'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button> {{ Session::get('user:edited') }}
        </div>
        @endif

        <div class="card">
            <div class="card-header text-center">
                Edit User
            </div>
            <div class="card-body">
                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    {{ method_field('PUT') }}
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" value="{{ $user->name }}" name="name">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="ccnumber">Email</label>
                                <input type="email" class="form-control" id="email" value="{{ $user->email }}" name="email">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Admin Access</label>
                                <br>
                                <label class="switch switch-pill switch-success">
                              <input type="checkbox" class="switch-input" name="admin"
                              @if ($user->isAdmin)
                                checked
                              @endif
                              >
                              <span class="switch-slider"></span>
                            </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-lg">Save</button>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </div>
        <a href="{{ route('users.index') }}"><i class="fa fa-arrow-left mr-2"></i>Back to Users</a>
    </div>
</div>

@endsection