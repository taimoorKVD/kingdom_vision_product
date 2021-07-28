<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
{{--                <h1 class="m-0">{{ ucfirst(request()->segment(2)) }}</h1>--}}
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item" {{ !request()->segment(3) ? null : 'active' }}>{{ ucfirst(request()->segment(2)) }}</li>
                    @if(request()->segment(2) != "dashboard")
                        <li class="breadcrumb-item {{ !request()->segment(3) ? 'active' : null }}">{{ ucfirst(!request()->segment(3) ? 'Index' : null) }}</li>
                    @endif
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
