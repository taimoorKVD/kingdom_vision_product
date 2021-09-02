<!-- REQUIRED SCRIPTS -->
<script src="{{ asset('admin-panel/js/main.js') }}"></script>
<script src="{{ asset('admin-panel/js/sweetalert.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });

    $(document).ready(function ($) {
        setTimeout(function () {
            $('.alert-card-danger').hide(1000);
            $('.alert-card-success').hide(1000);
            $('.alert-card-warning').hide(1000);
            $('.alert-card-info').hide(1000);
        }, 3000);

        $('.select-multiple-role').select2();
    });

    function handleDelete(id) {
        var form = document.getElementById('deleteForm');
        form.action = document.getElementById('deleteMe').value + '/' + id;
        $('#deleteModal').modal('show');
    }
</script>
<script>
    function countdowntimes() {
        var livedt = new Date();
        var h = livedt.getHours();
        var m = livedt.getMinutes();
        var s = livedt.getSeconds();
        m = latestTime(m);
        s = latestTime(s);
        document.getElementById('preview').innerHTML =
            // h + ":" + m + ":" + s;
            livedt.toLocaleString('en-PK', { timeZone: '{{ $curr_timezone }}' });
        var t = setTimeout(countdowntimes, 500);
    }
    function latestTime(i) {
        if (i < 10) {i = "0" + i};  // include a zero in front of real clock numbers < 10
        return i;
    }
</script>
@yield('scripts')

</html>
