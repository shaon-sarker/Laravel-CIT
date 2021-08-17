@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            @if (session('delsuccess'))
            <div class="alert alert-success">
                {{ session('delsuccess') }}
            </div>

            @endif
            <table class="table">
                <th>Sl</th>
                <th>Categpry Name</th>
                <th>Added By</th>
                <th>Created at</th>
                <th>Action</th>
            <tbody>
                @foreach ($categories as $category )
                <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $category->category_name }}</td>
                    <td>{{ App\Models\User::find($category->added_by)->name}}</td>
                    <td>{{ $category->created_at->format('d/m/y h:i:s')}}</td>
                    <td><a href="{{ url('/category/delete') }}/{{ $category->id }}" class="btn btn-danger">Delete</a></td>
                </tr>
                @endforeach


            </tbody>
        </table>

        </div>
        <div class="col-md-4">
            <div class="card-header">
                <h4>Add Category</h4>
            </div>
            <div class="card-body">
                @if (session('success'))
                <div class="alert alert-warning">
                    {{ session('success') }}
                </div>
                @endif
                <form action="{{ url('/category/insert') }}" method="POST">
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
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
