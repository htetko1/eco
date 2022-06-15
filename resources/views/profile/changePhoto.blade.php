@extends('layouts.app')

@section('title')
    Change Photo
@endsection

@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Change Photo</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="breadcrumb-item active">Change Photo</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <img src="{{ isset(Auth::user()->photo) ? asset('storage/profile/'.Auth::user()->photo) : asset('assets/images/users/user-default-avatar.png') }}" class="d-block w-50 mx-auto rounded-circle my-3" alt="">
                                <form action="{{ route('profile.ChangePhoto') }}" method="post" enctype="multipart/form-data" class="row g-2">
                                    @csrf

                                    <div class="d-flex justify-content-lg-between align-items-lg-end">
                                        <div class="form-group mb-0 mr-2 col-auto">
                                            <label class="text-center">
                                                <i class="mr-1 feather-image"></i>
                                                Select New Photo
                                            </label>
                                            <input type="file" name="photo" class="form-control form-control-lg p-1 mr-2 overflow-hidden" required>

                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" class="btn btn-success btn-lg">
                                                <i class="ri-phone-camera-line align-middle"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @error("photo")
                                    <small class="font-weight-bold text-danger text-center">{{ $message }}</small>
                                    @enderror
                                </form>
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
