<!DOCTYPE html>
<html>
<head>
    <script>
        function countdowntimes() {
            var livedt = new Date();
                livedt.toLocaleString('en-PK', { timeZone: 'Asia/Karachi' });
            var h = livedt.getHours();
            var m = livedt.getMinutes();
            var s = livedt.getSeconds();
            m = latestTime(m);
            s = latestTime(s);
            document.getElementById('preview').innerHTML =
                h + ":" + m + ":" + s;
            var t = setTimeout(countdowntimes, 500);
        }
        function latestTime(i) {
            if (i < 10) {i = "0" + i};  // include a zero in front of real clock numbers < 10
            return i;
        }
    </script>
</head>
<body onload="countdowntimes()">

<div id="preview"></div>
</body>
</html>
