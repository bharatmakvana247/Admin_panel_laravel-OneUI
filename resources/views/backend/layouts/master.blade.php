<!doctype html>
<html lang="en">
@include('backend.theme.headerStyle')

<body>
    <div id="page-container"
        class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">
        @include('backend.theme.sidebar')
        @include('backend.theme.navbar')
        <main id="main-container">
            @yield('content')
        </main>
        @include('backend.theme.footer')
    </div>
    @include('backend.theme.footerScript')
</body>

</html>
