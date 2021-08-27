@extends('layouts.dashboad')
@section('dashboard')
active
@endsection
@section('content')
@include('layouts.nav')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Starlight</a>
      <a class="breadcrumb-item" href="index.html">Pages</a>
      <span class="breadcrumb-item active">Blank Page</span>
    </nav>

    <div class="sl-pagebody">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-dark text-white text-center">
                            <h2> Welcome {{ $logged_user_name }}</h2>
                        </div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="bg-dark alert text-center text-white">
                                <h4>Total User: {{ $total_user }}</h4>
                            </div>
                            {{-- {{ __('You are logged in!') }} --}}
                            <table class="table table-dark">
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Created at</th>
                                    <th>Logged time</th>
                                <tbody>
                                    @foreach ($users as $index=>$user_info )
                                    <tr>
                                        <td>{{ $users->firstitem()+$index }}</td>
                                        <td>{{ $user_info->name }}</td>
                                        <td>{{ $user_info->email }}</td>
                                        <td>{{ $user_info->created_at->format('d/m/y h:i:s') }}</td>
                                        <td>{{ $user_info->created_at->diffForHumans() }}</td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{ $users->links() }}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- sl-pagebody -->
  </div><!-- sl-mainpanel -->

@endsection

