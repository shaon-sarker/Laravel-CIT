@extends('forntend.master')
@section('content')
<!-- .breadcumb-area start -->
<div class="breadcumb-area bg-img-4 ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcumb-wrap text-center">
                    <h2>Search Movie</h2>
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><span>Movie</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .breadcumb-area end -->
 <!-- Movie-area start -->
 <div class="product-area pt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Search Movies here</h2>
                    </div>
                    <div class="card-body">
                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-lg-10">
                                    <div class="mb-3">
                                        <input type="text" name="search" placeholder="Search movices" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary form-control">Search</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            @foreach ($movies as $key=>$movie)

            @if ($key== 'Search')
                @foreach ($movie as $value)
                    {{-- {{ $value['Title'] }} --}}
                    <div class="col-lg-3">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ $value['Poster'] }}" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">{{ $value['Title'] }}</h5>
                              <p class="card-text">{{ $value['Year'] }}</p>
                              <a href="https://www.imdb.com/title/{{ $value['imdbID'] }}" class="btn btn-primary">Know More</a>
                            </div>
                          </div>
                    </div>
                @endforeach
            @endif
            @endforeach
        </div>
    </div>
</div>
<!-- Movie-area end -->
@endsection
