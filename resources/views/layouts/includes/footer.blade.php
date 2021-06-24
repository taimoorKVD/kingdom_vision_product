<!-- REQUIRED SCRIPTS -->
<script src="{{ asset('js/app.js') }}"></script>

<!-- AdminLTE App JS -->
<script src="{{ asset('js/adminlte.min.js') }}"></script>

@yield('scripts')

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {

            setTimeout(function () {
                $('.alert-danger').hide(1000);
                $('.alert-success').hide(1000);
                $('.alert-warning').hide(1000);
                $('.alert-info').hide(1000);
            }, 3000);

            $('.select-multiple-role').select2();
        });
    </script>
    <script>
        function handleDelete(id) {
            var form = document.getElementById('deleteForm');
            form.action = document.getElementById('deleteMe').value + '/' + id;
            $('#deleteModal').modal('show');
        }
    </script>
</html>
