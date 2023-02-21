<script src="{{ asset('assets/admin/js/oneui.app.min.js') }}"></script>

<!-- Page JS Plugins -->
<script src="{{ asset('assets/admin/js/plugins/chart.js/chart.min.js') }}"></script>

<!-- Page JS Code -->
<script src="{{ asset('assets/admin/js/pages/be_pages_dashboard.min.js') }}"></script>

{{-- Notify js --}}
<x:notify-messages />
@notifyJs

{{-- Loader --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

{{-- Sweet Alert --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // $(document).ready(function() {
    //     One.loader('show');
    //     setTimeout(function() {
    //         One.loader('hide');
    //     }, 1500);
    // });
</script>
@yield('scripts')
