@extends('layouts.app')

@section('title')
    ChangeName & ChangeEmail
@endsection

@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Name & Email</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="breadcrumb-item active">Name & Email</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="card mb-3">
                            <div class="card-body">
                                <form action="{{ route('profile.ChangeName') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">
                                            <i class="mr-1 feather-user"></i>
                                            Your Name
                                        </label>
                                        <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}">
                                        @error("name")
                                        <small class="font-weight-bold text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="custom-control custom-switch ">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch1" required>
                                            <label class="custom-control-label" for="customSwitch1">I'm Sure</label>
                                        </div>
                                        <button type="submit" class="btn btn-primary my-3">
                                            Change Name
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('profile.ChangeEmail') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">
                                            <i class="mr-1 feather-mail"></i>
                                            Your Email
                                        </label>
                                        <input type="text" name="email" class="form-control" value="{{ auth()->user()->email }}">
                                        @error("email")
                                        <small class="font-weight-bold text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch3" required>
                                            <label class="custom-control-label" for="customSwitch3">I'm Sure</label>
                                        </div>
                                        <button type="submit" class="btn btn-primary my-3">
                                            <i class="mr-1 feather-refresh-ccw"></i>
                                            Change Email
                                        </button>
                                    </div>
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
