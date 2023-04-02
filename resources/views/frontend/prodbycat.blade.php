@extends('layouts.inc.front')
@section('content')

<div class="py-3 bg-secondary">
            <div class="container">
                <h6 class="text-white fs-4">
                    <a class="text-white text-decoration-none " href="{{ url('/')}}">Home /</a>
                    <a class="text-white text-decoration-none " href="{{ url('/categories')}}">Kategorije /</a>
                    
                </h6>
            </div>
        </div>
        <div class="py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 mb-5 mt-5">
                        <div class="row " height='250px' >
                            <h2 class="fs-2 w-responsive font-weight-bold text-center  mb-2 mt-3">{{ $category->name}}</h2>
                            <hr>
                            @foreach($products as $item) 
                                    <div class="col-md-3 mb-2 mt-5">
                                        <a class="text-dark  text-decoration-none " href="{{ url('/product'.'/'. $item->id) }}">
                                            <div class="card shadow" style="height: 280px" >
                                                <div class="card-body text-center mt-5">
                                                    <img class="w-50 mb-3" height='100px' src="{{ asset('/storage/product/'.$item->image) }}" alt="Product image">
                                                    <h4 class="text-center mt-5 mb-5">{{ $item->name}}</h4>
                                                
                                                    <h4 class="  text-center text-danger mt-5">{{ $item->sell_price}} DIN</h4>
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