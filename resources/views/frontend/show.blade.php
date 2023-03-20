@extends('layouts.inc.front')
@section('content')
<div class="py-3 bg-secondary fs-4">
            <div class="container">
                <h6 class="text-white">
                    <a class="text-white text-decoration-none  fs-6" href="{{ url('/') }}">Home /</a>
                    <a class="text-white  text-decoration-none fs-6" href="{{ url('/categories') }}">Kategorije / {{ $products -> name }}</a>
                    
                </h6>
            </div>
        </div>
        <div class="bg-light py-4">
            <div class="container col-md-12 product_data mt-3">
                <div class="row topview">
                    <div class="col-md-4">
                        <div class="shadow px-2">
                            <img src="" alt="Product image" class="w-250px" height="250px" >
                        </div>

                    </div>
                    <div class="topview col-md-6  pr-3 mt-4">
                        <h2 class="fw-bold">{{ ucfirst($products->name) }}</h2>

                        <p>{{ ucfirst($products->short_desc) }}</p>

                        <hr>
                        <div class="row">
                            
                            <div class="col-md-4">
                                <h4>Stara cena:<br><br> <span class="text-danger fw-bold">{{ ucfirst($products->orig_price) }}</span>DIN </h4>
                            </div>
                            <div class="col-md-4">
                            <h2>Nova cena:<br><br><span class="text-success fw-bold">{{ ucfirst($products->sell_price) }}</span>DIN </h2>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <form action="{{ url('/product/'.$products->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ ucfirst($products->id) }}">
                                        <button class="btn btn-primary px-4">    
                                        <i class="fa fa-shoping-cart me-2"></i> 
                                        Ubaci u korpu
                                        </button>
                                    </form>
                                </div>
                                <div class="col-md-6">
                                    <form action="" method="">
                                        <input type="hidden" name="product_id" value="{{ ucfirst($products->id) }}">
                                        <button class="btn btn-primary px-4 addToWishList">
                                            <i class="fa fa-heart me-2"></i>
                                            Lista želja
                                        </button>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <div class="container">
        <div class=" col-md-12 bg-light 8">
        <hr>
                            <h3 class="ml-3 topview">Opis proizvoda:</h3>
                            <p class="prod fs-5">{{ ucfirst($products->description) }}</p>
        </div>
        </div>
@endsection