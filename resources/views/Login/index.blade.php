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
        @vite('')
    </head>

    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container-xl px-4">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <!-- Basic login form-->
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header justify-content-center">
                                        <h3 class="fw-bolder my-4 text-center">Toko Indrawan Elektronik</h3>
                                    </div>
                                    <div class="card-body">
                                        <!-- Login form-->
                                        <form method="post" action="{{ route('login.auth') }}">
                                            @csrf
                                            <!-- Form Group (email address)-->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control" id="inputEmailAddress" type="email"
                                                    placeholder="Enter email address" name="email" />
                                            </div>
                                            <!-- Form Group (password)-->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control" id="inputPassword" type="password"
                                                    placeholder="Enter password" name="password" />
                                            </div>
                                            {{-- <!-- Form Group (remember password checkbox)-->
                                            <div class="mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" id="rememberPasswordCheck"
                                                        type="checkbox" value="" />
                                                    <label class="form-check-label" for="rememberPasswordCheck">Remember
                                                        password</label>
                                                </div>
                                            </div> --}}
                                            <!-- Form Group (login box)-->
                                            <div class="d-flex flex-row-reverse mt-4 mb-0">

                                                <button type="submit" class="btn btn-primary"
                                                    href="dashboard-1.html">Login</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            {{-- <div id="layoutAuthentication_footer">
                <footer class="footer-admin mt-auto footer-dark">
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
            </div> --}}
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
        </script>
        <script src={{ asset('ui/js/scripts.js') }}></script>
        @include('sweetalert::alert')
    </body>

</html>
