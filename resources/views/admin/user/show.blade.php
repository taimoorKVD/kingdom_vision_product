@extends('admin.layouts.includes.dashboard')

@section('content')

    @include('admin.layouts.includes.page-content-header')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="card card-secondary card-outline">
                <div class="card-body">

                    <!-- Profile Image -->
                    <div class="card">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                     src="{{ isset($user->profile_photo) ? url('storage/app/'.$user->profile_photo) : url('storage/app/public/default_images/upload.png') }}" alt="{{ $user->name }}">
                            </div>

                            <h3 class="profile-username text-center">{{ $user->name }}</h3>
                            <h5 class="text-muted text-center">
                                <span class="badge {{ $user->status == 1 ? 'badge-success' : 'badge-danger' }}">
                                    {{ $user->status == 1 ? 'Active' : 'Inactive' }}
                                </span>
                            </h5>

                        </div>
                        <!-- /.card-body -->
                    </div>

                    <!-- About Me Box -->
                    <div class="card">

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <strong>
                                        <span class="material-icons">
                                            perm_identity
                                        </span>
                                    </strong>
                                    @if(!empty($user->getRoleNames()))
                                        <ul>
                                            @foreach($user->getRoleNames() as $role)
                                                <li class="text-muted">
                                                    {{ $role }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>

                                <div class="col-sm-4">
                                    <strong>
                                        <i class="material-icons">
                                            email
                                        </i>
                                    </strong>
                                    <p class="text-muted">
                                        {{ !empty($user->email_verified_at) ? $user->email.' (verified)' : $user->email.' (not-verified)' }}
                                    </p>
                                </div>

                                <div class="col-sm-4">
                                    <span class="material-icons">
                                        phone
                                    </span>
                                    <p class="text-muted">{{ $user->phone_number ? $user->phone_prefix.'-'.$user->phone_number : 'N/A'  }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                     <span class="material-icons">
                                        home
                                    </span>
                                    <p class="text-muted">
                                        {{ $user->address ? $user->address : 'N/A' }}
                                    </p>
                                </div>

                                <div class="col-sm-4">
                                     <span class="material-icons">
                                        event
                                    </span>
                                    <p class="text-muted">
                                        {{ $user->dob ? date('d M, Y', strtotime($user->dob)) : 'N/A'  }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>

@endsection
