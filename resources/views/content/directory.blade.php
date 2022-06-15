@extends('layouts.app')

@section('title')
    Directory
@endsection

@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Utility</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="breadcrumb-item active">Utility</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="card m-b-30">
                    <div class="card-body">

                        <div class="d-flex align-items-center">
                            <img class="d-flex me-3 rounded-circle img-thumbnail avatar-lg" src="{{ asset('assets/images/Black & White 1.png') }}" alt="Generic placeholder image">
                            <div class="flex-grow-1">
                                <h5 class="mt-0 font-size-18 mb-1">Htet KO</h5>
                                <p class="text-muted font-size-14">Web developer</p>

                                <ul class="social-links list-inline mb-0">
                                    <li class="list-inline-item">
                                        <a role="button" class="text-reset" title="Facebook" data-bs-placement="top" data-bs-toggle="tooltip" class="tooltips" href=""><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a role="button" class="text-reset" title="Twitter" data-bs-placement="top" data-bs-toggle="tooltip" class="tooltips" href=""><i class=" fab fa-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a role="button" class="text-reset" title="09780352063" data-bs-placement="top" data-bs-toggle="tooltip" class="tooltips" href=""><i class="fas fa-phone-alt"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a role="button" class="text-reset" title="@skypename" data-bs-placement="top" data-bs-toggle="tooltip" class="tooltips" href=""><i class="fab fa-skype"></i></a>
                                    </li>
                                </ul>

                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
        <!-- End Page-content -->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>document.write(new Date().getFullYear())</script> © HtetKo.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Crafted with <i class="mdi mdi-heart text-danger"></i> by Desgin
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>


@endsection
