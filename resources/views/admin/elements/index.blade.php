@extends('admin.layouts.includes.dashboard')
@section('content')
 
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">CPU Traffic</span>
                    <span class="info-box-number">
                    10
                    <small>%</small>
                    </span>
                </div>
                <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">CPU Traffic</span>
                    <span class="info-box-number">
                    10
                    <small>%</small>
                    </span>
                </div>
                <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">CPU Traffic</span>
                    <span class="info-box-number">
                    10
                    <small>%</small>
                    </span>
                </div>
                <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">CPU Traffic</span>
                    <span class="info-box-number">
                    10
                    <small>%</small>
                    </span>
                </div>
                <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
<div class="card card-default">
    <div class="card-header">
      <h3 class="card-title">Select2 (Bootstrap4 Theme)</h3>

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
            <select class="form-control select2bs4" style="width: 100%;">
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
            <select class="form-control select2bs4" disabled="disabled" style="width: 100%;">
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
            <select class="select2bs4" multiple="multiple" data-placeholder="Select a State"
                    style="width: 100%;">
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
            <select class="form-control select2bs4" style="width: 100%;">
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

        </div>
        <!-- /.card-body -->
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
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">iCheck Bootstrap - Checkbox &amp; Radio Inputs</h3>
      </div>
      <div class="card-body">
        <!-- Minimal style -->
        <div class="row">
          <div class="col-sm-6">
            <!-- checkbox -->
            <div class="form-group clearfix">
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary1" checked>
                <label for="checkboxPrimary1">
                </label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary2">
                <label for="checkboxPrimary2">
                </label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3" disabled>
                <label for="checkboxPrimary3">
                  Primary checkbox
                </label>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <!-- radio -->
            <div class="form-group clearfix">
              <div class="icheck-primary d-inline">
                <input type="radio" id="radioPrimary1" name="r1" checked>
                <label for="radioPrimary1">
                </label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="radio" id="radioPrimary2" name="r1">
                <label for="radioPrimary2">
                </label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="radio" id="radioPrimary3" name="r1" disabled>
                <label for="radioPrimary3">
                  Primary radio
                </label>
              </div>
            </div>
          </div>
        </div>
        <!-- Minimal red style -->
        <div class="row">
          <div class="col-sm-6">
            <!-- checkbox -->
            <div class="form-group clearfix">
              <div class="icheck-danger d-inline">
                <input type="checkbox" checked id="checkboxDanger1">
                <label for="checkboxDanger1">
                </label>
              </div>
              <div class="icheck-danger d-inline">
                <input type="checkbox" id="checkboxDanger2">
                <label for="checkboxDanger2">
                </label>
              </div>
              <div class="icheck-danger d-inline">
                <input type="checkbox" disabled id="checkboxDanger3">
                <label for="checkboxDanger3">
                  Danger checkbox
                </label>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <!-- radio -->
            <div class="form-group clearfix">
              <div class="icheck-danger d-inline">
                <input type="radio" name="r2" checked id="radioDanger1">
                <label for="radioDanger1">
                </label>
              </div>
              <div class="icheck-danger d-inline">
                <input type="radio" name="r2" id="radioDanger2">
                <label for="radioDanger2">
                </label>
              </div>
              <div class="icheck-danger d-inline">
                <input type="radio" name="r2" disabled id="radioDanger3">
                <label for="radioDanger3">
                  Danger radio
                </label>
              </div>
            </div>
          </div>
        </div>
        <!-- Minimal red style -->
        <div class="row">
          <div class="col-sm-6">
            <!-- checkbox -->
            <div class="form-group clearfix">
              <div class="icheck-success d-inline">
                <input type="checkbox" checked id="checkboxSuccess1">
                <label for="checkboxSuccess1">
                </label>
              </div>
              <div class="icheck-success d-inline">
                <input type="checkbox" id="checkboxSuccess2">
                <label for="checkboxSuccess2">
                </label>
              </div>
              <div class="icheck-success d-inline">
                <input type="checkbox" disabled id="checkboxSuccess3">
                <label for="checkboxSuccess3">
                  Success checkbox
                </label>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <!-- radio -->
            <div class="form-group clearfix">
              <div class="icheck-success d-inline">
                <input type="radio" name="r3" checked id="radioSuccess1">
                <label for="radioSuccess1">
                </label>
              </div>
              <div class="icheck-success d-inline">
                <input type="radio" name="r3" id="radioSuccess2">
                <label for="radioSuccess2">
                </label>
              </div>
              <div class="icheck-success d-inline">
                <input type="radio" name="r3" disabled id="radioSuccess3">
                <label for="radioSuccess3">
                  Success radio
                </label>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>
@endsection

