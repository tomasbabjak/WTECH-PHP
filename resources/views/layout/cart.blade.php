@extends('layout.app')

@section('content')

<section class="section-jumbotron text-center">
    <div class="container-fluid">
        <h1 class="jumbotron-heading">Môj košík</h1>
        <p class="lead">
        Vitajte vo Vašom nákupnom koši. Tu nájdete všetky produkty, ktoré
        ste si vybrali.
        </p>
    </div>
</section>
@foreach ($products as $product)
    <div class="container-fluid">
        <div class="row justify-content-center">
        <div class="col-lg-8 col-12">
            <div class="container card" id="{{($product->id)}}">
            <div class="row align-self-end">
                <div class="col-12">
                <form action="{{ route('cart.delete', ['id' => $product->id]) }}" method="post">
                    <input class="btn close" type="submit" value=&times; />
                    @csrf
                </form>

                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6">
                <div class="p-2">
                    <h4>{{($product->name)}}</h4>
                </div>
                <div class="p-2">
                    <div class="d-flex flex-row justify-content-center">
                    <div class="d-flex flex-column align-self-center">
                        <h5>{{($product->price)}} eur</h5>
                        <p class="items">Na sklade > {{($product->in_stock)}} ks</p>
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-12 col-sm-6">
                <img class="w-100" src="{{asset('img/products-laptop/'.$product->label.'.jpg')}}" />
                </div>
            </div>
            <div class="row justify-content-center align-items-center">
                <div class="input-group col-12 col-sm-6 col-md-4 col-lg-3">
                <form action="{{ route('fart.update', ['id' => $product->id]) }}" method="post">
                <div class="input-group-prepend">
                    <button
                    style="min-width: 2.5rem"
                    class="btn btn-decrement btn-outline-secondary"
                    type="submit button"
                    onclick="prepand('{{($product->name)}}-cart', {{($product->price)}}, '{{($product->id)}}-cart')"
                    >
                    <strong>-</strong>
                    </button>
                </div>
                <input
                    {{$cart_id=\Illuminate\Support\Facades\Auth::user()->cart->id}}
                    id="{{($product->name)}}-cart"
                    type="text"
                    style="text-align: center"
                    class="form-control"
                    placeholder="{{\App\CartItem::where('product_id',$product->id)->where('cart_id', $cart_id)->get()->first()->quantity}}"
                    name="arr"
                    value="{{\App\CartItem::where('product_id',$product->id)->where('cart_id', $cart_id)->get()->first()->quantity}}"
                />
                <div class="input-group-append">
                    <button
                    style="min-width: 2.5rem"
                    class="btn btn-increment btn-outline-secondary"
                    type="submit button"
                    onclick="append('{{($product->name)}}-cart', {{($product->price)}}, '{{($product->id)}}-cart')"
                    >
                    <strong>+</strong>
                    </button>
                </div>
                @csrf
                </form>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-4 align-self-end">
                    <div class="row justify-content-center">
                        <h3>Spolu: &nbsp;</h3>
                        <h3 id='{{($product->id)}}-cart'>{{($product->price)*(\App\CartItem::where('product_id',$product->id)->where('cart_id', $cart_id)->get()->first()->quantity)}}</h3>
                        <h3>€</h3>
                    </div>
                </div>
            </div>
            </div>
            </div>
            
            </div>
            
            </div>
            

    @endforeach
    <div class="container-fluid">
        <div class="row justify-content-center">
        <div class="col-lg-8 col-12">            
            <div class="row">
            <div
                class="col-12 d-flex justify-content-between align-items-center"
            >
                <a class="btn btn-secondary" href="{{route('test')}}"
                >Chcem nakupovať</a
                >
                <div class="">
                <a class="btn btn-secondary" href="shop2.html"
                    >Pokračovať</a
                >
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
@endsection