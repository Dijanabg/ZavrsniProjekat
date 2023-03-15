@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
           <div class="card">
                <div class="card-header bg-gradient-primary">
                     <h4>Ažuriraj proizvod
                        <a href="{{ url('products') }}" class="btn bg-gradient-primary float-end">Nazad</a>
                     </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('product/'.$products->id.'/edit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        @method('PUT')   
                        <div class="row">
                                    <div class="col-md-12  mb-2">
                                        <label for="">Izaberi kategoriju</label>

                                        <select name="category" class="form-select">
                                    <option selected>Kategorija</option>
                                            <option value="">{{ $products->categoryId->name }}</option>
                                        </select>
                                    </div>
                                    <input type="hidden" name="id" value="{{ $products->id }}">
                                    <div class="col-md-12">
                                        <label class="mb-0" for="">Ime</label>
                                        <input type="text" required name="name" value="{{ $products->name }}" placeholder="Unesi ime proizvoda" class="form-control mb-2">
                                    </div>
                                   
                                    <div class="col-md-12">
                                        <label class="mb-0" for="">Kratki opis</label>
                                        <input type="text" required name="short_desc" value="{{ $products->short_desc }}" placeholder="Unesi kratki opis" class="form-control mb-2">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0" for="">Opis</label>
                                        <input type="text" required name="description" value="{{ $products->description }}" placeholder="Unesi opis" class="form-control mb-2 ">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0" for="">Slug</label>
                                        <input type="text" required name="slug" value="{{ $products->slug }}" placeholder="Unesi opis" class="form-control mb-2 ">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Upload image</label>
                                        <input type="file" name="image" class="form-control">
                                        <label for="">Trenutna slika</label>
                                        <input type="hidden" name="old_image" value="{{ $categories->image }}">
                                        <img src="../uploads/{{ $products->image }}>" height="50px" width="50px" alt="">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-0" for="">Original_price</label>
                                        <input type="text" required name="orig_price" value="{{ $products->orig_price }}" placeholder="Unesi orginalnu cenu" class="form-control mb-2">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-0" for="">Prodajna cena</label>
                                        <input type="text" required name="sell_price" value="{{ $products->sell_price }}" placeholder="Unesi prodajnu cenu" class="form-control  mb-2">
                                    </div>
                                    <div class="col-md-12">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="mb-0" for="">Kolicina</label>
                                            <input type="text" required name="qty" value="{{ $products->qty }}" placeholder="Unesi kolicinu" class="form-control mb-2">
                                        </div>
                                        <div class="col-md-3  mb-2">
                                            <label class="mb-0" for="">Status</label><br>
                                            <input type="checkbox" value="{{ $products->status }}" name="status" >
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label class="mb-0" for="">Trending</label><br>
                                            <input type="checkbox" value="{{ $products->trending }}" name="trending">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn bg-gradient-primary" name="">Ažuriraj</button>
                                    </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>