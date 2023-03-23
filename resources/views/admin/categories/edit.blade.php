@extends('layouts.inc.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-gradient-primary">
                            <h4>Ažuriraj kategoriju
                                <a href="{{ url('admin/categories') }}" class="btn bg-gradient-primary float-end">Nazad</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('admin/categories/'.$categories->id.'/edit') }}" method="POST" enctype="multipart/form-data">
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
                                    @if($categories->image)
                                        <img src="{{ asset('storage/category/'.$categories->image) }}" height="50px" width="50px" alt="">
                                    @endif
                                    </div>
                                    <div class="col-md-12">
                                    <label for="">Upload image</label>
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                    <div class="col-md-12">
                                <label for="">Status</label>
                                <input type="checkbox" name="status" {{ $categories->status == "1" ? 'checked': ' '}}>
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
@endsection