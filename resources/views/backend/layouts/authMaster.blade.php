<!doctype html>
<html lang="en">
@include('backend.theme.headerStyle')

<body>
    <div id="page-container">
        <main id="main-container">
            @yield('authContent')
        </main>
    </div>
    @include('backend.authTheme.footerScript')

</body>

</html>
