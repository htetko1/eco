@extends('layouts.app')

@section('title')
    ChangePassword
@endsection

@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">ChangePassword</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="breadcrumb-item active">ChangePassword</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">

                    <div class="col-12 col-md-4">
                        <div class="card ">
                            <div class="card-body">
                                <form action="{{ route('profile.ChangePassword') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">
                                            <i class="mr-1 feather-lock"></i>
                                            Current Password
                                        </label>
                                        <input type="password" name="current_password" class="form-control" placeholder="Current Password">
                                        @error("current_password")
                                        <small class="font-weight-bold text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="current">
                                            <i class="mr-1 feather-refresh-ccw"></i>
                                            Change Password
                                        </label>
                                        <input type="password" name="new_password" class="form-control" id="current" placeholder="New Password">
                                        @error("new_password")
                                        <small class="font-weight-bold text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="email">
                                            <i class="mr-1 feather-check"></i>
                                            Confirm Password
                                        </label>
                                        <input type="password" name="new_confirm_password" class="form-control" id="repeat" placeholder="Confirm Password">
                                        @error("new_confirm_password")
                                        <small class="font-weight-bold text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch2" required>
                                            <label class="custom-control-label" for="customSwitch2">I'm Sure</label>
                                        </div>
                                        <button type="submit" class="btn btn-primary my-3">
                                            <i class="mr-1 feather-refresh-ccw"></i>
                                            Change Now
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
