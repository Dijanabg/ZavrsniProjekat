@extends('layouts.inc.admin')
@section('content')
<div class="container w-80"> 
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-gradient-primary">
                    <h4>Kategorije</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Ime</th>
                                <th>Image</th> 
                                <th>Status</th> 
                                <th>Akcija</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($category as $item)
                                    <tr>
                                        <td>{{ ucfirst($item->id) }}</td>
                                        <td>{{ ucfirst($item->name) }}</td>
                                        <td><img src="{{ asset('/storage/category/'.$item->image) }}" alt=""></td>
                                        <td>{{ ucfirst($item->status) }}</td>
                                       
                                        
                                        <td><a href="{{ url('/admin/categories/'. $item->id.'/edit') }}" class="btn bg-gradient-primary">Ažuriraj</a>
                                            <form action="{{ url('/admin/categories'.'/'. $item->id) }}" method="POST">
                                            @csrf
                                @method('DELETE')
                                                <a class="btn bg-gradient-primary" name="">Obriši</a>
                                            </form>
                                        </td>
                                    </tr>
                            @empty
                           <p class="text-warning">Nema dostupnih kategorija</p>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection