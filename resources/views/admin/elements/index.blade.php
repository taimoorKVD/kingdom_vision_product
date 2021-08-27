@extends('admin.layouts.includes.dashboard')
@section('content')
 <!-- daterange picker -->
 <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <!-- Google Font: Source Sans Pro -->
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
 <!-- Font Awesome -->
 <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
 <!-- daterange picker -->
 <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
 <!-- iCheck for checkboxes and radio inputs -->
 <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
 <!-- Bootstrap Color Picker -->
 <link rel="stylesheet" href="{{asset('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
 <!-- Tempusdominus Bootstrap 4 -->
 <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
 <!-- Select2 -->
 <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
 <link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
 <!-- Bootstrap4 Duallistbox -->
 <link rel="stylesheet" href="{{asset('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
 <!-- BS Stepper -->
 <link rel="stylesheet" href="{{asset('plugins/bs-stepper/css/bs-stepper.min.css')}}">
 <!-- dropzonejs -->
 <link rel="stylesheet" href="{{asset('plugins/dropzone/min/dropzone.min.css')}}">
 <!-- Theme style -->
 <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
 <!-- Date Flat Pickr -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
 <!-- summernote -->
 <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">
 <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
 <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
  <!-- Trix Document Editor -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css">
  <!-- Data Table -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

<style>
 tfoot input {
  width: 100%;
  padding: 3px;
  box-sizing: border-box;
} 

progress {
    position: fixed;
    top: 0px;
    left: 250px;
    height: 12px;
    width: 87%;
    border-bottom: 1px;
}
</style>


<div class="content">
    <div class="container-fluid mt-2">
        <div class="row">
          {{-- users card --}}
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up bg-primary">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                               <h3 class="info">3</h3>
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
                             <h3 class="info">2</h3>
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

        {{-- element card  --}}
        <div class="col-xl-3 col-lg-6 col-12">
          <div class="card pull-up bg-lightblue">
              <div class="card-content">
                  <div class="card-body">
                      <div class="media d-flex">
                          <div class="media-body text-left">
                             <h3 class="info">5</h3>
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
        {{-- element card end --}}

        {{-- settings card --}}
        <div class="col-xl-3 col-lg-6 col-12">
          <div class="card pull-up bg-orange">
              <div class="card-content">
                  <div class="card-body">
                      <div class="media d-flex">
                          <div class="media-body text-left">
                            <h3 class="info" style="color: white;">5</h3>
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
        {{-- setting card end --}}
      </div>
    </div>
</div>
<!-- Content Wrapper. Contains page content -->
<div class="content">
  <!-- Main content -->
  {{-- <section class="content"> --}}
    <div class="container-fluid">
      <div class="card ">
          <form action="enhanced-results.html">
              <div class="row">
                  <div class="col-md-10 offset-md-1">
                    <div class="card-body">
                      <div class="row">
                          <div class="col-6">
                              <div class="form-group">
                                  <label>Result Type:</label>
                                  <select class="select2" multiple="multiple" data-placeholder="Any" style="width: 100%;">
                                      <option>Text only</option>
                                      <option>Images</option>
                                      <option>Video</option>
                                  </select>
                              </div>
                          </div>
                          <div class="col-3">
                              <div class="form-group">
                                  <label>Sort Order:</label>
                                  <select class="select2" style="width: 100%;">
                                      <option selected>ASC</option>
                                      <option>DESC</option>
                                  </select>
                              </div>
                          </div>
                          <div class="col-3">
                              <div class="form-group">
                                  <label>Order By:</label>
                                  <select class="select2" style="width: 100%;">
                                      <option selected>Title</option>
                                      <option>Date</option>
                                  </select>
                              </div>
                          </div>
                      </div>
                      </div>
                      <div class="form-group">
                          <div class="input-group input-group-lg">
                              <input type="search" class="form-control form-control-lg" placeholder="Type your keywords here" value="Lorem ipsum">
                              <div class="input-group-append">
                                  <button type="submit" class="btn btn-lg btn-default">
                                      <i class="fa fa-search"></i>
                                  </button>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </form>
      </div>
    </div>
  {{-- </section> --}}
</div>
<div class="content">
<div class="container-fluid">
  <div class="card card-default">
    <div class="card-header">
      <h3 class="card-title">Select2 (Default Theme)</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Minimal</label>
            <select class="form-control select2" style="width: 100%;">
              <option selected="selected">Alabama</option>
              <option>Alaska</option>
              <option>California</option>
              <option>Delaware</option>
              <option>Tennessee</option>
              <option>Texas</option>
              <option>Washington</option>
            </select>
          </div>
          <!-- /.form-group -->
          <div class="form-group">
            <label>Disabled</label>
            <select class="form-control select2" disabled="disabled" style="width: 100%;">
              <option selected="selected">Alabama</option>
              <option>Alaska</option>
              <option>California</option>
              <option>Delaware</option>
              <option>Tennessee</option>
              <option>Texas</option>
              <option>Washington</option>
            </select>
          </div>
          <!-- /.form-group -->
        </div>
        <!-- /.col -->
        <div class="col-md-6">
          <div class="form-group">
            <label>Multiple</label>
            <select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
              <option>Alabama</option>
              <option>Alaska</option>
              <option>California</option>
              <option>Delaware</option>
              <option>Tennessee</option>
              <option>Texas</option>
              <option>Washington</option>
            </select>
          </div>
          <!-- /.form-group -->
          <div class="form-group">
            <label>Disabled Result</label>
            <select class="form-control select2" style="width: 100%;">
              <option selected="selected">Alabama</option>
              <option>Alaska</option>
              <option disabled="disabled">California (disabled)</option>
              <option>Delaware</option>
              <option>Tennessee</option>
              <option>Texas</option>
              <option>Washington</option>
            </select>
          </div>
          <!-- /.form-group -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <h5>Custom Color Variants</h5>
      <div class="row">
        <div class="col-12 col-sm-6">
          <div class="form-group">
            <label>Minimal (.select2-danger)</label>
            <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
              <option selected="selected">Alabama</option>
              <option>Alaska</option>
              <option>California</option>
              <option>Delaware</option>
              <option>Tennessee</option>
              <option>Texas</option>
              <option>Washington</option>
            </select>
          </div>
          <!-- /.form-group -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6">
          <div class="form-group">
            <label>Multiple (.select2-purple)</label>
            <div class="select2-purple">
              <select class="select2" multiple="multiple" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;">
                <option>Alabama</option>
                <option>Alaska</option>
                <option>California</option>
                <option>Delaware</option>
                <option>Tennessee</option>
                <option>Texas</option>
                <option>Washington</option>
              </select>
            </div>
          </div>
          <!-- /.form-group -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.card-body -->
    
  </div>
</div>
</div>
<div class="row">
    <div class="col-md-6">
      <div class="card card-danger">
        <div class="card-header">
          <h3 class="card-title">Input masks</h3>
        </div>
        <div class="card-body">
          <!-- Date dd/mm/yyyy -->
          <div class="form-group">
            <label>Date masks:</label>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
              </div>
              <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
            </div>
            <!-- /.input group -->
          </div>
          <!-- /.form group -->

          <!-- Date mm/dd/yyyy -->
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
              </div>
              <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask>
            </div>
            <!-- /.input group -->
          </div>
          <!-- /.form group -->

          <!-- phone mask -->
          <div class="form-group">
            <label>US phone mask:</label>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-phone"></i></span>
              </div>
              <input type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask>
            </div>
            <!-- /.input group -->
          </div>
          <!-- /.form group -->

          <!-- phone mask -->
          <div class="form-group">
            <label>Intl US phone mask:</label>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-phone"></i></span>
              </div>
              <input type="text" class="form-control"
                     data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask>
            </div>
            <!-- /.input group -->
          </div>
          <!-- /.form group -->

          <!-- IP mask -->
          <div class="form-group">
            <label>IP mask:</label>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-laptop"></i></span>
              </div>
              <input type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask>
            </div>
            
            <!-- /.input group -->
          </div>
          
          <!-- /.form group -->

          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-dollar-sign"></i>
                </span>
              </div>
              <input type="number" class="form-control">
              <div class="input-group-append">
                <div class="input-group-text"><i class="fas fa-ambulance"></i></div>
              </div>
            </div>
          </div>

          <div class="form-group">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            </div>
            <input type="email" class="form-control" placeholder="Email">
          </div>
        </div>
        <div class="form-group">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">@</span>
              </div>
              <input type="text" class="form-control" placeholder="Username">
            </div>
          </div>

            <p>Small <code>.input-group.input-group-sm</code></p>
            <div class="input-group input-group-sm">
              <input type="text" class="form-control">
              <span class="input-group-append">
                <button type="button" class="btn btn-info btn-flat">Go!</button>
              </span>
            </div>

            <div class="form-group">
              <label for="exampleInputBorder">Bottom Border only <code>.form-control-border</code></label>
              <input type="text" class="form-control form-control-border" id="exampleInputBorder" placeholder=".form-control-border">
            </div>
            <div class="form-group">
              <input class="form-control form-control-lg" type="text" placeholder=".form-control-lg">
            </div>
            <div class="form-group">
              <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Input with
                success</label>
              <input type="text" class="form-control is-valid" id="inputSuccess" placeholder="Enter ...">
            </div>
            <div class="form-group">
              <label class="col-form-label" for="inputWarning"><i class="far fa-bell"></i> Input with
                warning</label>
              <input type="text" class="form-control is-warning" id="inputWarning" placeholder="Enter ...">
            </div>
            <div class="form-group">
              <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i> Input with
                error</label>
              <input type="text" class="form-control is-invalid" id="inputError" placeholder="Enter ...">
            </div>
          </div>
            
           
      </div>
      <!-- /.card -->
    </div>
    

    <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Date picker</h3>
          </div>
          <div class="card-body">
            <!-- Date -->
            <div class="form-group">
              <label>Date:</label>
                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
            <!-- Date and time -->
            <div class="form-group">
              <label>Date and time:</label>
                <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#reservationdatetime"/>
                    <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
            <!-- /.form group -->
            <!-- Date range -->
            <div class="form-group">
              <label>Date range:</label>

              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="far fa-calendar-alt"></i>
                  </span>
                </div>
                <input type="text" class="form-control float-right" id="reservation">
              </div>
              <!-- /.input group -->
            </div>
            <div class="form-group">
                <label>Date and time range:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-clock"></i></span>
                    </div>
                    <input type="text" class="form-control float-right" id="reservationtime">
                </div>
                <!-- /.input group -->
            </div>
              <!-- /.form group -->

              <!-- Date and time range -->
              <div class="form-group">
                <label>Date range button:</label>
                  <div class="input-group">
                    <button type="button" class="btn btn-default float-right" id="daterange-btn">
                      <i class="far fa-calendar-alt"></i> Date range picker
                      <i class="fas fa-caret-down"></i>
                    </button>
                  </div>
              </div>
              <div class="form-group">
                <label>Date Flat Pickr:</label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="" id="date_flat_pickr">
                  </div>
              </div>
              <div class="card card-secondary">
                <div class="card-header">
                  <h3 class="card-title">Custom Elements</h3>
                </div>
              </div>
            </div>
                <!-- /.card-header -->
               
                    <div class="row">
                        <div class="col-sm-6">
                          <!-- checkbox -->
                            <div class="form-group mt-2">
                              <div class="custom-control custom-checkbox ml-2">
                                <input class="custom-control-input custom-control-input-danger custom-control-input-outline" type="checkbox" id="customCheckbox5" checked>
                                <label for="customCheckbox5" class="custom-control-label">Custom Checkbox with custom color outline</label>
                              </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                        <!-- radio -->
                          <div class="custom-control custom-radio mt-2 ">
                            <input class="custom-control-input custom-control-input-danger" type="radio" id="customRadio4" name="customRadio2" checked>
                            <label for="customRadio4" class="custom-control-label">Custom Radio with custom color</label>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <!-- Checkbox -->
                          <div class="form-group clearfix ml-2">
                            <div class="icheck-primary d-inline">
                              <input type="checkbox" id="checkboxPrimary1" checked>
                              <label for="checkboxPrimary1">
                                 CheckBox
                              </label>
                            </div>
                          </div>
                        </div>
                          <div class="col-sm-6">
                            <!-- radio -->
                            <div class="form-group clearfix">
                              <div class="icheck-info d-inline">
                                <input type="radio" id="radioPrimary1" name="r1" checked>
                                <label for="radioPrimary1">
                                   RadioButton
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                           <!-- Bootstrap Switch -->
                          <div class="col-sm-6">
                            <div class="card card-secondary">
                              <div class="card-header">
                                <h3 class="card-title">Bootstrap Switches</h3>
                              </div>
                              <div class="card-body">
                                <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch>
                                <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                              </div>
                            </div>
                            <!-- /.card -->
                          </div>
                         
                        <div class="card card-success card-outline">
                          <div class="card-header">
                            <h3 class="card-title">
                              <i class="fas fa-edit"></i>
                              SweetAlert2 Examples
                            </h3>
                          </div>
                          <div class="card-body">
                            <button type="button" class="btn btn-success swalDefaultSuccess">
                              Launch Success Toast
                            </button>
                            <button type="button" class="btn btn-info swalDefaultInfo">
                              Launch Info Toast
                            </button>
                            <button type="button" class="btn btn-danger swalDefaultError">
                              Launch Error Toast
                            </button>
                            <button type="button" class="btn btn-warning swalDefaultWarning">
                              Launch Warning Toast
                            </button>
                          </div>
                          <!-- /.card -->
                        </div>
                        <div class="card card-info card-outline">
                          <div class="card-header">
                            <h3 class="card-title">
                              <i class="fas fa-edit"></i>
                              Toasts Examples <small>built in AdminLTE</small>
                            </h3>
                          </div>
                          <div class="card-body">
                            <button type="button" class="btn btn-success toastsDefaultSuccess">
                              Launch Success Toast
                            </button>
                            <button type="button" class="btn btn-info toastsDefaultInfo">
                              Launch Info Toast
                            </button>
                            <button type="button" class="btn btn-danger toastsDefaultDanger">
                              Launch Danger Toast
                            </button>
                            <button type="button" class="btn btn-primary mt-2 toastsDefaultFullImage">
                              Launch Full Toast (with image)
                            </button>
                          </div>
                        </div>

                     
                      <div class="card card-danger">
                        <div class="card-header">
                          <h3 class="card-title">Different Width</h3>
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-3">
                              <input type="text" class="form-control" placeholder=".col-3">
                            </div>
                            <div class="col-4">
                              <input type="text" class="form-control" placeholder=".col-4">
                            </div>
                            <div class="col-5">
                              <input type="text" class="form-control" placeholder=".col-5">
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
          <div class="row">
            <div class="col-md-6">
              <div class="card card-outline card-maroon">
                <div class="card-header">
                  <h3 class="card-title">
                    Summernote
                  </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <textarea id="summernote">
                    Place <em>some</em> <u>text</u> <strong>here</strong>
                  </textarea>
                </div>
            </div>
           </div>
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
    <div class="row">
      <div class="col-md-6">
        <div class="position-relative p-3 bg-info" style="height: 180px">
          <div class="ribbon-wrapper ribbon-xl">
            <div class="ribbon bg-warning">
              Ribbon
            </div>
          </div>
          Ribbon Default <br />
          <small>.ribbon-wrapper.ribbon-lg .ribbon</small>
        </div>
      </div>
 
      <div class="col-md-6">
        <div class="card d-flex flex-fill">
          <div class="card-header text-muted border-bottom-0">
            Digital Strategist
          </div>
          <div class="card-body pt-0">
            <div class="row">
              <div class="col-7">
                <h2 class="lead"><b>Nicole Pearson</b></h2>
                <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                <ul class="ml-4 mb-0 fa-ul text-muted">
                  <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                  <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                </ul>
              </div>
              <div class="col-5 text-center">
                <img src="https://www.qries.com/images/banner_logo.png" alt="user-avatar" class="img-circle img-fluid">
              </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="text-right">
              <a href="#" class="btn btn-sm bg-teal">
                <i class="fas fa-comments"></i>
              </a>
              <a href="#" class="btn btn-sm btn-primary">
                <i class="fas fa-user"></i> View Profile
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Modal Examples
            </h3>
          </div>
          <div class="card-body">
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
              Launch Default Modal
            </button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-primary">
              Launch Primary Modal
            </button>
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-secondary">
              Launch Secondary Modal
            </button>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info">
              Launch Info Modal
            </button>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">
              Launch Danger Modal
            </button>
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-warning">
              Launch Warning Modal
            </button>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-success">
              Launch Success Modal
            </button>
            <br />
            <br />
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-sm">
              Launch Small Modal
            </button>
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg">
              Launch Large Modal
            </button>
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-xl">
              Launch Extra Large Modal
            </button>
            <br />
            <br />
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-overlay">
              Launch Modal with Overlay
            </button>
          </div>
          <!-- /.card -->
        </div>
        <!-- Modal Start -->
        <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Default Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
  
        <div class="modal fade" id="modal-overlay">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="overlay">
                  <i class="fas fa-2x fa-sync fa-spin"></i>
              </div>
              <div class="modal-header">
                <h4 class="modal-title">Default Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
  
        <div class="modal fade" id="modal-primary">
          <div class="modal-dialog">
            <div class="modal-content bg-primary">
              <div class="modal-header">
                <h4 class="modal-title">Primary Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-light">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
  
        <div class="modal fade" id="modal-secondary">
          <div class="modal-dialog">
            <div class="modal-content bg-secondary">
              <div class="modal-header">
                <h4 class="modal-title">Secondary Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-light">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
  
        <div class="modal fade" id="modal-info">
          <div class="modal-dialog">
            <div class="modal-content bg-info">
              <div class="modal-header">
                <h4 class="modal-title">Info Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-light">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
  
        <div class="modal fade" id="modal-warning">
          <div class="modal-dialog">
            <div class="modal-content bg-warning">
              <div class="modal-header">
                <h4 class="modal-title">Warning Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-dark">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
  
        <div class="modal fade" id="modal-success">
          <div class="modal-dialog">
            <div class="modal-content bg-success">
              <div class="modal-header">
                <h4 class="modal-title">Success Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-light">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
  
        <div class="modal fade" id="modal-danger">
          <div class="modal-dialog">
            <div class="modal-content bg-danger">
              <div class="modal-header">
                <h4 class="modal-title">Danger Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-light">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
  
        <div class="modal fade" id="modal-sm">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Small Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
  
        <div class="modal fade" id="modal-lg">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Large Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
  
        <div class="modal fade" id="modal-xl">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Extra Large Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- End modal -->
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Projects</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fa fa-minus" aria-hidden="true"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                  <i class="fa fa-times" aria-hidden="true"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <table class="table table-striped projects table-hover">
                  <thead>
                      <tr>
                          <th style="width: 1%">
                              #
                          </th>
                          <th style="width: 20%">
                              Project Name
                          </th>
                          <th style="width: 30%">
                              Team Members
                          </th>
                          <th>
                              Project Progress
                          </th>
                          <th style="width: 8%" class="text-center">
                              Status
                          </th>
                          <th style="width: 20%">
                          </th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>
                              #
                          </td>
                          <td>
                              <a>
                                  AdminLTE v3
                              </a>
                              <br/>
                              <small>
                                  Created 01.01.2019
                              </small>
                          </td>
                          <td>
                              <ul class="list-inline">
                                  <li class="list-inline-item">
                                      <img alt="Avatar" class="table-avatar" src="{{asset('dist/img/avatar.png')}}">
                                  </li>
                                  <li class="list-inline-item">
                                      <img alt="Avatar" class="table-avatar" src="{{asset('dist/img/avatar2.png')}}">
                                  </li>
                                  <li class="list-inline-item">
                                      <img alt="Avatar" class="table-avatar" src="{{asset('dist/img/avatar3.png')}}">
                                  </li>
                                  <li class="list-inline-item">
                                      <img alt="Avatar" class="table-avatar" src="{{asset('dist/img/avatar4.png')}}">
                                  </li>
                              </ul>
                          </td>
                          <td class="project_progress">
                              <div class="progress progress-sm">
                                  <div class="progress-bar bg-green" role="progressbar" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100" style="width: 57%">
                                  </div>
                              </div>
                              <small>
                                  57% Complete
                              </small>
                          </td>
                          <td class="project-state">
                              <span class="badge badge-success">Success</span>
                          </td>
                          <td class="project-actions text-right">
                              <a class="btn btn-primary btn-sm" href="#">
                                  <i class="fa fa-eye">
                                  </i>
                                  View
                              </a>
                              <a class="btn btn-info btn-sm" href="#">
                                  <i class="fas fa-pencil-alt">
                                  </i>
                                  Edit
                              </a>
                              <a class="btn btn-danger btn-sm" href="#">
                                  <i class="fas fa-trash">
                                  </i>
                                  Delete
                              </a>
                          </td>
                      </tr>
                      <tr>
                          <td>
                              #
                          </td>
                          <td>
                              <a>
                                  AdminLTE v3
                              </a>
                              <br/>
                              <small>
                                  Created 01.01.2019
                              </small>
                          </td>
                          <td>
                              <ul class="list-inline">
                                  <li class="list-inline-item">
                                      <img alt="Avatar" class="table-avatar" src="{{asset('dist/img/avatar.png')}}">
                                  </li>
                                  <li class="list-inline-item">
                                      <img alt="Avatar" class="table-avatar" src="{{asset('dist/img/avatar2.png')}}">
                                  </li>
                              </ul>
                          </td>
                          <td class="project_progress">
                              <div class="progress progress-sm">
                                  <div class="progress-bar bg-green" role="progressbar" aria-valuenow="47" aria-valuemin="0" aria-valuemax="100" style="width: 47%">
                                  </div>
                              </div>
                              <small>
                                  47% Complete
                              </small>
                          </td>
                          <td class="project-state">
                              <span class="badge badge-success">Success</span>
                          </td>
                          <td class="project-actions text-right">
                              <a class="btn btn-primary btn-sm" href="#">
                                  <i class="fa fa-eye">
                                  </i>
                                  View
                              </a>
                              <a class="btn btn-info btn-sm" href="#">
                                  <i class="fas fa-pencil-alt">
                                  </i>
                                  Edit
                              </a>
                              <a class="btn btn-danger btn-sm" href="#">
                                  <i class="fas fa-trash">
                                  </i>
                                  Delete
                              </a>
                          </td>
                      </tr>
                      <tr>
                          <td>
                              #
                          </td>
                          <td>
                              <a>
                                  AdminLTE v3
                              </a>
                              <br/>
                              <small>
                                  Created 01.01.2019
                              </small>
                          </td>
                          <td>
                              <ul class="list-inline">
                                  <li class="list-inline-item">
                                      <img alt="Avatar" class="table-avatar" src="{{asset('dist/img/avatar.png')}}">
                                  </li>
                                  <li class="list-inline-item">
                                      <img alt="Avatar" class="table-avatar" src="{{asset('dist/img/avatar2.png')}}">
                                  </li>
                                  <li class="list-inline-item">
                                      <img alt="Avatar" class="table-avatar" src="{{asset('dist/img/avatar3.png')}}">
                                  </li>
                              </ul>
                          </td>
                          <td class="project_progress">
                              <div class="progress progress-sm">
                                  <div class="progress-bar bg-green" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%">
                                  </div>
                              </div>
                              <small>
                                  77% Complete
                              </small>
                          </td>
                          <td class="project-state">
                              <span class="badge badge-success">Success</span>
                          </td>
                          <td class="project-actions text-right">
                              <a class="btn btn-primary btn-sm" href="#">
                                  <i class="fa fa-eye">
                                  </i>
                                  View
                              </a>
                              <a class="btn btn-info btn-sm" href="#">
                                  <i class="fas fa-pencil-alt">
                                  </i>
                                  Edit
                              </a>
                              <a class="btn btn-danger btn-sm" href="#">
                                  <i class="fas fa-trash">
                                  </i>
                                  Delete
                              </a>
                          </td>
                      </tr>
                      <tr>
                          <td>
                              #
                          </td>
                          <td>
                              <a>
                                  AdminLTE v3
                              </a>
                              <br/>
                              <small>
                                  Created 01.01.2019
                              </small>
                          </td>
                          <td>
                              <ul class="list-inline">
                                  <li class="list-inline-item">
                                      <img alt="Avatar" class="table-avatar" src="{{asset('dist/img/avatar.png')}}">
                                  </li>
                                  <li class="list-inline-item">
                                      <img alt="Avatar" class="table-avatar" src="{{asset('dist/img/avatar2.png')}}">
                                  </li>
                                  <li class="list-inline-item">
                                      <img alt="Avatar" class="table-avatar" src="{{asset('dist/img/avatar3.png')}}">
                                  </li>
                                  <li class="list-inline-item">
                                      <img alt="Avatar" class="table-avatar" src="{{asset('dist/img/avatar4.png')}}">
                                  </li>
                              </ul>
                          </td>
                          <td class="project_progress">
                              <div class="progress progress-sm">
                                  <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                  </div>
                              </div>
                              <small>
                                  60% Complete
                              </small>
                          </td>
                          <td class="project-state">
                              <span class="badge badge-success">Success</span>
                          </td>
                          <td class="project-actions text-right">
                              <a class="btn btn-primary btn-sm" href="#">
                                  <i class="fa fa-eye">
                                  </i>
                                  View
                              </a>
                              <a class="btn btn-info btn-sm" href="#">
                                  <i class="fas fa-pencil-alt">
                                  </i>
                                  Edit
                              </a>
                              <a class="btn btn-danger btn-sm" href="#">
                                  <i class="fas fa-trash">
                                  </i>
                                  Delete
                              </a>
                          </td>
                      </tr>
                      <tr>
                          <td>
                              #
                          </td>
                          <td>
                              <a>
                                  AdminLTE v3
                              </a>
                              <br/>
                              <small>
                                  Created 01.01.2019
                              </small>
                          </td>
                          <td>
                              <ul class="list-inline">
                                  <li class="list-inline-item">
                                      <img alt="Avatar" class="table-avatar" src="{{asset('dist/img/avatar.png')}}">
                                  </li>
                                  <li class="list-inline-item">
                                      <img alt="Avatar" class="table-avatar" src="{{asset('dist/img/avatar4.png')}}">
                                  </li>
                                  <li class="list-inline-item">
                                      <img alt="Avatar" class="table-avatar" src="{{asset('dist/img/avatar5.png')}}">
                                  </li>
                              </ul>
                          </td>
                          <td class="project_progress">
                              <div class="progress progress-sm">
                                  <div class="progress-bar bg-green" role="progressbar" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100" style="width: 12%">
                                  </div>
                              </div>
                              <small>
                                  12% Complete
                              </small>
                          </td>
                          <td class="project-state">
                              <span class="badge badge-success">Success</span>
                          </td>
                          <td class="project-actions text-right">
                              <a class="btn btn-primary btn-sm" href="#">
                                  <i class="fa fa-eye">
                                  </i>
                                  View
                              </a>
                              <a class="btn btn-info btn-sm" href="#">
                                  <i class="fas fa-pencil-alt">
                                  </i>
                                  Edit
                              </a>
                              <a class="btn btn-danger btn-sm" href="#">
                                  <i class="fas fa-trash">
                                  </i>
                                  Delete
                              </a>
                          </td>
                      </tr>
                  </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
      </div>
    </div>
    <div class="row">
      <div class="container-fluid">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <table id="example" class="display" style="width:100%">
              <thead>
                  <tr>
                      <th>Name</th>
                      <th>Position</th>
                      <th>Office</th>
                      <th>Age</th>
                      <th>Start date</th>
                      <th>Salary</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>Tiger Nixon</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>
                      <td>61</td>
                      <td>2011/04/25</td>
                      <td>$320,800</td>
                  </tr>
                  <tr>
                      <td>Garrett Winters</td>
                      <td>Accountant</td>
                      <td>Tokyo</td>
                      <td>63</td>
                      <td>2011/07/25</td>
                      <td>$170,750</td>
                  </tr>
                  <tr>
                      <td>Ashton Cox</td>
                      <td>Junior Technical Author</td>
                      <td>San Francisco</td>
                      <td>66</td>
                      <td>2009/01/12</td>
                      <td>$86,000</td>
                  </tr>
                  <tr>
                      <td>Cedric Kelly</td>
                      <td>Senior Javascript Developer</td>
                      <td>Edinburgh</td>
                      <td>22</td>
                      <td>2012/03/29</td>
                      <td>$433,060</td>
                  </tr>
                  <tr>
                      <td>Airi Satou</td>
                      <td>Accountant</td>
                      <td>Tokyo</td>
                      <td>33</td>
                      <td>2008/11/28</td>
                      <td>$162,700</td>
                  </tr> </tbody>
                  <tfoot>
                      <tr>
                          <th>Name</th>
                          <th>Position</th>
                          <th>Office</th>
                          <th>Age</th>
                          <th>Start date</th>
                          <th>Salary</th>
                      </tr>
                  </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body pad table-responsive">
      <table class="table table-bordered text-center">
        <tr>
          <th>Normal</th>
          <th>Large <code>.btn-lg</code></th>
          <th>Small <code>.btn-sm</code></th>
          <th>Extra Small <code>.btn-xs</code></th>
          <th>Flat <code>.btn-flat</code></th>
          <th>Disabled <code>.disabled</code></th>
        </tr>
        <tr>
          <td>
            <button type="button" class="btn btn-block btn-danger">Danger</button>
          </td>
          <td>
            <button type="button" class="btn btn-block btn-danger btn-lg">Danger</button>
          </td>
          <td>
            <button type="button" class="btn btn-block btn-danger btn-sm">Danger</button>
          </td>
          <td>
            <button type="button" class="btn btn-block btn-danger btn-xs">Danger</button>
          </td>
          <td>
            <button type="button" class="btn btn-block btn-danger btn-flat">Danger</button>
          </td>
          <td>
            <button type="button" class="btn btn-block btn-danger disabled">Danger</button>
          </td>
        </tr>
        <tr>
          <td>
            <button type="button" class="btn btn-block btn-primary">Primary</button>
          </td>
          <td>
            <button type="button" class="btn btn-block btn-primary btn-lg">Primary</button>
          </td>
          <td>
            <button type="button" class="btn btn-block btn-primary btn-sm">Primary</button>
          </td>
          <td>
            <button type="button" class="btn btn-block btn-primary btn-xs">Primary</button>
          </td>
          <td>
            <button type="button" class="btn btn-block btn-primary btn-flat">Primary</button>
          </td>
          <td>
            <button type="button" class="btn btn-block btn-primary disabled">Primary</button>
          </td>
        </tr>
        
        
      </table>
    </div>
    <!-- /.card -->

<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Bordered Table</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Task</th>
              <th>Progress</th>
              <th style="width: 40px">Label</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1.</td>
              <td>Update software</td>
              <td>
                <div class="progress progress-xs">
                  <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                </div>
              </td>
              <td><span class="badge bg-danger">55%</span></td>
            </tr>
            <tr>
              <td>2.</td>
              <td>Clean database</td>
              <td>
                <div class="progress progress-xs">
                  <div class="progress-bar bg-warning" style="width: 70%"></div>
                </div>
              </td>
              <td><span class="badge bg-warning">70%</span></td>
            </tr>
            <tr>
              <td>3.</td>
              <td>Cron job running</td>
              <td>
                <div class="progress progress-xs progress-striped active">
                  <div class="progress-bar bg-primary" style="width: 30%"></div>
                </div>
              </td>
              <td><span class="badge bg-primary">30%</span></td>
            </tr>
            <tr>
              <td>4.</td>
              <td>Fix and squish bugs</td>
              <td>
                <div class="progress progress-xs progress-striped active">
                  <div class="progress-bar bg-success" style="width: 90%"></div>
                </div>
              </td>
              <td><span class="badge bg-success">90%</span></td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">
          <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
        </ul>
      </div>
    </div>
</div>
<div class="col-md-6">
  <!-- USERS LIST -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Latest Members</h3>

      <div class="card-tools">
        <span class="badge badge-success">8 New Members</span>
        {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
          <i class="fas fa-times"></i>
        </button> --}}
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
      <ul class="users-list clearfix">
        <li>
          <img src="{{asset('dist/img/user1-128x128.jpg')}}" alt="User Image">
          <a class="users-list-name" href="#">Alexander Pierce</a>
          <span class="users-list-date">Today</span>
        </li>
        <li>
          <img src="{{asset('dist/img/user8-128x128.jpg')}}" alt="User Image">
          <a class="users-list-name" href="#">Norman</a>
          <span class="users-list-date">Yesterday</span>
        </li>
        <li>
          <img src="{{asset('dist/img/user7-128x128.jpg')}}" alt="User Image">
          <a class="users-list-name" href="#">Jane</a>
          <span class="users-list-date">12 Jan</span>
        </li>
        <li>
          <img src="{{asset('dist/img/user6-128x128.jpg')}}" alt="User Image">
          <a class="users-list-name" href="#">John</a>
          <span class="users-list-date">12 Jan</span>
        </li>
        <li>
          <img src="{{asset('dist/img/user2-160x160.jpg')}}" alt="User Image">
          <a class="users-list-name" href="#">Alexander</a>
          <span class="users-list-date">13 Jan</span>
        </li>
        <li>
          <img src="{{asset('dist/img/user5-128x128.jpg')}}" alt="User Image">
          <a class="users-list-name" href="#">Sarah</a>
          <span class="users-list-date">14 Jan</span>
        </li>
        <li>
          <img src="{{asset('dist/img/user4-128x128.jpg')}}" alt="User Image">
          <a class="users-list-name" href="#">Nora</a>
          <span class="users-list-date">15 Jan</span>
        </li>
        <li>
          <img src="{{asset('dist/img/user3-128x128.jpg')}}" alt="User Image">
          <a class="users-list-name" href="#">Nadia</a>
          <span class="users-list-date">15 Jan</span>
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
</div>

@endsection

@section('scripts')
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
<!-- InputMask -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/inputmask/jquery.inputmask.min.js')}}"></script>
<!-- date-range-picker -->
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- bootstrap color picker -->
<script src="{{asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Bootstrap Switch -->
<script src="{{asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<!-- BS-Stepper -->
<script src="{{asset('plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>
<!-- dropzonejs -->
<script src="{{asset('plugins/dropzone/min/dropzone.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- Date Flat Pickr -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<!-- Bootstrap Switch -->
<script src="{{asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- Trix Document Editor -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"> </script>
<!-- Data Table -->
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
 <!-- The End -->


 
<script>
$(function () {
   // Summernote
   $('#summernote').summernote()

  flatpickr('#date_flat_pickr',{
                enableTime:true
            });
            
  //Initialize Select2 Elements
  $('.select2').select2()

  //Initialize Select2 Elements
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  });
   //Datemask dd/mm/yyyy
   $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.swalDefaultSuccess').click(function() {
      Toast.fire({
        icon: 'success',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultInfo').click(function() {
      Toast.fire({
        icon: 'info',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultError').click(function() {
      Toast.fire({
        icon: 'error',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultWarning').click(function() {
      Toast.fire({
        icon: 'warning',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultQuestion').click(function() {
      Toast.fire({
        icon: 'question',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });

    $('.toastrDefaultSuccess').click(function() {
      toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultInfo').click(function() {
      toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultError').click(function() {
      toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultWarning').click(function() {
      toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });

    $('.toastsDefaultDefault').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultTopLeft').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'topLeft',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultBottomRight').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'bottomRight',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultBottomLeft').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'bottomLeft',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultAutohide').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        autohide: true,
        delay: 750,
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultNotFixed').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        fixed: false,
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultFull').click(function() {
      $(document).Toasts('create', {
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        icon: 'fas fa-envelope fa-lg',
      })
    });
    $('.toastsDefaultFullImage').click(function() {
      $(document).Toasts('create', {
        class: 'bg-primary',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        image: "{{asset('dist/img/user3-128x128.jpg')}}",
        imageAlt: 'User Picture',
      })
    });
    $('.toastsDefaultSuccess').click(function() {
      $(document).Toasts('create', {
        class: 'bg-success',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultInfo').click(function() {
      $(document).Toasts('create', {
        class: 'bg-info',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultWarning').click(function() {
      $(document).Toasts('create', {
        class: 'bg-warning',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultDanger').click(function() {
      $(document).Toasts('create', {
        class: 'bg-danger',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultMaroon').click(function() {
      $(document).Toasts('create', {
        class: 'bg-maroon',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

    $('#example tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example').DataTable({
        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;
 
                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        }
    });
    $(window).scroll(function () {
      var s = $(window).scrollTop(),
        d = $(document).height(),
        c = $(window).height();
        scrollPercent = (s / (d-c)) * 100;
        var position = scrollPercent;
        $("#progressbar").attr('value', position);
});
});
</script>

@endsection