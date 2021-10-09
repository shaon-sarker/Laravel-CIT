@extends('layouts.dashboad')

@section('content')

<div class="d-flex align-items-center justify-content-center bg-sl-primary ht-md-100v">

    <div class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-white">
      <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">Sign<span class="tx-info tx-normal">Up</span></div>

    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="form-group">
            <input type="text" name="name"  value="{{ old('name') }}" class="form-control" placeholder="Enter your username">
            @error('name')
            <div class="alert alert-danger" role="alert">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div><!-- form-group -->
        <div class="form-group">
            <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Enter your email">
            @error('email')
            <div class="alert alert-danger" role="alert">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div><!-- form-group -->
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Enter your password">
            @error('password')
            <div class="alert alert-danger" role="alert">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div><!-- form-group -->
        <div class="form-group">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Enter your Confirm password">
        </div><!-- form-group -->
        <button type="submit" class="btn btn-info btn-block">Register</button>
    </form>


      <div class="mg-t-40 tx-center">Already have an account? <a href="{{ url('login') }}" class="tx-info">Sign In</a></div>
    </div><!-- login-wrapper -->
  </div><!-- d-flex -->
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark">
                <div class="card-header text-white text-center">{{ __('Sign Up') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right text-white">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right text-white">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right text-white">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right text-white">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
