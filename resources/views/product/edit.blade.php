@extends('layouts.app')

@section('title')
    Edit Product
@endsection
@section('head')
    <style>
        .article-thumbnail{
            width: 100px;
            height: 100px;
            border-radius: 0.25rem;
            background-size: 200%;
            margin-top: 10px;
            display: inline-block;
        }
    </style>

@endsection

@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Edit Product</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Product List</a></li>
                                    <li class="breadcrumb-item active">Edit Product</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('product.update',$product->id) }}" id="editProduct" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                            </form>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Select Category</label>
                                <div class="col-sm-10">
                                    <select class="form-select @error('category') is-invalid @enderror" aria-label="Default select example" name="category" form="editProduct" id="">
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
                                    <input class="form-control @error('name') is-invalid @enderror" name="name" form="editProduct" value="{{ old('name',$product->name) }}" type="text" placeholder="Product Title" id="example-text-input">
                                    @error("name")
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-search-input" class="col-sm-2 col-form-label">Product Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control @error('description') is-invalid @enderror" rows="5" type="text" name="description" form="editProduct" placeholder="Product Description" id="example-search-input">{{ old('description',$product->description) }}</textarea>
                                    @error("description")
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->
                                @foreach( $product->getphotos as $img )
                                    <div class="d-inline-block">
                                        <div class="article-thumbnail shadow-sm" style="background-image: url('{{ asset("storage/product/".$img->path) }}')"></div>
                                        <form action="{{ route('photo.destroy',$img->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm" style="margin-top: -70px; margin-left: 5px">Delete</button>
                                        </form>
                                    </div>
                                @endforeach
                            <form action="{{ route('photo.store') }}" method="post"  enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <div class="row">
                                    <div class="col-auto">
                                        <input type="file" name="photo[]" id="photo" class="form-control" multiple required>
                                        @error('photo.*')
                                        <div class="font-weight-bold text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-auto">
                                        <button class="btn btn-primary">Update New Photo</button>
                                    </div>
                                </div>
                            </form>
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
                                <button class="btn btn-primary btn-group-lg w-25 " form="editProduct">Update</button>
                            </div>
                            <!-- end row -->
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
