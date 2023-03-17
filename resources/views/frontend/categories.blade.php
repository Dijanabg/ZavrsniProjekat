@extends('layouts.inc.front')

@section('content') 
<div class="py-3 bg-secondary">
    <div class="container">
        <h6 class="text-white fs-6"> 
            <a class="text-decoration-none text-white fs-6" href="{{ url('/') }}">Home /</a> Kategorije /
        
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row ">
                    <h1 class="col-md-12 mb-5 mt-5">Kategorije</h1>
                    <hr>
                        @foreach ($category as $item)
                            <div class="col-md-3 mb-5 mt-5">
                                <a class="text-dark  text-decoration-none " href="{{ url('/productsbycat'.'/'. $item->id) }}">
                                    <div class="card shadow">
                                        <div class="card-body text-center mt-5">
                                            <img class="w-50 " height='100px' src="" alt="Category image">
                                            <h4 class="text-center fs-3 mt-5">{{ $item->name }}</h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
@endsection