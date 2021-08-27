<div class="row mb-3">

    {{-- DYNAMIC PAGINATION OPTION --}}
    <div class="col-sm-2">
        <label for="{{ $singularTitle }}_paginate"></label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <b>Show</b>
                </span>
            </div>
            <select class="form-control" id="{{ $singularTitle }}_paginate" name="{{ $singularTitle }}_paginate">
                <option
                    value="10" {{ isset($currPaginate) && !empty($currPaginate) && $currPaginate == '10' ? 'selected' : null }} >
                    10
                </option>
                <option
                    value="25" {{ isset($currPaginate) && !empty($currPaginate) && $currPaginate  == '25' ? 'selected' : null }}>
                    25
                </option>
                <option
                    value="50" {{ isset($currPaginate) && !empty($currPaginate) && $currPaginate  == '50' ? 'selected' : null }}>
                    50
                </option>
                <option
                    value="100" {{ isset($currPaginate) && !empty($currPaginate) && $currPaginate  == '100' ? 'selected' : null }}>
                    100
                </option>
            </select>
        </div>
    </div>
    {{-- END DYNAMIC PAGINATION OPTION --}}

    {{-- BULK DELETION OPTION --}}
    <div class="col-sm-3">
        <label for="{{ $singularTitle }}_delete"></label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <b>Bulk Actions</b>
                </span>
            </div>
            <select class="form-control" id="{{ $singularTitle }}_delete">
                <option value="0">Choose</option>
                <option value="delete">Delete</option>
            </select>
        </div>
    </div>

    <div class="col-sm-3 d-none delete_btn">
        <a href="javascript:void(0)" class="btn btn-danger mt-4" id="delete_checked_val">
            <span class="material-icons">delete</span>
        </a>
        <a href="javascript:void(0)" class="btn mt-4" id="delete_reset">
            <span class="material-icons">refresh</span>
        </a>
    </div>
    {{-- END BULK DELETION OPTION --}}

    {{-- EXPORT EXCEL & PDF OPTION --}}
    @if(isset($settings['excel']) && !empty($settings['excel']) && $settings['excel'] == "yes" || isset($settings['pdf']) && !empty($settings['pdf']) && $settings['pdf'] == "yes")
    <div class="col-sm-3 export_btn_div" id="export_btn_div">
        <label for="{{ $singularTitle }}_export"></label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <b>Export Actions</b>
                </span>
            </div>
            <select class="form-control" id="{{ $singularTitle }}_export">
                <option value="0">Choose</option>
                <option value="excel" class="{{ isset($settings['excel']) && !empty($settings['excel']) && $settings['excel'] == "yes" ? '' : 'd-none' }}">
                    Excel
                </option>
                <option value="pdf" class="{{ isset($settings['pdf']) && !empty($settings['pdf']) && $settings['pdf'] == "yes" ? '' : 'd-none' }}">
                    Pdf
                </option>
            </select>
        </div>
    </div>

    <div class="col-sm-3 d-none export_btn">
        <a href="javascript:void(0)" class="btn btn-secondary mt-4" id="export_now">
            <span class="material-icons" id="export_icon">
                file_download
            </span>
            <span class="fas fa-circle-notch fa-spin d-none" id="export_spin"></span>
            <span id="export_text">Export</span>
        </a>
        <a href="javascript:void(0)" class="btn mt-4" id="reset_export">
            <span class="material-icons">
                refresh
            </span>
        </a>
    </div>
    @endif
    {{-- END EXPORT EXCEL & PDF OPTION --}}

</div>

@section('pagination-scripts')
    <script>
        $(document).ready(function ($) {

            /* SET PAGINATION */
            $('#{{$singularTitle}}_paginate').change(function () {
                $.ajax({
                    type: "POST",
                    url: "{{ route('pagination.set_pagination') }}",
                    data: {
                        "table": "{{$singularTitle}}",
                        "value": $(this).val(),
                        "_token": "{{ csrf_token() }}",
                    },
                    success:function (resp) {
                        if(resp.resp) {
                            Toast.fire({
                                'icon': 'success',
                                'title': resp.msg
                            });
                        } else {
                            Toast.fire({
                                'icon': 'warning',
                                'title': resp.msg
                            });
                        }
                        reload_current_page();
                    },
                });
            });

            $('#{{$singularTitle}}_delete').change(function () {
                $('.export_btn').addClass('d-none');
                $('#{{$singularTitle}}_export').val('0');
                if($(this).val() === "delete") {
                    $('.export_btn_div').css('margin-left','-15%');
                    $('.{{$singularTitle}}-checkbox').prop('checked', true);
                    $('.delete_btn').removeClass('d-none');
                    return false;
                }
                $('.{{$singularTitle}}-checkbox').prop('checked', false);
                $('.delete_btn').addClass('d-none');
                $('.export_btn_div').css('margin-left','0');
            });

            $('#delete_checked_val').click(function () {
                Swal.fire({
                    title: 'Are you sure you want to delete?',
                    showCancelButton: true,
                    confirmButtonText: `Confirm`,
                }).then((result) => {
                    if(result.value) {
                        var deleteIds = [];
                        $("#listing_table input:checkbox:checked").map(function(){
                            deleteIds.push($(this).val());
                        });
                        $.ajax({
                            url: "{{ route($bulkDeleteRoute) }}",
                            type:"POST",
                            data:{
                                "_token": "{{ csrf_token() }}",
                                "deleteIds": deleteIds,
                            },
                            success:function(resp){
                                if(resp.status) {
                                    Toast.fire({
                                        icon: 'success',
                                        title: resp.msg
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'warning',
                                        title: 'Error',
                                        text: resp.msg,
                                    });
                                }
                                reload_current_page();
                                $('.{{$singularTitle}}-checkbox').prop('checked', false);
                                $('.delete_btn').addClass('d-none');
                                $('#{{$singularTitle}}_delete').val('0');
                                $('.export_btn_div').css('margin-left','0');
                            },
                        });
                    }
                });
            });
        });

        document.getElementById('delete_reset').addEventListener('click',function(){
            $('.user-checkbox').prop('checked', false);
            $('.delete_btn').addClass('d-none');
            $('#{{$singularTitle}}_delete').val('0');
            $('.export_btn_div').css('margin-left','0');
            load_records(1);
        });

        $('#{{$singularTitle}}_export').change(function () {
            $('.delete_btn').addClass('d-none');
            $('#{{$singularTitle}}_delete').val('0');
            $('.export_btn_div').css('margin-left','0');
            if($(this).val() !== "0") {
                $('.export_btn').removeClass('d-none');
                return false;
            }
            $('.export_btn').addClass('d-none');
        });

        $('#export_now').click(function() {
            $('#export_icon').addClass('d-none');
            $('#export_spin').removeClass('d-none');
            $('#export_text').text('Exporting...').prop('disabled', true);
            $('#reset_export').addClass('d-none');
            var type = $('#{{$singularTitle}}_export').val();
            if(type === "pdf") {
                $.ajax({
                    type: "POST",
                    url: "{{ route($pdfExportRoute) }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    xhrFields: {
                        responseType: 'blob'
                    },
                    success: function (resp) {
                        if (resp) {
                            var blob = new Blob([resp]);
                            var link = document.createElement('a');
                            link.href = window.URL.createObjectURL(blob);
                            link.download = "{{$singularTitle}}-listing.pdf";
                            link.click();

                            Toast.fire({
                                'icon': 'success',
                                'title': "Pdf exported successfully"
                            });
                            $('#export_icon').removeClass('d-none');
                            $('#export_spin').addClass('d-none');
                            $('#export_text').text('Export').prop('disabled', false);
                            $('#reset_export').removeClass('d-none');
                            $('.export_btn').addClass('d-none');
                            $('#{{$singularTitle}}_export').val('0');
                        } else {
                            Toast.fire({
                                'icon': 'warning',
                                'title': "Something went wrong!"
                            });
                        }
                    },
                });
            }

            if (type === "excel") {
                axios.get("{{ route($excelExportRoute) }}", {
                    responseType: 'blob'
                }).then(resp => {
                    if (resp.status == 200) {
                        Toast.fire({
                            'icon': 'success',
                            'title': "Excel exported successfully"
                        });
                        let blob = new Blob([resp.data], {type: "application/vnd.ms-excel"});
                        let link = URL.createObjectURL(blob);
                        let a = document.createElement("a");
                        a.download = "{{$singularTitle}}-listing.xlsx";
                        a.href = link;
                        document.body.appendChild(a);
                        a.click();
                        document.body.removeChild(a);
                        $('#export_icon').removeClass('d-none');
                        $('#export_spin').addClass('d-none');
                        $('#export_text').text('Export').prop('disabled', false);
                        $('#reset_export').removeClass('d-none');
                        $('.export_btn').addClass('d-none');
                        $('#{{$singularTitle}}_export').val('0');
                    } else {
                        Toast.fire({
                            'icon': 'warning',
                            'title': "Something went wrong!"
                        });
                    }
                });
            }
        });

        document.getElementById('reset_export').addEventListener('click',function(){
            $('.export_btn').addClass('d-none');
            $('#{{$singularTitle}}_export').val('0');
            $('.export_btn_div').css('margin-left','0');
            load_records(1);
        });

    </script>
    @endsection
