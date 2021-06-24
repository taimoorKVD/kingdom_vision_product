@extends('layouts.includes.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="card card-secondary card-outline">
                <div class="card-header">
                    <div class="card-title float-left">
                        <h3>User Details</h3>
                    </div>
                    <div class="float-right">
                        <a href="{{ route('users.index') }}" class="btn btn-info btn-sm">Back</a>
                    </div>
                </div>
                <div class="card-body">

                    <!-- Profile Image -->
                    <div class="card">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                     src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{ $user->name }}</h3>
                            <h3 class="profile-email text-center">{{ $user->email }}</h3>
                            <h5 class="text-muted text-center">
                                <span
                                    class="badge {{ $user->status == 1 ? 'badge-success' : 'badge-danger' }}"> {{ $user->status == 1 ? 'Active' : 'Inactive' }} </span>
                            </h5>

                        </div>
                        <!-- /.card-body -->
                    </div>

                    <!-- About Me Box -->
                    <div class="card">

                        <div class="card-body">
                            <strong><i class="fas fa-user-hard-hat mr-1"></i> Designation</strong>
                            @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $role)
                                    <p class="text-muted">
                                        {{ $role }}
                                    </p>
                                @endforeach
                            @endif
                            <hr>

                            <strong><i class="fas fa-info mr-1"></i> About</strong>
                            <p class="text-muted">
                                {{ $user->about ? $user->about : 'N/A' }}
                            </p>
                            <hr>

                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                            <p class="text-muted">{{ $user->city ? $user->city.',' : 'N/A' }}</p>
                            <hr>

                            <strong><i class="fas fa-phone mr-1"></i> Phone</strong>
                            <p class="text-muted">{{ $user->phone_number ? $user->phone_prefix.'-'.$user->phone_number : 'N/A'  }}</p>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>

@endsection
