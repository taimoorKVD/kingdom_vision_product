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

        });
    </script>
    @endsection
