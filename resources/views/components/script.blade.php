<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


<script src="{{ asset('assets/dist/js/adminlte.js') }}"></script>
<script>
    function updateCurrentTime() {
        var currentTimeElement = document.getElementById('current-time');
        var now = new Date();
        var hours = now.getHours().toString().padStart(2, '0');
        var minutes = now.getMinutes().toString().padStart(2, '0');
        var seconds = now.getSeconds().toString().padStart(2, '0');

        var currentTimeString = hours + ':' + minutes + ':' + seconds;

        currentTimeElement.innerText = currentTimeString;
    }

    // Update the current time every second
    setInterval(updateCurrentTime, 1000);
</script>
