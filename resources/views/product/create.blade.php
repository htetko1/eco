@extends('layouts.app')

@section('title')
    Create Product
@endsection

@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Create Product</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Products List</a></li>
                                    <li class="breadcrumb-item active">Create Product</li>
                                </ol>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                @if(session("status"))
                                    <p class="text-success">{!! session("status") !!}</p>
                                @endif
                                <form action="{{ route('product.store') }}" id="createProduct" method="post" enctype="multipart/form-data">
                                    @csrf
                                </form>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Select Category</label>
                                    <div class="col-sm-10">
                                        <select class="form-select @error('category') is-invalid @enderror" aria-label="Default select example" name="category" form="createProduct" id="">
                                            <option selected="">Open this select menu</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ old('category') ==$category->id ? 'selected' :'' }}>{{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                        @error("category")
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Product Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control @error('name') is-invalid @enderror" name="name" form="createProduct" value="{{ old('name') }}" type="text" placeholder="Product Title" id="example-text-input">
                                        @error("name")
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-search-input" class="col-sm-2 col-form-label">Product Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control @error('description') is-invalid @enderror" rows="5" type="text" name="description" form="createProduct" placeholder="Product Description" id="example-search-input">{{ old('description') }}</textarea>
                                        @error("description")
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-email-input" class="col-sm-2 col-form-label">Photo</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="photo[]" class="form-control @error('photo') is-invalid @enderror" form="createProduct"  id="example-email-input" multiple>
                                        @error('photo.*')
                                        <small class="font-weight-bold text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!-- end row -->
{{--                                <div class="row mb-3">--}}
{{--                                    <label for="example-url-input" class="col-sm-2 col-form-label">Stocks</label>--}}
{{--                                    <div class="col-sm-10">--}}
{{--                                        <input class="form-control @error('stock') is-invalid @enderror" type="url" placeholder="123" id="example-url-input">--}}
{{--                                        @error("stock")--}}
{{--                                        <small class="text-danger">{{ $message }}</small>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <!-- end row -->
                                <div class="row mb-0 d-flex justify-content-end align-items-center">
                                    <div class=""></div>
                                    <button class="btn btn-primary btn-group-lg w-25 " form="createProduct">Create Product</button>
                                </div>
                                <!-- end row -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->



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
