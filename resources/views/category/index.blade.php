@extends('layouts.app')

@section('title')
    Category
@endsection

@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-0">
                                    <i class="fas fa-layer-group"></i>
                                    Category List
                                </h4>
                                <hr>
                                <form action="{{ route('category.store') }}" method="post" class="row g-3 mb-3">
                                    @csrf
                                    <div class="col-auto ">
                                        <input type="text" name="title" placeholder="New Category" value="{{ old("title") }}" class="form-control @error("title") is-invalid @enderror form-control-lg " required>
                                    </div>
                                    <div class="col-auto ">
                                        <button class="btn btn-primary btn-lg">Add Category</button>
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
