@extends('layouts.inc.admin')
@section('content')
<div class="py-5">
    <div class="container">
        <div class="card card-body shadow mt-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-gradient-primary">
                            <span class="text-white fs-4">Vidi porudžbine</span>
                            <a href="" class="btn bg-gradient-primary float-end">
                                <i class="fa fa-replay"></i>Nazad
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Detalji za slanje</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <div>
                                            <label class="fw-bold" for="fname">Ime</label>
                                            <div class="border p-1">
                                            {{ $orders->fname }}
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <div>
                                            <label class="fw-bold" for="name">Prezime</label>
                                            <div class="border p-1">
                                            {{ $orders->lname }}
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold" for="email">Email</label>
                                            <div class="border p-1">
                                                {{ $orders->email }}
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold" for="phone">Telefon</label>
                                            <div class="border p-1">
                                            {{ $orders->phone }}
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold" for="tracking_no">Tracking no</label>
                                            <div class="border p-1">
                                            {{ $orders->tracking_no}}
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold" for="adress">Address</label>
                                            <div class="border p-1">
                                            {{ $orders->adress }}
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold" for="pincode">Pin Code</label>
                                            <div class="border p-1">
                                            {{ $orders->pincode }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4>Detalji porudžbine</h4>
                                    <hr>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Proizvod</th>
                                                <th>Slika</th>
                                                <th>Cena</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                @foreach($orders->order_items as $item)
                                                    <tr>
                                                        <td class="align-middle">
                                                            {{ $item->products->name }}
                                                        </td>
                                                        <td class="align-middle">
                                                            <img src="{{ asset('storage/product/'.$item->products->image) }}" alt="" width="50px" height="50px">
                                                        </td>
                                                        <td class="align-middle">
                                                            {{ $item->price }}
                                                        </td>
                                                    </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <hr>
                                    <h4 class="px-2"> Ukupna cena: <span class="float-end">{{ $orders->total_price}}</span>
                                    <div class="mt-3">
                                        <label for="">Status porudžbine</label>
                                        <form action="{{ url('admin/order/'.$orders->id.'/edit') }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select class="form-select" name="status">
                                                <option value="0" {{ $orders->status == '0'? 'selected':'' }} >Slanje</option>
                                                <option value="1" {{ $orders->status == '1'? 'selected':'' }} >Završeno</option>
                                            </select>
                                            <button type="submit" class="btn">Ažuriraj</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection