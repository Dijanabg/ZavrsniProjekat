@extends('layouts.inc.front')
@section('content')
<div class="py-3 bg-secondary">
    <div class="container">
        <h6 class="text-white fs-4">
            <a href="home.php" class="text-white text-decoration-none  fs-4">Home /</a>
            Cart /
        </h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
    <select name="currency" id="currency" onchange="currencyChange()">
        <option value="eur" >EUR</option>
        <option value="rsd" selected>DIN</option>
    </select>
        <div class="card card-body shadow mt-3">
            <div class="row">
                <div class="col-md-12">
                    <div id="mycart">
                            <div class="row align-items-center">
                                <div class="col-md-6 text-center">
                                    <h6>Proizvod</h6>
                                </div>
                                <div class="col-md-2 text-center">
                                    <h6>Cena  <span id="currency_symbol">  DIN</span> </h6>
                                </div>
                                <div class="col-md-2 ">
                                    <h6>Akcija</h6>
                                </div>
                            </div>
                            <div id="">
                                @php $totalPrice = 0 @endphp
                                @foreach ($carts as $citem)
                                    <div class="card product_data shadow-sm mb-3">
                                        <div class="row align-items-center">
                                            <div class="col-md-2 text-center">
                                                <img src="" alt="Image" class="w-50">
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <h5>{{ ucfirst($citem->products->name) }}</h5>
                                            </div>
                                            <div class="col-md-2 text-center total">
                                                <h3 class="">{{ ucfirst($citem->products->sell_price) }} </h3>
                                            </div>
                                            <div class="col-md-2">
                                                <form action="{{ url('/cart') }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="product_id" value="{{ ucfirst($citem->products->id) }}">
                                                <button type="submit" class="btn btn-danger btn-sm" value="">
                                                    <i class="fa fa-trash me-2"></i>Ukloni
                                                </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                           
                            @php $totalPrice += $citem -> products ->sell_price @endphp
                           
                            @endforeach
                            <div class="text-center" >
                                <h5><span class=" fw-bold fs-3"> Ukupna cena: {{ $totalPrice}} DIN</span></h5>
                            </div>
                            <div class=" float-end">
                                <a href="{{ url('/check') }}" class="btn btn-outline-primary">Poruči</a>
                            </div>
                           
                      

                            <div class="card card-body text-center shadow">
                                <h4 class="py-3">Vaša korpa je prazna</h4>
                            </div>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    let default_currency = 'rsd';
function currencyChange(){
    const currency = $("#currency").val();
    const url = "https://cdn.jsdelivr.net/gh/fawazahmed0/currency-api@1/latest/currencies/"+default_currency+"/"+currency+".json";
    $.getJSON(url, function(data){
        //console.log(data);
        const total_all = $(".total");
        console.log(total_all);
        for(red of total_all){
            console.log(red.innerText);
            const red_float = parseFloat(red.innerText);
            if(currency=="eur"){
                red_novi = (red_float*data.eur).toFixed(2);
                $("#currency_symbol").text("€");
            }else{
                red_novi = (red_float*data.rsd).toFixed(2);
                $("#currency_symbol").text("DIN");
            }
            red.innerText = red_novi;
        }
        default_currency = currency;
    });
}
</script>
@endsection