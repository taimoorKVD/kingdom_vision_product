<div class="row mb-3">
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
            Delete
        </a>
        <a href="javascript:void(0)" class="btn mt-4" id="delete_reset">
            <span class="material-icons">refresh</span>
            Reset
        </a>
    </div>
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
                if($(this).val() === "delete") {
                    $('.user-checkbox').prop('checked', true);
                    $('.delete_btn').removeClass('d-none');
                    return false;
                }
                $('.user-checkbox').prop('checked', false);
                $('.delete_btn').addClass('d-none');
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
                                $('.user-checkbox').prop('checked', false);
                                $('.delete_btn').addClass('d-none');
                                $('#{{$singularTitle}}_delete').val('0');
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
            load_records(1);
        });

    </script>
    @endsection
