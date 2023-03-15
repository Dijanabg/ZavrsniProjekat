@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-gradient-primary">
                            <h4>Ažuriraj kategoriju
                                <a href="{{ url('categories') }}" class="btn bg-gradient-primary float-end">Nazad</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('categories/'.$categories->id.'/edit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="hidden" name="id" value="{{ $categories->id }}">
                                        <label for="">Ime</label>
                                        <input type="text" name="name" value="{{ $categories->name }}" placeholder="Unesi ime kategorije" class="form-control">
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <label for="">Opis</label>
                                        <input type="text" name="slug" value="{{ $categories->slug }}" placeholder="Unesi slug" class="form-control">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Upload image</label>
                                        <input type="file" name="image" class="form-control" required>
                                        <label for="">Trenutna slika</label>
                                        <input type="hidden" name="old_image" value="{{ $categories->image }}">
                                        <img src="../uploads/{{ $categories->image }}>" height="50px" width="50px" alt="">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Opis</label>
                                        <input type="text" name="status" value="{{ $categories->status }}" placeholder="Unesi slug" class="form-control">
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn bg-gradient-primary" >Ažuriraj</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
        </div>
    </div>
</div> 