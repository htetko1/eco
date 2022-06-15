@extends('layouts.app')

@section('title') Edit Category @endsection

@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Edit Category</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="breadcrumb-item active">Edit Category</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-0">
                                    <i class="fas fa-layer-group"></i>
                                    Edit Category
                                </h4>
                                <hr>
                                <form action="{{ route('category.update',$category->id) }}" method="post" class="row g-3 mb-3">
                                    @csrf
                                    @method('put')
                                    <div class="col-auto">
                                        <input type="text" name="title" placeholder="New Category" value="{{ old("title",$category->title) }}" class="form-control @error("title") is-invalid @enderror form-control-lg " required>
                                    </div>
                                    <div class="col-auto">
                                        <button class="btn btn-primary btn-lg">Update</button>
                                    </div>
                                    @error("title")
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    @if(session('message'))
                                        <small class="text-success">{{ session('message') }}</small>
                                    @endif
                                </form>
                                @include('category.list')
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

