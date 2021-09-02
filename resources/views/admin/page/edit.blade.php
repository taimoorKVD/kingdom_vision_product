@extends('admin.layouts.includes.dashboard')

@section('content')
    <style>
        .select2-container {
            width: 87% !important;
        }
    </style>
    <link rel="stylesheet" href="{{asset('admin-panel/vendor/laraberg/css/laraberg.css')}}">

    @include('admin.layouts.includes.page-content-header')

    <div class="row">
        <div class="col-lg-12">
            <div class="card card-secondary card-outline">
                <form method="POST" action="{{ route('pages.update', $page) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="title">Title</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text fas fa-heading"></span>
                                    </div>
                                    <input type="text" name="title" id="title" class="form-control" value="{{ $page->title ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="slug">Slug</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text fab fa-stripe-s"></span>
                                    </div>
                                    <input type="text" name="slug" id="slug" class="form-control" value="{{ $page->slug }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="menu_type">Menu Type</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text fa fa-list"></span>
                                    </div>
                                    <select type="text" name="menu_type" id="menu_type" class="form-control menu_type">
                                        <option selected disabled>Choose an option</option>
                                        <option value="header" {{ !empty($page->menu_type) && $page->menu_type == "header" ? 'selected' : null }}>Header</option>
                                        <option value="footer" {{ !empty($page->menu_type) && $page->menu_type == "footer" ? 'selected' : null }}>Footer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="builder"></label>
                                <textarea id="builder" name="builder" hidden>{{ $page->lb_raw_content }}</textarea>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-secondary btn-wd">
                            <span class="material-icons">
                                update
                            </span>
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="https://unpkg.com/react@16.8.6/umd/react.production.min.js"></script>
    <script src="https://unpkg.com/react-dom@16.8.6/umd/react-dom.production.min.js"></script>
    <script src="{{ asset('admin-panel/vendor/laraberg/js/laraberg.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.menu_type').select2();
        });
        window.addEventListener('DOMContentLoaded', () => {
            Laraberg.init('builder', { height: '700px', laravelFilemanager: true, sidebar: true, })
        });
    </script>
@endsection

