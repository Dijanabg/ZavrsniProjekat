@extends('layouts.inc.admin')
@section('content')
<div class="container">
    <div class="row"> 
        <div class="col-md-12">
           <div class="card">
                <div class="card-header bg-gradient-primary">
                     <h4>Ažuriraj proizvod
                        <a href="{{ url('/admin/product') }}" class="btn bg-gradient-primary float-end">Nazad</a>
                     </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/product'.'/'.$products->id.'/edit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        @method('PUT')   
                        <div class="row">
                                    <div class="col-md-12  mb-2">
                                        <label for="">Kategorija</label>

                                        <select name="category" class="form-select">
                                            <option selected value="{{ $products->category_id }}">{{ $products->categoryId->name }}</option>
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
                                    <div class="col-md-12">
                                    @if($products->image)
                                        <img src="{{ asset('storage/product/'.$products->image) }}" height="50px" width="50px" alt="">
                                    @endif
                                    </div>
                                    <div class="col-md-12">
                                    <label for="">Upload image</label>
                                        <input type="file" name="image" class="form-control">
                                    </div>
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
                                            <input type="checkbox"  {{ $products->status == "1" ? 'checked': ' '}} name="status" >
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label class="mb-0" for="">Trending</label><br>
                                            <input type="checkbox"  {{ $products->trending == "1" ? 'checked': ' '}} name="trending">
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
@endsection