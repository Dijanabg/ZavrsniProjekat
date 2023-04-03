@extends('layouts.inc.front')
@section('content')

<h2 class="fs-2 w-responsive font-weight-bold text-center my-4 mt-5  mb-5">Kontaktirajte nas</h2>

<p class="text-center fs-4 w-responsive mx-auto mb-2 mt-5">Da li imate neka pitanja za nas?</p>
<p class="text-center fs-4 w-responsive mx-auto ">Molimo nemojte odlagati, pišite nam odmah.</p>
<p class="text-center fs-4 w-responsive mx-auto ">Naš tim će Vam odgovoriti u najkraćem mogućem roku.</p>

<div class="row px-5 mt-5 mb-5">
    <div class="col-md-6 mb-md-0 mb-5 mt-5">
        <form id="contact-form" name="contact-form" action="{{ route('contact.submit') }}" method="POST">
        @csrf    
        <div class="row">
                <div class="col-md-2 mt-5"></div>
                <div class="col-md-5">
                    <div class="md-form mb-0">
                        <label for="name" class="fs-4">Vaše ime</label>
                        <input type="text" id="name" name="name" class="form-control">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="md-form mb-0">
                        <label for="email" class="fs-4">Vaš email</label>
                        <input type="text" id="email" name="email" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 mt-5"></div>
                    <div class="col-md-10">
                        <div class="md-form mb-0">
                            <label for="subject" class="fs-4">Tema</label>
                            <input type="text" id="subject" name="subject" class="form-control">
                        </div>
                    </div>
                </div>
            <div class="row">
            <div class="col-md-2 mt-5"></div>
                <div class="col-md-10">
                    <div class="md-form">
                        <label for="message"class="fs-4">Vaša poruka</label>
                        <textarea type="text" id="message" name="message" rows="5" class="form-control md-textarea"></textarea>
                    </div>
                </div>
            </div>
        </form>
        <div class="text-center text-md-left">
            <button type="submit">
                <a class="btn btn-primary" >Pošalji</a>
            </button>
        </div>
        <div class="status"></div>
    </div>
    <div class="col-md-1 mt-5"></div>
    <div class="col-md-3 mt-5 text-center">
        <ul class="list-unstyled mb-0 mt-5">
            <li>
                <i class="fas fa-map-marker-alt fa-2x"></i>
                <p class="fs-4">Nemanjina 1, Beograd, Srbija</p>
            </li>
            <li>
                <i class="fa fa-phone mt-4 fa-2x"></i>
                <p class="fs-4">+8164555666</p>
            </li>
            <li>
                <i class="fa fa-envelope mt-4 fa-2x"></i>
                <p class="fs-4">xzy@gmail.com</p>
            </li>
        </ul>
    </div>
</div>

<div class="row justify-content-center mb-5 mt-5 ">
<h3 class="fs-2 w-responsive font-weight-bold text-center">Naše prodavnice</h3>
</div>

<div class="row justify-content-center my-5 mt-5 ">
        <div class="col-8 table-data text-center">
            <table class="table table-bordered mt-5" id="table">
                <thead class="bg-secondary fs-4 text-white">
                    <tr>
                        <th>Grad</th>
                        <th>Adresa</th>
                        <th>Telefon</th>
                        <th>Radno vreme</th>
                    </tr>
                </thead>
                <tbody class="fs-4 ">
                    @foreach($stores as $item)
                            <tr>
                                <td>{{ ucfirst($item->city) }}</td>
                                <td>{{ ucfirst($item->adress) }}</td>
                                <td>{{ ucfirst($item->phone) }}</td>
                                <td>{{ ucfirst($item->work_time) }}</td>
                            </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</div>
@endsection