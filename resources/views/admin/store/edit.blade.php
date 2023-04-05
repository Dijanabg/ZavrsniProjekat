@extends('layouts.inc.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-gradient-primary">
                            <h4>Ažuriraj prodavnicu
                                <a href="{{ url('admin/store') }}" class="btn bg-gradient-primary float-end">Nazad</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('admin/store/'.$store->id.'/edit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="hidden" name="id" value="{{ $store->id }}">
                                        <label for="">Grad</label>
                                        <input type="text" name="city" value="{{ $store->city }}" placeholder="Unesi ime grada" class="form-control">
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <label for="">Adresa</label>
                                        <input type="text" name="adress" value="{{ $store->adress }}" placeholder="Unesi adresu" class="form-control">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Telefon</label>
                                        <input type="text" name="phone" value="{{ $store->phone }}" placeholder="Unesi telefon" class="form-control">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Radno vreme</label>
                                        <input type="text" name="work_time" value="{{ $store->work_time }}" placeholder="Unesi radno vreme" class="form-control">
                                    </div>
 
                                    
                                    <div class="col-md-12">
                                        <button type="submit" ><a class="btn bg-gradient-primary" name="">Ažuriraj</a></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
    </div>
</div>
@endsection