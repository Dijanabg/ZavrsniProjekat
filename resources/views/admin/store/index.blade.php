@extends('layouts.inc.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-gradient-primary">
                    <h4>Prodavnice</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Grad</th>
                                <th>Adresa</th>
                                <th>Telefon</th>
                                <th>Radno vreme</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($store as $item)
                                    <tr>
                                        <td>{{ ucfirst($item->id) }}</td>
                                        <td>{{ $item->city }}</td>
                                        <td>{{ $item->adress }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->work_time }}</td>
                                        
                                        <td><a href="{{ url('/admin/store/'. $item->id.'/edit') }}" class="btn bg-gradient-primary">Ažuriraj</a>
                                            <form action="{{ url('/admin/store'.'/'. $item->id) }}" method="POST">
                                            @csrf
                                @method('DELETE')
                                                <button type="submit" class="btn bg-gradient-primary" name="">Obriši</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endsection