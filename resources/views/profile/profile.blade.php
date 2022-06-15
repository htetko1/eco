@extends('layouts.app')

@section('title')
    Profile
@endsection

@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Profile</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="breadcrumb-item active">Profile</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12 col-lg-6 col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="{{ isset(Auth::user()->photo) ? asset('storage/profile/'.Auth::user()->photo) : asset('assets/images/users/user-default-avatar.png') }}" class="w-50 rounded-circle my-3" alt="">
                                    <h3 class="mb-0 font-weight-bold">
                                        {{ Auth::user()->name }}
                                    </h3>
                                    <small class="text-black-50">
                                        {{ Auth::user()->email }}
                                    </small>

                                </div>
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
