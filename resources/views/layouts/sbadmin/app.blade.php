<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    {{-- <link href="css/styles.css" rel="stylesheet" /> --}}
    <link href="{{ asset('sbadmin/css/styles.css') }}" rel="stylesheet" />
    @stack('styles')
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <!-- lordicon animate button script -->
    <script src="https://cdn.lordicon.com/lordicon-1.1.0.js"></script>
</head>

<body class="sb-nav-fixed">
    @include('layouts.sbadmin.include.navbar')
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            @include('layouts.sbadmin.include.sidebar')
        </div>
        <div id="layoutSidenav_content">
            <main>
                @yield('content')
            </main>
            @include('layouts.sbadmin.include.footer')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    {{-- <script src="js/scripts.js"></script> --}}
    <script src="{{ asset('sbadmin/js/scripts.js') }}"></script> <!--*ubah ke path folder template -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    {{-- <script src="assets/demo/chart-area-demo.js"></script> --}}
    {{-- <script src="{{ asset('sbadmin/assets/demo/chart-area-demo.js') }}"></script> --}}
    {{-- <script src="assets/demo/chart-bar-demo.js"></script> --}}
    {{-- <script src="{{ asset('sbadmin/assets/demo/chart-bar-demo.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    {{-- <script src="js/datatables-simple-demo.js"></script> --}}
    <script src="{{ asset('sbadmin/js/datatables-simple-demo.js') }}"></script>

    @stack('scripts')
</body>

</html>
