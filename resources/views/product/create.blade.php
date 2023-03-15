@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-gradient-primary">
                    <h4>Dodaj proizvod</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('product/create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="col-md-12  mb-2">
                                <label for="">Izaberi kategoriju</label>
                                <select name="category" class="form-select">
                                    <option selected>Izaberi kategoriju</option>
                                @foreach($categories as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                                        </select>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="">Ime</label>
                                <input type="text" required name="name" placeholder="Unesi ime proizvoda" class="form-control mb-2">
                            </div>
                            
                            <div class="col-md-12">
                                <label class="mb-0" for="">Kratki opis</label>
                                <input type="text" required name="short_desc" placeholder="Unesi kratki opis" class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="">Opis</label>
                                <input type="text" required name="description" placeholder="Unesi opis" class="form-control mb-2 ">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0" for="">Orginalna cena</label>
                                <input type="text" required name="orig_price" placeholder="Unesi orginalnu cenu" class="form-control mb-2">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0" for="">Prodajna cena</label>
                                <input type="text" required name="sell_price" placeholder="Unesi prodajnu cenu" class="form-control  mb-2">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="">Slug</label>
                                <input type="text" required name="slug" placeholder="Unesi slug" class="form-control  mb-2">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="">Upload image</label>
                                <input type="file" required name="image" class="form-control mb-2">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="mb-0" for="">Količina</label>
                                    <input type="text" required name="qty" placeholder="Unesi količinu" class="form-control mb-2">
                                </div>
                                <div class="col-md-3  mb-2">
                                    <label class="mb-0" for="">Status</label><br>
                                    <input type="checkbox" name="status">
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label class="mb-0" for="">Trending</label><br>
                                    <input type="checkbox" name="trending">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn bg-gradient-primary" name="">Sačuvaj</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection