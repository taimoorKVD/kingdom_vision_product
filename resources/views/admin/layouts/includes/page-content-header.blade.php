<!-- Content Header (Page header) -->
<div class="content-header">
    @include('admin.partial.alert')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">
                    {{ $title }}
                </h1>
            </div>
            <!-- /.col -->
            @if(request()->segment(2) !== "settings" && request()->segment(2) !== "dashboard")
            <div class="col-sm-6">
                <div class="d-flex justify-content-end">
                    <a href="{{ $backBtnRoute }}" class="btn btn-secondary btn-sm">
                        <span class="material-icons">arrow_back_ios</span>
                        Back
                    </a>
                </div>
            </div>
            @endif
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-header -->
