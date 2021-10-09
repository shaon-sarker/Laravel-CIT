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
        @if (Auth::user()->role == 1)
            @include('admin.parts.admin')
        @elseif (Auth::user()->role == 2)
            @include('admin.parts.customer')
        @elseif (Auth::user()->role == 3)
            @include('admin.parts.shopkeeper')
        @endif
    </div><!-- sl-pagebody -->
  </div><!-- sl-mainpanel -->

@endsection

