<!-- Mainly scripts -->
<script src="{{ asset('assets/js/plugins/fullcalendar/moment.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
<script src="{{ asset('assets/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('assets/library/library.js') }}"></script>

{{-- switch --}}
@if (Request::url() == route('admin.user'))
    <script src="{{ asset('assets/js/plugins/switchery/switchery.js') }}"></script>
@endif

<!-- Custom and plugin javascript -->
<script src="{{ asset('assets/js/inspinia.js') }}"></script>
<script src="{{ asset('assets/js/plugins/pace/pace.min.js') }}"></script>
