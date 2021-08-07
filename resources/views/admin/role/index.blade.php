@extends('admin.layouts.includes.dashboard')

@section('content')
    @include('admin.layouts.includes.page-content-header-for-listing')

    {{-- BODY --}}
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="card card-secondary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Data Filters</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body collapsed-box" style="display:none">
                    <form id="filter" action="#" novalidate>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="search" id="name" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="search">Search</label>
                                    <input id="search" type="search" class="form-control" name="search">
                                </div>
                            </div>
                            <div class="col-12 text-right">
                                <button type="submit" class="btn btn-info btn-wd"><span class="material-icons">filter_alt</span> Filter</button>
                                <button id="clear" type="reset" class="btn btn-wd"><span class="material-icons">refresh</span> Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card card-secondary card-outline">
                <div class="card-body">
                    <div id="table-content">
                        @include('admin.partial.loading-table')
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.partial.modal')
    {{-- END BODY --}}

@endsection

@section('scripts')
    <script>
        let loading;
        function load_records(page, url){
            $('#table-content').html(loading);
            let form = $('#filter').serialize();
            url = url ? url : `{{ route('role.listing') }}?${form}&page=${page}`;
            axios.get(url).then((response)=>{
                $('#table-content').html(response.data);
            })
        }

        document.addEventListener("DOMContentLoaded", ()=>{
            loading = $('#table-content').html();
            load_records(1);
        });

        document.getElementById('clear').addEventListener('click',function(){
            document.getElementById("filter").reset();
            load_records(1);
        });

        document.getElementById("filter").addEventListener('submit',(e)=>{
            e.preventDefault();
            load_records(1);
        });

        $(document).on('click','.page-item:not(.active) .page-link',function (e) {
            e.preventDefault();
            let href = $(this).prop('href');
            load_records(null,href);
        });

        function reload_current_page(){
            let url,page = 1;
            if($(document).find('.page-item.active .page-link').length){
                page = parseInt($(document).find('.page-item.active .page-link').text());
            }
            req = $('#filter').serialize();
            url = `{{ route('role.listing') }}?${req}&page=${page}`;
            load_records(page,url);
        }
    </script>
@endsection
