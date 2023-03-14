@extends('layouts.app')
@section('content')
<div class="container"> 
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
                                        <td>{{ ucfirst($item->image) }}</td>
                                        <td>{{ ucfirst($item->status) }}</td>
                                       
                                        
                                        <td><a href="categories/edit" class="btn bg-gradient-primary">Ažuriraj</a>
                                            <form action="" method="post">
                                                <input type="hidden" name="id" value="">
                                                <button type="submit" class="btn bg-gradient-primary" name="delete_category_btn">Obriši</button>
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