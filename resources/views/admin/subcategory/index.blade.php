@extends('layouts.dashboad')
@section('subcategory')
active
@endsection
@section('content')
@include('layouts.nav')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Dasboad</a>
      <a class="breadcrumb-item" href="index.html">Pages</a>
    </nav>
<div class="sl-pagebody">
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2 class="bg-dark text-white p-2 mt-3 text-center">Subcategory list</h2>
            <form action="{{ url('subcategory/markdelete') }}" method="POST">
                @csrf
            <table class="table">
                <th><input type="checkbox" onclick="checkAll(this)"> Mark</th>
                <th>Sl</th>
                <th>Categpry Name</th>
                <th>SubCategpry Name</th>
                <th>Created at</th>
                <th>Action</th>
                <tbody>
                    @forelse ($subcategorys as $subcategory )
                    <tr>
                        <td><input type="checkbox" name="marked_id[]" value="{{$subcategory->id}}"></td>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ App\Models\Category::find($subcategory->category_id)->category_name }}</td>
                        <td>{{ $subcategory->subcategory_name }}</td>
                        <td>
                            @if ($subcategory->created_at->diffInDays(\Carbon\Carbon::today()) > 3)
                                {{ $subcategory->created_at->format('d/m/y h:i:s') }}
                            @else
                                {{ $subcategory->created_at->diffForHumans()}}
                            @endif
                        </td>
                        <td><a href="{{ url('/subcategory/delete/') }}/{{ $subcategory->id }}" class="btn btn-danger">Delete</a></td>
                    </tr>
                    @empty
                    <tr><td>No data found</td></tr>
                    @endforelse
                </tbody>
            </table>
            <button class="btn btn-info">Delete Mark</button>
        </form>

            <h2 class="bg-dark text-white p-2 mt-3 text-center">Trash Subcategory list</h2>
            @if (session('delsuccess'))
            <div class="alert alert-success">
                {{ session('delsuccess') }}
            </div>
            @endif
            <table class="table">
                {{-- <th><input type="checkbox" onclick="checkAll(this)">Mark</th> --}}
                <th>Sl</th>
                <th>Categpry Name</th>
                <th>SubCategpry Name</th>
                <th>Created at</th>
                <th>Action</th>
                <tbody>
                    @forelse ($deleted_subcategories as $deletedtrash_subcategories)
                    <tr>
                        {{-- <td><input type="checkbox" name="restore_id[]" value="{{$subcategory->id}}"></td> --}}
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ App\Models\Category::find($deletedtrash_subcategories->category_id)->category_name }}</td>
                        <td>{{ $deletedtrash_subcategories->subcategory_name }}</td>
                        <td>
                            @if ($deletedtrash_subcategories->created_at->diffInDays(\Carbon\Carbon::today()) > 3)
                            {{ $deletedtrash_subcategories->created_at->format('d/m/y h:i:s') }}
                            @else
                                {{ $deletedtrash_subcategories->created_at->diffForHumans()}}
                            @endif
                        </td>
                        <td><a href="{{ url('/subcategory/restore/') }}/{{ $deletedtrash_subcategories->id }}" class="btn btn-success">Restore</a></td>
                        <td><a href="{{ url('/subcategory/perdelete/') }}/{{ $deletedtrash_subcategories->id }}" class="btn btn-danger">Permanent Delete</a></td>
                    </tr>
                    @empty
                    <tr><td><h4>No data found</h4></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="col-lg-4 mt-3">
            <div class="card-header text-white bg-dark">
                <h4>Sub Category</h4>
            </div>
            <div class="card-body">
                @if (session('success'))
                <div class="alert alert-primary">
                    {{ session('success') }}
                </div>
                @endif
                <form action="{{ url('/subcategory/insert') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Sub Category List</label>
                        <select name="category_id" class="form-control">
                            <option value="">--Select Category--</option>
                            @foreach ($categories as $category )
                            <option {{ old('category_id')== $category->id?'selected':'' }} value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sub Category Name</label>
                        <input value="{{ old('subcategory_name') }}" type="text" class="form-control" name="subcategory_name">
                        @error('subcategory_name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        @if (session('subcategory_extis'))
                        <div class="alert alert-danger">
                            {{ session('subcategory_extis') }}
                        </div>
                        @endif
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
    function checkAll(allCheckbox, id){
        let query = id ? id+' input[type=checkbox]' : ' input[type=checkbox]';
        let allCheckboxes = document.querySelectorAll(query);
        for (let i = 0; i < allCheckboxes.length; i++){
            let curCheckbox = allCheckboxes[i];
            curCheckbox.checked = allCheckbox.checked;
        }
    }
    </script>
@endsection
