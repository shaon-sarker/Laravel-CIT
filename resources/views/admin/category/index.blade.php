@extends('layouts.dashboad')
@section('category')
    active
@endsection
@section('content')
    @include('layouts.nav')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Starlight</a>
            <a class="breadcrumb-item" href="index.html">Pages</a>
            <span class="breadcrumb-item active">Blank Page</span>
        </nav>

        <div class="sl-pagebody">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h2 class="bg-dark text-white p-2 mt-3 text-center">Category list</h2>
                        @if (session('delsuccess'))
                            <div class="alert alert-success">
                                {{ session('delsuccess') }}
                            </div>
                        @endif
                        <table class="table">
                            <th>Sl</th>
                            <th>Categpry Name</th>
                            <th>Categpry Name Bangla</th>
                            <th>Category Image</th>
                            <th>Added By</th>
                            <th>Created at</th>
                            <th>Action</th>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $category->category_name }}</td>
                                        <td>{{ $category->category_bangla }}</td>
                                        <td><img style="width:75px"
                                                src="{{ asset('uploads/category') }}/{{ $category->category_image }}"
                                                alt=""></td>
                                        <td>{{ App\Models\User::find($category->added_by)->name }}</td>
                                        <td>{{ $category->created_at->format('d/m/y h:i:s') }}</td>
                                        <td><a href="{{ url('/category/delete') }}/{{ $category->id }}"
                                                class="btn btn-danger">Delete</a></td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>

                    </div>
                    <div class="col-md-3 mt-3">
                        <div class="card-header text-white bg-dark">
                            <h4>Add Category</h4>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-warning">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form action="{{ url('/category/insert') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Category Name</label>
                                    <input type="text" class="form-control" name="category_name">
                                    @error('category_name')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Category Image</label>
                                    <input type="file" class="form-control" name="category_image">
                                    @error('category_image')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer_script')
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch(type){
            case 'info':
            toastr.info("{{ Session::get('message') }}");
            break

            case 'success':
            toastr.success("{{ Session::get('message') }}");
            break

            case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break

            case 'error':
            toastr.error("{{ Session::get('message') }}");
            break
            }
        @endif
    </script>
@endsection
