@extends("layouts.app")

@section('title')
    Create Article
@endsection

@section("content")
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Create Article</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('article.index') }}">Article List</a></li>
                                    <li class="breadcrumb-item active">Create Article</li>
                                </ol>
                            </div>

                        </div>
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('article.store') }}" id="createArticle" method="post">
                                    @csrf
                                </form>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Select Category</label>
                                    <div class="col-sm-10">
                                        <select class="form-select @error('category') is-invalid @enderror" aria-label="Default select example" name="category" form="createArticle" id="">
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
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Article Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control @error('title') is-invalid @enderror" name="title" form="createArticle" value="{{ old('title') }}" type="text" placeholder="Article Title" id="example-text-input">
                                        @error("title")
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-search-input" class="col-sm-2 col-form-label">Article Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control @error('description') is-invalid @enderror" rows="5" type="text" name="description" form="createArticle" placeholder="Article Description" id="example-search-input">{{ old('description') }}</textarea>
                                        @error("description")
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-email-input" class="col-sm-2 col-form-label">Photo</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" form="createArticle"  id="example-email-input" name="photo" required>
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-url-input" class="col-sm-2 col-form-label">URL</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="url" placeholder="https://getbootstrap.com" id="example-url-input">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-tel-input" class="col-sm-2 col-form-label">Telephone</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="tel" placeholder="1-(555)-555-5555" id="example-tel-input">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-password-input" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="password" value="hunter2" id="example-password-input">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-number-input" class="col-sm-2 col-form-label">Number</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="number" value="42" id="example-number-input">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-datetime-local-input" class="col-sm-2 col-form-label">Date and time</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="datetime-local" value="2011-08-19T13:45:00" id="example-datetime-local-input">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-date-input" class="col-sm-2 col-form-label">Date</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-month-input" class="col-sm-2 col-form-label">Month</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="month" value="2020-03" id="example-month-input">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-week-input" class="col-sm-2 col-form-label">Week</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="week" value="2020-W14" id="example-week-input">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-time-input" class="col-sm-2 col-form-label">Time</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="time" value="13:45:00" id="example-time-input">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-color-input" class="col-sm-2 col-form-label">Color</label>
                                    <div class="col-sm-10">
                                        <input type="color" class="form-control form-control-color w-100" id="example-color-input" value="#0f9cf3" title="Choose your color">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-0 d-flex justify-content-end align-items-center">
                                    <div class=""></div>
                                    <button class="btn btn-primary btn-group-lg w-25 " form="createArticle">Create Article</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

{{--                <div class="row">--}}
{{--                    <div class="col-12">--}}
{{--                        <div class="card">--}}
{{--                            <div class="card-body">--}}
{{--                                <form action="{{ route('article.store') }}" id="createArticle" method="post">--}}
{{--                                    @csrf--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-12 col-lg-3">--}}
{{--                        <div class="card mt-3">--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="mb-0">--}}
{{--                                    <label for="">Select Category</label>--}}
{{--                                    <select name="category" form="createArticle" class="form-select form-select-lg @error('category') is-invalid @enderror " id="">--}}
{{--                                        <option value="">Select Category</option>--}}
{{--                                        @foreach($categories as $category)--}}
{{--                                            <option value="{{ $category->id }}" {{ old('category') ==$category->id ? 'selected' :'' }}>{{ $category->title }}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                    @error("category")--}}
{{--                                    <small class="text-danger">{{ $message }}</small>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-12 col-lg-6">--}}
{{--                        <div class="card mt-3">--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="mb-3">--}}
{{--                                    <label for="">Article Title</label>--}}
{{--                                    <input type="text" name="title" form="createArticle" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror form-control-lg">--}}
{{--                                    @error("title")--}}
{{--                                    <small class="text-danger">{{ $message }}</small>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                                <div class="mb-3">--}}
{{--                                    <label for="">Article Description</label>--}}
{{--                                    <textarea type="text" name="description" form="createArticle" rows="15" class="form-control @error('description') is-invalid @enderror form-control-lg">{{ old('description') }}</textarea>--}}
{{--                                    @error("description")--}}
{{--                                    <small class="text-danger">{{ $message }}</small>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-12 col-lg-3">--}}
{{--                        <div class="card mt-3">--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="mb-0">--}}
{{--                                    <button class="btn btn-primary btn-lg w-100 " form="createArticle">Create Article</button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

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
