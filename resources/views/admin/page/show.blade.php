@extends('admin.layouts.includes.dashboard')

@section('content')
    <link rel="stylesheet" href="{{asset('admin-panel/vendor/laraberg/css/laraberg.css')}}">

    @include('admin.layouts.includes.page-content-header')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="card card-secondary card-outline">
                <div class="card-body">
                    {!! $page->lb_content !!}
                </div>
            </div>
        </div>
    </div>

@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://unpkg.com/moment@2.22.1/min/moment.min.js"></script>
<script src="https://unpkg.com/react@16.8.6/umd/react.production.min.js"></script>
<script src="https://unpkg.com/react-dom@16.8.6/umd/react-dom.production.min.js"></script>
<script src="{{ asset('admin-panel/vendor/laraberg/js/laraberg.js') }}"></script>
