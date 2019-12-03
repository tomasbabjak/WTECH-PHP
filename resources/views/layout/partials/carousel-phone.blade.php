<section class="selected_products-phone">
    <h2>Odporúčané</h2>
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
            <a href={{route('obuv.show', $products1[$i]->label)}}>
            <img class="w-100" src="{{asset('img/products-laptop/'.$products1[$i]->label.'.jpg')}}" />
            <div class="product_name">
                <h6>{{ $products1[$i]->brand.' '.$products1[$i]->name}}</h6>
            </div>
            <div class="price">{{ $products1[$i]->price.' €'}}</div>
</a>
        </div>
        @endfor
        </div>
        </div>
        <div class="carousel-item ">
        <div class="row">
        @for ($i = 2; $i < 4; ++$i)
            <div class="col produkt-name">
            <a href={{route('obuv.show', $products1[$i]->label)}}>
            <img src="{{asset('img/products-laptop/'.$products1[$i]->label.'.jpg')}}" class="w-100" alt="..." />
            <div class="product_name">
                <h6>{{ $products1[$i]->brand.' '.$products1[$i]->name}}</h6>
            </div>
            <div class="price">{{ $products1[$i]->price.' €'}}</div>
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
    <h2>Výpredaj</h2>
    <div
    id="carouselExampleIndicators2b"
    class="carousel slide"
    data-ride="carousel"
    >
    <div class="carousel-inner">
        <div class="carousel-item active">
        <div class="row">
        @for ($i = 0; $i < 2; ++$i)
            <div class="col produkt-name">
            <a href={{route('obuv.show', $products2[$i]->label)}}>
            <img class="w-100" src="{{asset('img/products-laptop/'.$products2[$i]->label.'.jpg')}}" />
            <div class="product_name">
                <h6>{{ $products2[$i]->brand.' '.$products2[$i]->name}}</h6>
            </div>
            <div class="price">{{ $products2[$i]->price.' €'}}</div>
</a>
        </div>
        @endfor
        </div>
        </div>
        <div class="carousel-item ">
        <div class="row">
        @for ($i = 2; $i < 4; ++$i)
            <div class="col produkt-name">
            <a href={{route('obuv.show', $products2[$i]->label)}}>
            <img src="{{asset('img/products-laptop/'.$products2[$i]->label.'.jpg')}}" class="w-100" alt="..." />
            <div class="product_name">
                <h6>{{ $products2[$i]->brand.' '.$products2[$i]->name}}</h6>
            </div>
            <div class="price">{{ $products2[$i]->price.' €'}}</div>
</a>
            </div>
            @endfor
        </div>
        </div>
    </div>
    <a
        class="carousel-control-prev"
        href="#carouselExampleIndicators2b"
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
        href="#carouselExampleIndicators2b"
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
    <h2>Novinky</h2>
    <div
    id="carouselExampleIndicators2c"
    class="carousel slide"
    data-ride="carousel"
    >
    <div class="carousel-inner">
        <div class="carousel-item active">
        <div class="row">
        @for ($i = 0; $i < 2; ++$i)
            <div class="col produkt-name">
            <a href={{route('obuv.show', $products3[$i]->label)}}>
            <img class="w-100" src="{{asset('img/products-laptop/'.$products3[$i]->label.'.jpg')}}" />
            <div class="product_name">
                <h6>{{ $products3[$i]->brand.' '.$products3[$i]->name}}</h6>
            </div>
            <div class="price">{{ $products3[$i]->price.' €'}}</div>
</a>
        </div>
        @endfor
        </div>
        </div>
        <div class="carousel-item ">
        <div class="row">
        @for ($i = 2; $i < 4; ++$i)
            <div class="col produkt-name">
            <a href={{route('obuv.show', $products3[$i]->label)}}>
            <img src="{{asset('img/products-laptop/'.$products3[$i]->label.'.jpg')}}" class="w-100" alt="..." />
            <div class="product_name">
                <h6>{{ $products3[$i]->brand.' '.$products3[$i]->name}}</h6>
            </div>
            <div class="price">{{ $products3[$i]->price.' €'}}</div>
</a>
            </div>
            @endfor
        </div>
        </div>
    </div>
    <a
        class="carousel-control-prev"
        href="#carouselExampleIndicators2c"
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
        href="#carouselExampleIndicators2c"
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