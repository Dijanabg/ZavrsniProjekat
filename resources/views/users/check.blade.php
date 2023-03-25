@extends('layouts.inc.front')
@section('content')
<div class="py-3 bg-secondary">
    <div class="container">
        <h6 class="text-white fs-4">
            <a href="home.php" class="text-white text-decoration-none fs-4">Home /</a>
            <a href="checkout.php" class="text-white text-decoration-none  fs-4">Checkout</a>
        </h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="card">
            <div class="card card-body shadow mt-3">
                <form action="{{ url('/check') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-7">
                            <h5>Osnovni podaci</h5>
                            <hr>
                           
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Ime</label>
                                    <input type="text" name="fname" required placeholder="Unesi ime i prezime" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Prezime</label>
                                    <input type="text" name="lname" required placeholder="Unesi ime i prezime" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Email</label>
                                    <input type="email" name="email" required placeholder="Unesi email" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Telefon</label>
                                    <input type="text" name="phone" required placeholder="Unesi kontakt telefon" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Pin Code</label>
                                    <input type="text" name="pincode" required placeholder="Unesi pin code" class="form-control">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="fw-bold">Adresa</label>
                                    <textarea name="adress" class="form-control " rows="5" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <h5>Detalji porudžbine</h5>
                            <hr>
                           
                            @foreach ($carts as $citem)
                                <div class="card product_data shadow-sm mb-3">
                                    <div class="row align-items-center">
                                    <input type="hidden" name="product_id" value="{{ $citem->products->id }}">
                                        <div class="col-md-2">
                                            <img src="../uploads/" alt="" width="60px">
                                        </div>
                                        <div class="col-md-5">
                                            <label>{{ ucfirst($citem->products->name) }}</label>
                                        </div>
                                <input type="hidden" name="sell_price" value="{{ $citem->products->sell_price }}">
                                        <div class="col-md-3">
                                            <label>{{ ucfirst($citem->products->sell_price) }}</label>
                                        </div>
                                        

                                    </div>
                                </div>
                            @endforeach
                            <input type="hidden" name="totalPrice" value="{{ $total_rice}}">
                            <h5>Ukupna cena : <span class="float-end fw-bold">{{ $total_price}}</span></h5>
                            <div>
                                <input type="hidden" name="payMode" value="pp">
                                <button type="submit" name="placeOrderBtn" class="btn btn-primary w-100">Potvrdi porudžbinu</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection