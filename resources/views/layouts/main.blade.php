<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Sistem Inventory EOQ</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/litepicker/dist/css/litepicker.css" rel="stylesheet" />
        <link href={{ asset('ui/css/styles.css') }} rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href={{ asset('assets/img/favicon.png') }} />
        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
            crossorigin="anonymous"></script>
        <script src="https://unpkg.com/feather-icons"></script>
        <link href={{ asset('css/custom.css') }} rel="stylesheet" />
        @vite([])
    </head>

    <body class="nav-fixed">
        @include('layouts.topnav')
        <div id="layoutSidenav">
            @include('layouts.aside')
            <div id="layoutSidenav_content">
                @yield('contents')
                <footer class="footer-admin mt-auto footer-light">
                    <div class="container-xl px-4">
                        <div class="row">
                            <div class="col-md-6 small">Copyright &copy; Your Website 2021</div>
                            <div class="col-md-6 text-md-end small">
                                <a href="#!">Privacy Policy</a>
                                &middot;
                                <a href="#!">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
        </script>
        <script src={{ asset('ui/js/scripts.js') }}></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src={{ asset('ui/js/datatables/datatables-simple-demo.js') }}></script>
        <script src="https://cdn.jsdelivr.net/npm/litepicker/dist/bundle.js" crossorigin="anonymous"></script>
        <script src={{ asset('ui/js/litepicker.js') }}></script>
        <script>
            feather.replace();
        </script>
        <link href="https://cdn.datatables.net/v/bs5/dt-1.13.8/b-2.4.2/b-html5-2.4.2/datatables.min.css"
            rel="stylesheet">
        <script src="https://cdn.datatables.net/v/bs5/dt-1.13.8/b-2.4.2/b-html5-2.4.2/datatables.min.js"></script>
        <script src="{{ asset('ui/js/moment.js') }}"></script>
        <script src="{{ asset('ui/js/moment-with-locales.js') }}"></script>
        @stack('scripts')
        @include('sweetalert::alert')
    </body>

</html>
