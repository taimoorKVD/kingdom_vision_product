<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }} | {{ ucfirst(request()->segment(2)) }}</title>
    <link rel="shortcut icon" type="image/jpg" href="{{ url('storage/app/'.config('app.favicon')) }}"/>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

    {{--  SELECT 2  --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    {{-- APP CSS  --}}
    <link rel="stylesheet" href="{{ asset('admin-panel/css/main.css') }}">

    {{-- CUSTOM CSS --}}
    <style>
        .custom-control-input:checked ~ .custom-control-label::before {
            border-color: lightgray;
            background-color: gray;
        }

        .dashboard-active {
            background-color:rgba(255,255,255,.9);
            color: #343a40 !important;
        }

        #preview {
            color:#343a40 !important;
        }

    </style>

    @yield('css')
</head>
