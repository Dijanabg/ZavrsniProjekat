@extends('layouts.inc.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-gradient-primary">
                    <h4>Naše prodavnice</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/store/create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Grad</label>
                                <input type="text" name="city" placeholder="Unesite grad" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="">Adresa</label>
                                <input type="text" name="adress" placeholder="Unesite adresu" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="">Telefon</label>
                                <input type="text" name="phone" placeholder="Unesite telefon" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="">Radno vreme</label>
                                <input type="text" name="work_time" placeholder="Unesite radno vreme" class="form-control">
                            </div>
                           
                            <div class="col-md-12">
                                <button type="submit" ><a class="btn bg-gradient-primary" name="">Save</a></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection