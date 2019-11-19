@extends('layout.app')

@section('title', $product->id)
@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-lg-6 col-12 col-md-9">
        <div class="container">
            <div class="row">
            <div class="card">
                <div class="container">
                <img
                    id="expandedImg"
                    style="width:100%"
                    src="{{asset('img/products-laptop/'.$product->label.'.jpg')}}"
                />
                <div id="imgtext"></div>
                </div>
                <div class="row">
                <div class="column col-4">
                    <img
                    class="mini"
                    src="{{asset('img/products-laptop/'.$product->label.'.jpg')}}"
                    alt="{{asset('img/products-laptop/'.$product->label.'.jpg')}}"
                    onclick="myFunction(this.alt);"
                    />
                </div>
                <div class="column col-4">
                    <img
                    class="mini"
                    src="{{asset('img/products-laptop/'.$product->label.'.jpg')}}"
                    alt="{{asset('img/products-laptop/'.$product->label.'.jpg')}}"
                    onclick="myFunction(this.alt);"
                    />
                </div>
                <div class="column col-4">
                    <img
                    class="mini"
                    src="{{asset('img/products-laptop/'.$product->label.'.jpg')}}"
                    alt="{{asset('img/products-laptop/'.$product->label.'.jpg')}}"
                    onclick="myFunction(this.alt);"
                    />
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="col-lg-6 col-md-12 d-flex justify-content-md-center">
        <div class="d-flex flex-column">
            <div class="p-2">
            <h2>{{$product->name}}</h2>
            </div>
            <div class="p-2">
            <div class="d-flex flex-row justify-content-between">
                <div class="align-self-center">
                <p class="items">{{'Na sklade '.$product->in_stock.' ks'}}</p>
                </div>
                <div class="d-flex flex-column">
                <h4>{{'Cena: '.$product->price.' €'}}</h4>
                <p class="no-dph">Cena bez DPH: {{number_format((float)(($product->price)*0.8), 2, '.', '')}} €</p>
                </div>
            </div>
            </div>
            <div class="p-2">
            Popis produktu:
            <br />
            {{$product->detail}}
            </div>
            <div class="p-2">
            <div class="d-flex flex-row justify-content-between">
                <div class="form-group">
                <label for="sel1">Vyberte velkost:</label>
                <select class="form-control">
                    <option value="41">41</option>
                    <option value="42">42</option>
                    <option value="43">43</option>
                    <option value="44">44</option>
                </select>
                </div>
                <div class="align-self-center">
                <form action="{{ route('cart.store')}}" method="POST">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <button type="submit" class="btn btn-success">
                    Pridat do kosika
                    </button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="selected_products-laptop">   
    <h2>Podobne produkty</h2>
    <div
        id="carouselExampleIndicators1a"
        class="carousel slide"
        data-ride="carousel"
    >
        <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="row">
            @for ($i = 0; $i < 3; ++$i)
                <div class="col produkt-name">
                    <a href={{route('obuv.show', $products[$i]->label)}}>
                    <img class="w-100" src="{{asset('img/products-laptop/'.$products[$i]->label.'.jpg')}}"/>
                    <div class="product_name">
                    <h6>{{ $products[$i]->name}}</h6>
                    </div>
                    <div class="price">{{ $products[$i]->price.' €'}}</div>
                    </a>
                </div>
            @endfor
            </div>
        </div>
        <div class="carousel-item ">
            <div class="row">
            @for ($i = 3; $i < 6; ++$i)
                <div class="col produkt-name">
                    <a href={{route('obuv.show', $products[$i]->label)}}>
                    <img class="w-100" src="{{asset('img/products-laptop/'.$products[$i]->label.'.jpg')}}" />
                    <div class="product_name">
                    <h6>{{ $products[$i]->name}}</h6>
                    </div>
                    <div class="price">{{ $products[$i]->price.' €'}}</div>
                    </a>
                </div>
            @endfor
            </div>
        </div>
        </div>
        <a
        class="carousel-control-prev"
        href="#carouselExampleIndicators1a"
        role="button"
        data-slide="prev"
        >
        <span
            class="carousel-control-prev-icon"
            aria-hidden="true"
        ></span>
        <span class="sr-only">Previous</span>
        </a>
        <a
        class="carousel-control-next"
        href="#carouselExampleIndicators1a"
        role="button"
        data-slide="next"
        >
        <span
            class="carousel-control-next-icon"
            aria-hidden="true"
        ></span>
        <span class="sr-only">Next</span>
        </a>
    </div>
</section>
<section class="selected_products-phone">
    <h2>Podobne produkty</h2>
    <div
    id="carouselExampleIndicators2a"
    class="carousel slide"
    data-ride="carousel"
    >
    <div class="carousel-inner">
        <div class="carousel-item active">
        <div class="row">
        @for ($i = 0; $i < 2; ++$i)
            <div class="col produkt-name">
            <a href={{route('obuv.show', $products[$i]->label)}}>
            <img class="w-100" src="{{asset('img/products-laptop/'.$products[$i]->label.'.jpg')}}" />
            <div class="product_name">
                <h6>{{ $products[$i]->name}}</h6>
            </div>
            <div class="price">{{ $products[$i]->price.' €'}}</div>
            </a>
        </div>
        @endfor
        </div>
        </div>
        <div class="carousel-item ">
        <div class="row">
        @for ($i = 2; $i < 4; ++$i)
            <div class="col produkt-name">
            <a href={{route('obuv.show', $products[$i]->label)}}>
            <img src="{{asset('img/products-laptop/'.$products[$i]->label.'.jpg')}}" class="w-100" alt="..." />
            <div class="product_name">
                <h6>{{ $products[$i]->name}}</h6>
            </div>
            <div class="price">{{ $products[$i]->price.' €'}}</div>
</a>
            </div>
            @endfor
        </div>
        </div>
    </div>
    <a
        class="carousel-control-prev"
        href="#carouselExampleIndicators2a"
        role="button"
        data-slide="prev"
    >
        <span
        class="carousel-control-prev-icon"
        aria-hidden="true"
        ></span>
        <span class="sr-only">Previous</span>
    </a>
    <a
        class="carousel-control-next"
        href="#carouselExampleIndicators2a"
        role="button"
        data-slide="next"
    >
        <span
        class="carousel-control-next-icon"
        aria-hidden="true"
        ></span>
        <span class="sr-only">Next</span>
    </a>
    </div>
</section>
@endsection