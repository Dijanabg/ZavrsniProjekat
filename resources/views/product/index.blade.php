@extends('layouts.app')
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
                                <th>ID</th>
                                <th>Ime</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Trend</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($products as $item)
                                    <tr>
                                        <td>{{ ucfirst($item->id) }}</td>
                                        <td class="text-sm">{{ ucfirst($item->name) }}</td>
                                        <td class="text-sm">{{ ucfirst($item->image) }}</td>
                                        
                                        <td class="text-sm">{{ ucfirst($item->status) }}</td>
                                        <td class="text-sm">{{ ucfirst($item->trending) }}</td>
                                        <td>
                                            <a href="{{ url('/product/'. $item->id.'/edit') }}" class="btn btn-sm bg-gradient-primary">Ažuriraj</a>
                                        </td>
                                        <td>
                                        <form action="{{ url('/product'.'/'. $item->id) }}" method="post">
                                        @csrf
                                @method('DELETE')
                                                <button type="submit" class="btn bg-gradient-primary" name="">Obriši</button>
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