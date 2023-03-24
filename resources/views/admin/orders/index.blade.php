@extends('layouts.inc.admin')
@section('content')

    <div class="container">
        <div class="card card-body shadow mt-3">
            <div class="row">
                <div class="card-header bg-gradient-primary">
                    <h4>Orders</h4>
                </div>
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Korisnik Id</th>
                                <th>Tracking No</th>
                                <th>Cena</th>
                                <th>Datum</th>
                                <th>Vidi</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($orders as $item) 
                                    <tr>
                                        <td>{{ ucfirst($item->id) }}</td>
                                        <td>{{ ucfirst($item->user_id) }}</td>
                                        <td>{{ ucfirst($item->tracking_no) }}</td>
                                        <td>{{ ucfirst($item->total_price) }}</td>
                                        <td>{{ ucfirst($item->created_at) }}</td>
                                        <td><a href="{{ url('/admin/order/'.$item->id.'/edit') }}" class="btn bg-gradient-primary">Vidi detalje</a></td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="5">Nema porudzbina</td>
                                </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection