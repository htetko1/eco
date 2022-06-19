@extends('layouts.app')

@section('title')
    Product Detail
@endsection
@section("head")
    <style>
        .description{
            white-space: pre-line;
        }
        .article-thumbnail{
            width: 50px;
            height: 50px;
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
                            <h4 class="mb-sm-0">Product Detail</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Product List</a></li>
                                    <li class="breadcrumb-item active">Product Detail</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-0">
                                    {{ $product->name }}
                                </h4>
                                <div class="mt-1 text-primary">
                        <span class="small mx-2 font-weight-bold">
                            <i class="fas fa-layer-group"></i>
                            {{ $product->category->title }}
                        </span>
                                    <span class="small mx-2 font-weight-bold">
                            <i class="fas fa-user"></i>
                            {{ $product->user->name }}
                        </span>
                                    <span class="small mx-2 font-weight-bold">
                                        <i class="fas fa-calendar"></i>
                                        {{ $product->created_at->format('d-m-y') }}
                                    </span>
                                    <span class="small mx-2 font-weight-bold">
                                         <i class="fas fa-clock"></i>
                                        {{ $product->created_at->format('h:i A') }}
                                    </span>
                                </div>
                                <p class="text-black-50 description">
                                    {{ $product->description }}
                                </p>
                                @foreach($product->getphotos as $img)
                                    <div class="article-thumbnail shadow-sm" style="background-image: url('{{ asset("storage/product/".$img->path) }}')"></div>
                                @endforeach
                                <hr>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="">
                                        <a href="{{ route('product.edit',$product->id) }}" class="btn btn-outline-primary">
                                            Edit
                                        </a>
                                        <form action="{{ route('product.destroy',[$product->id,"page"=>request()->page]) }}" class="d-inline-block" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-outline-danger" onclick="return confirm('Are you sure to delete this product?')">Delete</button>
                                        </form>
                                        <a href="{{ route('product.index') }}" class="btn btn-outline-dark">
                                            All Article
                                        </a>
                                    </div>
                                    <p>{{ $product->created_at->diffForHumans() }}</p>
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
