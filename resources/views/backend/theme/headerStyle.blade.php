<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>@yield('title') - AdminPanel </title>
    <meta name="description"
        content="OneUI - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">
    <meta property="og:title" content="OneUI - Bootstrap 5 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="OneUI">
    <meta property="og:description"
        content="OneUI - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <link rel="shortcut icon" href="{{ asset('assets/admin/media/favicons/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"
        href="{{ asset('assets/admin/media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('assets/admin/media/favicons/apple-touch-icon-180x180.png') }}">
    <link rel="stylesheet" id="css-main" href=" {{ asset('assets/admin/css/oneui.min.css') }}">
    {{-- Notify Css --}}
    @notifyCss

    {{-- Start Data Table Css --}}
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('new/jquery.dataTables.min.css') }}" />
    <link href='https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css' rel='stylesheet'
        type='text/css'>
    {{-- End Data Table Css --}}
    @yield('styles')
    <style>
        div.dt-buttons {
            width: 70%;
            float: right;
        }

        div .dt-buttons .buttons-csv {
            background: #4c78dd !important;
            color: #FFF !important;
            border: #4c78dd !important;
            margin-right: -5px !important;
            height: 30px !important;
            width: 80px !important;
            line-height: 1em !important;
        }

        div .dt-buttons .buttons-excel {
            background: #4c78dd !important;
            color: #FFF !important;
            border: #4c78dd !important;
            margin-right: -5px !important;
            height: 30px !important;
            width: 80px !important;
            line-height: 1em !important;
        }

        div .dt-buttons .buttons-pdf {
            background: #4c78dd !important;
            color: #FFF !important;
            border: #4c78dd !important;
            margin-right: -5px !important;
            height: 30px !important;
            width: 80px !important;
            line-height: 1em !important;
        }

        div .dt-buttons .buttons-copy {
            background: #4c78dd !important;
            color: #FFF !important;
            border: #4c78dd !important;
            margin-right: -5px !important;
            height: 30px !important;
            width: 80px !important;
            line-height: 1em !important;
        }

        div .dt-buttons .buttons-print {
            background: #4c78dd !important;
            color: #FFF !important;
            border: #4c78dd !important;
            margin-right: -5px !important;
            height: 30px !important;
            width: 80px !important;
            line-height: 1em !important;
        }

        #quiztable_wrapper .dataTables_filter input {
            font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", "Noto Sans", "Liberation Sans", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            min-height: calc(1.5em + 0.5rem + 2px);
            font-size: .875rem;
            border: 1px solid #dfe3ea;
            -moz-appearance: none;
            padding: 0.375rem 0.75rem;
        }

        #quiztable_wrapper .dataTables_length {
            float: left;
            width: 50%;
            margin-bottom: 10px;
        }

        #quiztable_wrapper .dataTables_filter {
            float: left;
            width: 50%;
        }

        #quiztable_wrapper .dataTables_length select {
            padding: 0.375rem 0.75rem;
            border: 1px solid #dfe3ea;
            font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", "Noto Sans", "Liberation Sans", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }
    </style>
</head>
