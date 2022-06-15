@extends('layouts.app')

@section('title')
    Article List
@endsection

@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Article List</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="breadcrumb-item active">Article List</li>
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
{{--                                <h4 class="card-title">Default Datatable</h4>--}}

                                <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="">
                                                <a href="{{ route('article.create') }}" class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-plus-circle"></i>
                                                    Create Article
                                                </a>
                                                <a href="{{ route('article.index') }}" class="btn btn-outline-dark btn-sm">
                                                    <i class="fas fa-list"></i>
                                                    All Article
                                                </a>
                                                @isset(request()->search)
                                                    <span class="h5">Search By : "{{ request()->search }}"</span>
                                                @endisset
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div id="datatable_filter" class="dataTables_filter">
                                                <form action="{{ route('article.index') }}" method="get">
                                                    <label>Search:<input
                                                            type="search"
                                                            class="form-control form-control-sm"
                                                            placeholder="" value="{{ old("search") }}"
                                                            aria-controls="datatable" required
                                                        /></label>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @if(session('message'))
                                        <p class="alert-success">{{ session('message') }}</p>
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
                                                    <th>Article</th>
                                                    <th>Category</th>
                                                    <th>Owner</th>
                                                    <th>Controls</th>
                                                    <th>Created_at</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                @forelse($articles as $article)
                                                    <tr>
                                                        <td>{{ $article->id }}</td>
                                                        <td>
                                                            <span class="font-weight-bold">{{ $article->title }}</span>
                                                            <br>
                                                            <samll class="text-black-50">{{ Str::words($article->description,8) }}</samll>
                                                        </td>
                                                        <td>{{ $article->category->title }}</td>
                                                        <td>{{ $article->user->name }}</td>
                                                        <td class="text-nowrap">
                                                            <a href="{{ route('article.show',$article->id) }}" class="btn btn-outline-success">
                                                                Show
                                                            </a>
                                                            <a href="{{ route('article.edit',$article->id) }}" class="btn btn-outline-primary">
                                                                Edit
                                                            </a>
                                                            <form action="{{ route('article.destroy',$article->id) }}" class="d-inline-block" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button class="btn btn-outline-danger" onclick="return confirm('Are you sure to delete this article?')">Delete</button>
                                                            </form>
                                                        </td>
                                                        <td>
                                    <span class="small">
                                        <i class="feather-calendar"></i>
                                        {{ $article->created_at->format('d-m-y') }}
                                    </span>
                                                            <br>
                                                            <span class="small">
                                         <i class="feather-clock"></i>
                                        {{ $article->created_at->format('h:i A') }}
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
                                        <div class="col-sm-12 col-md-5">
                                            {{ $articles->appends(request()->all())->links() }}
                                        </div>
                                        <div class="col-sm-12 col-md-7">
                                            <p class="font-weight-bold mb-0 h4">Total : {{ $articles->total() }}</p>
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
