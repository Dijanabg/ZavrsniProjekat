@extends('layouts.inc.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-gradient-primary">
                    <h4>Unos nove kategorije</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/categories/create') }}" method="POST" enctype="multipart/form-data">
                       @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Ime</label>
                                <input type="text" name="name" placeholder="Unesite ime kategorije" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="">Opis kategorije</label>
                                <input type="text" name="slug" placeholder="Unesite opis kategorije" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="">Upload image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="">Status</label>
                                <input type="checkbox" name="status" >
                            </div>
                            <div class="col-md-12">
                                <button type="submit" ><a class="btn bg-gradient-primary" id="btn-submit">Save</a></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection