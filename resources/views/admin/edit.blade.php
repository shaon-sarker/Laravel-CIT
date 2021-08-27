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
                <div class="col-lg-12">
                    <h1 class="bg-dark text-white p-2 text-center">{{ $logged_user_name }} profile</h1>
                    <table class="table table-dark">
                        <tbody>
                            <tr>
                                <td>Name</td>
                                <td>{{ $logged_user_name }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{ $logged_user_email }}</td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td>{{ $logged_user_password }}</td>
                            </tr>
                            <tr>
                                <td>Create_at</td>
                                <td>{{ $logged_user_create }}</td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
