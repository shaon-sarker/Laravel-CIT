@extends('layouts.dashboad')
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
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Profile</h4>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form action="{{ url('/editprofile/namechange') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input name="name" type="text" class="form-control" value="{{ Auth::user()->name }}">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Password</h4>
                        </div>
                        <div class="card-body">
                            @if (session('passsuccess'))
                                <div class="alert alert-success">
                                    {{ session('passsuccess') }}
                                </div>
                            @endif
                            <form action="{{ url('/editprofile/passchange') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="">Old Password</label>
                                    <input name="old_password" type="password" class="form-control">
                                    @if (session('wrongpass'))
                                    <div class="alert alert-success">
                                        {{ session('wrongpass') }}
                                    </div>
                                    @endif
                                    @error('old_password')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">New Password</label>
                                    <input name="password" type="password" class="form-control">
                                    @error('password')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Confirm Password</label>
                                    <input name="password_confirmation" type="password" class="form-control">
                                    {{-- @error('password_confirmation')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror --}}
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Profile</h4>
                        </div>
                        <div class="card-body">
                            {{-- @if (session('passsuccess'))
                                <div class="alert alert-success">
                                    {{ session('passsuccess') }}
                                </div>
                            @endif --}}
                            <form action="{{ url('/editprofile/userphotochange') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <p>profile pic</p>
                                    <img class="w-25" src="{{ asset('uploads/users') }}/{{ Auth::user()->profile_pic}}" alt="">
                                </div>
                                <div class="form-group">
                                    <label for="">Profile</label>
                                    <input name="profile_pic" type="file" class="form-control" oninput="pic.src=window.URL.createObjectURL(this.files[0])">
                                    <img src="" id="pic" class="w-25 py-2" alt="">
                                    @error('profile_pic')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
