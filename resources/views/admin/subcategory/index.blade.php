@extends('layouts.dashboad')
@extends('layouts.nav')
@section('content')
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
            <table class="table">
                <th>Sl</th>
                <th>Categpry Name</th>
                <th>SubCategpry Name</th>
                <th>Created at</th>
                <th>Action</th>
                <tbody>
                    @forelse ($subcategorys as $subcategory )
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ App\Models\Category::find($subcategory->category_id)->category_name }}</td>
                        <td>{{ $subcategory->subcategory_name }}</td>
                        <td>{{ $subcategory->created_at->format('d/m/y h:i:s') }}</td>
                        <td><a href="{{ url('/subcategory/delete/') }}/{{ $subcategory->id }}" class="btn btn-danger">Delete</a></td>
                    </tr>
                    @empty
                    <tr><td>No data found</td></tr>
                    @endforelse
                </tbody>
            </table>

            <h2>Trash list</h2>
            <table class="table">
                <th>Sl</th>
                <th>Categpry Name</th>
                <th>SubCategpry Name</th>
                <th>Created at</th>
                <th>Action</th>
                <tbody>
                    @forelse ($deleted_subcategories as $deletedtrash_subcategories)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ App\Models\Category::find($deletedtrash_subcategories->category_id)->category_name }}</td>
                        <td>{{ $deletedtrash_subcategories->subcategory_name }}</td>
                        <td>
                            @if ($deletedtrash_subcategories->created_at->diffForHumans() >= '3 days ago')
                            {{ $deletedtrash_subcategories->created_at->diffForHumans() }}
                            @else
                                {{ $deletedtrash_subcategories->created_at }}
                            @endif
                        </td>
                        <td><a href="{{ url('/subcategory/restore/') }}/{{ $deletedtrash_subcategories->id }}" class="btn btn-success">Restore</a></td>
                    </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
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
