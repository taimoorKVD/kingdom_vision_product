@extends('admin.layouts.includes.dashboard')

@section('content')

    @include('admin.layouts.includes.page-content-header')

    <div class="row mt-3" >
          {{-- users card --}}

        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up bg-primary">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                               <h3 class="info">{{$totalUsers}}</h3>
                                <a href="{{ route('users.index') }}" class="small-box-footer"><h6 style="color: white;">Users</h6></a>
                            </div>
                            <div>
                                <i class="fa fa-users fa-3x float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- users card end --}}
        
        {{-- roles card --}}
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up bg-success">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                               <h3 class="info">{{$totalRoles}}</h3>
                                <a href="{{ route('roles.index') }}" class="small-box-footer"><h6 style="color: white;">Roles</h6></a>
                            </div>
                            <div>
                                <i class="fa fa-tasks fa-3x float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- roles card end --}}

        {{-- elements card --}}
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up bg-lightblue">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                               <h3 class="info">{{$totalUsers}}</h3>
                                <a href="{{ route('elements.index') }}" class="small-box-footer"><h6 style="color: white;">Elements</h6></a>
                            </div>
                            <div>
                                <i class="fa fa-table fa-3x float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- elements card end --}}

        {{-- settings card --}}
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up bg-orange">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                               <h3 class="info" style="color: white;">{{$totalUsers}}</h3>
                                <a href="{{ route('settings.index') }}" class="small-box-footer"><h6 style="color: white;">Settings</h6></a>
                            </div>
                            <div>
                                <i class="fa fa-cog fa-3x float-right" style="color: white;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- settings card end --}}
    </div>
   
    <div class="row" id="sortable">
    <div class="col-md-6">
        <!-- USERS LIST -->
        <div class="card bg-dark">
          <div class="card-header">
            <h3 class="card-title">Latest Members</h3>
      
            <div class="card-tools">
              <span class="badge badge-danger">Members</span>
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <ul class="users-list clearfix">
              <li>
                <img src="{{asset('dist/img/user1-128x128.jpg')}}" alt="User Image">
                <a class="users-list-name" href="#">Alexander Pierce</a>
                <span class="badge badge-success">Manager</span>
                
              </li>
              <li>
                <img src="{{asset('dist/img/user8-128x128.jpg')}}" alt="User Image">
                <a class="users-list-name" href="#">Norman</a>
                <span class="badge badge-info">Admin</span>
              </li>
              <li>
                <img src="{{asset('dist/img/user7-128x128.jpg')}}" alt="User Image">
                <a class="users-list-name" href="#">Jane</a>
                <span class="badge badge-primary">Head</span>
              </li>
              <li>
                <img src="{{asset('dist/img/user6-128x128.jpg')}}" alt="User Image">
                <a class="users-list-name" href="#">John</a>
                <span class="badge badge-warning">HR</span>
              </li>
            </ul>
            <!-- /.users-list -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer text-center">
            <a href="javascript:">View All Users</a>
          </div>
          <!-- /.card-footer -->
        </div>
        <!--/.card -->
      </div>
      <!-- /.col -->
      <div class="col-md-6">
          <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="content">Content</label>
                    <input id="content" type="hidden" name="content" value="">
                    <trix-editor input="content"></trix-editor>
                </div>
            </div>
        </div>
      </div>
    </div>
@endsection
   

@section('scripts')
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" ></script>
<script>
  $( function() {
    // alert("Hello");
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
  } );
  </script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"> </script>

@endsection