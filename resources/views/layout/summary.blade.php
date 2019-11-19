@extends('layout.app')

@section('content')
<section class="section-jumbotron text-center">
    <div class="container-fluid">
        <h1 class="jumbotron-heading">Zhrnutie</h1>
        <p class="lead">
        Súhrn informácii o Vašom nákupe, ak je všetko v poriadku, prejdite k
        platbe.
        </p>
    </div>
    </section>
    <div class="container">
    <div class="row">
        <div class="col-lg-6 col-12 card">
        <h3>Tovar:</h3>
        <p hidden>{{($cart_id=\Illuminate\Support\Facades\Auth::user()->cart->id)}}</p>
        @foreach ($products as $product)
        <p>{{(\App\CartItem::where('product_id',$product->id)->where('cart_id', $cart_id)->get()->first()->quantity)}} x {{($product->name)}}</p>
        @endforeach
        <h3>Doprava:</h3>
        <p>{{(\App\Transport::where('id',$order->transport_id)->get()->first()->name)}}</p>
        <h3>Spôsob platby:</h3>
        <p>{{(\App\Payment::where('id',$order->payment_id)->get()->first()->name)}}</p>
        </div>
        <div class="col-lg-6 col-12 card">
        <h3>Fakturačné údaje:</h3>
        <p>{{($customer->first_name)}} {{($customer->last_name)}}</p>
        <p>{{($customer->email)}}</p>
        <p>{{($customer->street)}}</p>
        <p>{{($customer->zip)}}, {{($customer->city)}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
        <h3>Spolu: {{number_format((float)(($sum) + (\App\Transport::where('id',$order->transport_id)->get()->first()->price)), 2, '.', '')}} €</h3>
        <p>Spolu bez DPH: {{number_format((float)(($sum)*0.8 + (\App\Transport::where('id',$order->transport_id)->get()->first()->price)), 2, '.', '')}} €</p>
        </div>
        <div class="col-12 d-flex justify-content-between align-items-center">
        <a class="btn btn-secondary" href="{{route('transport.index')}}">Späť</a>
        <div class="">
            <a class="btn btn-secondary" href="{{route('customer.show')}}">Objednať</a>
            <p>S povinnosťou platby</p>
        </div>
        </div>
    </div>
    </div>
@endsection