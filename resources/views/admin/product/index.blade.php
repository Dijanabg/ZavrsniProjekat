@extends('layouts.inc.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-gradient-primary">
                    <h4>Proizvodi</h4>
                </div>
                <div class="card-body" id="products_table">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="fs-6 text-sm">ID</th>
                                <th class="fs-6 text-sm">Ime</th>
                                <th class="fs-6 text-sm">Image</th>
                                <th class="fs-6 text-sm">Status</th>
                                <th class="fs-6 text-sm">Trend</th>
                                <th class="fs-6 text-sm">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($products as $item)
                                    <tr>
                                        <td>{{ ucfirst($item->id) }}</td>
                                        <td class="fs-6 text-sm">{{ ucfirst($item->name) }}</td>
                                        <td class="text-sm"><img src="{{ asset('storage/product/'.$item->image) }}" alt=""></td>
                                        
                                        <td class="text-sm">{{ ucfirst($item->status) }}</td>
                                        <td class="text-sm">{{ ucfirst($item->trending) }}</td>
                                        <td>
                                            <a href="{{ url('/admin/product/'. $item->id.'/edit') }}" class="btn btn-sm bg-gradient-primary">Ažuriraj</a>
                                        
                                        <form action="{{ url('/admin/product'.'/'. $item->id) }}" method="post">
                                        @csrf
                                @method('DELETE')
                                                <button type="submit" ><a class="btn bg-gradient-primary" name="">Obriši</a></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <p class="text-warning">Nema dostupnih proizvoda</p>
                        @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

@endsection