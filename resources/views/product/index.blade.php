@extends('layouts.app')

@section('title')
    Products List
@endsection
@section('head')
    <style>
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
                            <h4 class="mb-sm-0">Products List</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="breadcrumb-item active">Products List</li>
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
                                <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="">
                                                <a href="{{ route('product.create') }}" class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-plus-circle"></i>
                                                    Create Product
                                                </a>
                                                <a href="{{ route('product.index') }}" class="btn btn-outline-dark btn-sm">
                                                    <i class="fas fa-list"></i>
                                                    All Product
                                                </a>
                                                @isset(request()->search)
                                                    <span class="h5">Search By : "{{ request()->search }}"</span>
                                                @endisset
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div id="datatable_filter" class="dataTables_filter">
                                                <form action="{{ route('product.index') }}" method="get">
                                                    <label>Search:<input
                                                            type="search" value="{{ request()->search }}"
                                                            class="form-control form-control-sm"
                                                            placeholder="" name="search"
                                                            aria-controls="datatable" required/></label>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @if(session('UpdateStatus'))
                                        <p class="text-success">{!! session('UpdateStatus') !!}</p>
                                    @endif
                                    @if(session('status'))
                                        <p class="text-success">{!! session('status') !!}</p>
                                    @endif
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline collapsed" style="
                      border-collapse: collapse;
                      border-spacing: 0px;
                      width: 100%;
                    " role="grid" aria-describedby="datatable_info">
                                                <thead>
                                                <tr >
                                                    <th>#</th>
                                                    <th>Product</th>
                                                    <th>Category</th>
{{--                                                    <th>Stocks</th>--}}
                                                    <th>Owner</th>
                                                    <th>Controls</th>
                                                    <th>Created_at</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                @forelse( $products as $p)
                                                    <tr>
                                                        <td>{{ $p->id }}</td>
                                                        <td>
                                                            <span class="font-weight-bold">{{ $p->name }}</span>
                                                            <br>
                                                            <samll class="text-black-50">{{ Str::words($p->description,8) }}</samll>
                                                            <br>
                                                            @foreach($p->getphotos as $img)
                                                                <div class="article-thumbnail shadow-sm" style="background-image: url('{{ asset("storage/product/".$img->path) }}')"></div>
                                                            @endforeach
                                                        </td>
                                                        <td>{{ $p->category->title }}</td>
{{--                                                        <td>{{ $p->stocks->stock_total }}</td>--}}
                                                        <td>{{ $p->user->name }}</td>
                                                        <td class="text-nowrap">
                                                            <a href="{{ route('product.show',$p->id) }}" class="btn btn-outline-success btn-sm">
                                                                Show
                                                            </a>
                                                            <a href="{{ route('product.edit',$p->id) }}" class="btn btn-outline-primary btn-sm">
                                                                Edit
                                                            </a>
                                                            <form action="{{ route('product.destroy',$p->id) }}" class="d-inline-block" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure to delete this Product?')">Delete</button>
                                                            </form>
                                                        </td>
                                                        <td>
                                    <span class="small">
                                        <i class="fas fa-calendar"></i>
                                        {{ $p->created_at->format('d-m-y') }}
                                    </span>
                                                            <br>
                                                            <span class="small">
                                         <i class="fas fa-clock"></i>
                                        {{ $p->created_at->format('h:i A') }}
                                    </span>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6" class="text-center">There is no Article</td>
                                                    </tr>
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-md-5">
                                            {{ $products->appends(request()->all())->links() }}
                                        </div>
                                        <div class="col-sm-6 col-md-7">
                                            <p class="font-weight-bold mb-0 h4">Total : {{ $products->total() }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
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
