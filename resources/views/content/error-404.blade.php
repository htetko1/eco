<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>404 Error | Upcube - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
        content="Premium Multipurpose Admin & Dashboard Template"
        name="description"
    />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />

    <!-- Bootstrap Css -->
    <link
        href="{{ asset('assets/css/bootstrap.min.css') }}"
        id="bootstrap-style"
        rel="stylesheet"
        type="text/css"
    />
    <!-- Icons Css -->
    <link
        href="{{ asset('assets/css/icons.min.css') }}"
        rel="stylesheet"
        type="text/css"
    />
    <!-- App Css-->
    <link
        href="{{ asset('assets/css/app.min.css') }}"
        id="app-style"
        rel="stylesheet"
        type="text/css"
    />
</head>

<body class="auth-body-bg">
<div class="bg-overlay"></div>
<div class="my-5 pt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="ex-page-content text-center">
                            <h1>404!</h1>
                            <h3>Sorry, page not found</h3>
                            <br />

                            <a
                                class="btn btn-info mb-5 waves-effect waves-light"
                                href="{{ route('home') }}"
                            >Back to Dashboard</a
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JAVASCRIPT -->
<script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>

<script src="{{ asset('assets/js/app.js') }}"></script>
</body>
</html>
