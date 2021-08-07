@if ($message = Session::get('error-message'))
    <div class="card card-danger card-outline alert-card-danger">
        <ul class="list-group text-danger">
            <li class="list-group-item">
                {{ $message }}
            </li>
        </ul>
    </div>
@endif

@if ($message = Session::get('success-message'))
    <div class="card card-success card-outline alert-card-success">
        <ul class="list-group text-success">
            <li class="list-group-item">
                {{ $message }}
            </li>
        </ul>
    </div>
@endif

@if ($message = Session::get('info-message'))
    <div class="card card-info card-outline alert-card-info">
        <ul class="list-group text-info">
            <li class="list-group-item">
                {{ $message }}
            </li>
        </ul>
    </div>
@endif

@if($errors->any())
    <div class="card card-danger card-outline alert-card-danger">
        <ul class="list-group text-danger">
            @foreach($errors->all() as $error)
                <li class="list-group-item">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
