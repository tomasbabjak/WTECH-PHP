@extends('layout.app')

@section('content')
<section class="section-jumbotron text-center">
    <div class="container-fluid">
        <h1 class="jumbotron-heading">{{$category->name}}</h1>
        <p class="lead">
        {{$category->description}}
        </p>
    </div>
</section>
<div class="products">
    <div class="btn-group">
        <div class="dropdown">
        <a
            class="dropbtn btn btn-secondary"
            href="#collapse"
            role="button"
            id="b1"
            data-toggle="collapse"
            aria-haspopup="true"
            aria-expanded="false"
            aria-controls="collapse"
            >Filtrovať</a
        >
        <div class="collapse" id="collapse">
            <div class="card">
            <h4>Značka:</h4>
            <form action="{{ route('test.show', ['category'=>request()->category])}}" method="get">
                @foreach ($brands as $brand)
                    <div class="form-check">
                        <input
                        class="form-check-input"
                        type="checkbox"
                        name="arr[]"
                        value="{{$brand}}"
                        id="{{$brand}}"
                        />
                        <label class="form-check-label" for="{{$brand}}">
                        {{$brand}}
                        </label>
                    </div>
                @endforeach
                <button type="submit" class="fixed-ct">Filtrovat</button>
                @csrf
            </form>
            </div>
        </div>
        </div>
        <div class="dropdown">
        <a
            class="dropbtn btn btn-secondary dropdown-toggle"
            href="#"
            role="button"
            id="b2"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
            >Usporiadat</a
        >
        <div class="dropdown-menu dropdown-content" aria-labelledby="b2">
            <a class="dropdown-item " href="{{ route('test.show', ['category' =>request()->category, 'sort' => 'low']+\Request::all())}}">Najnizsia cena</a>
            <a class="dropdown-item" href="{{ route('test.show', ['category' =>request()->category, 'sort' => 'high']+\Request::all()) }}">Najvyssia cena</a>
            <a class="dropdown-item" href="{{ route('test.show', ['category' =>request()->category, 'sort' => 'az']+\Request::all()) }}">Podla abecedy A-Z</a>
            <a class="dropdown-item" href="{{ route('test.show', ['category' =>request()->category, 'sort' => 'za']+\Request::all()) }}">Podla abecedy Z-A</a>
  </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
        <div class="col-lg-3">
            <div class="filter-laptop">
                <div class="dropdown">
                    <a
                        class="dropbtn btn btn-secondary dropdown-toggle"
                        href="#"
                        role="button"
                        id="b2"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                        >Usporiadat</a
                    >
                    <div class="dropdown-menu dropdown-content" aria-labelledby="b2">
                        <a class="dropdown-item " href="{{ route('test.show', ['category' =>request()->category, 'sort' => 'low']+\Request::all()) }}">Najnizsia cena</a>
                        <a class="dropdown-item" href="{{ route('test.show', ['category' =>request()->category, 'sort' => 'high']+\Request::all()) }}">Najvyssia cena</a>
                        <a class="dropdown-item" href="{{ route('test.show', ['category' =>request()->category, 'sort' => 'az']+\Request::all()) }}">Podla abecedy A-Z</a>
                        <a class="dropdown-item" href="{{ route('test.show', ['category' =>request()->category, 'sort' => 'za']+\Request::all()) }}">Podla abecedy Z-A</a>
                    </div>
                </div>
            <div class="card">
            <form action="{{ route('test.show', ['category'=>request()->category])}}" method="get">
                @foreach ($brands as $brand)
                    <div class="form-check">
                        <input
                        class="form-check-input"
                        type="checkbox"
                        name="arr[]"
                        value="{{$brand}}"
                        id="{{$brand}}"
                        />
                        <label class="form-check-label" for="{{$brand}}">
                        {{$brand}}
                        </label>
                    </div>
                @endforeach
                <button type="submit" class="fixed-ct">Filtrovat</button>
                @csrf

            </form>
            </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="container-fluid">
            <div class="row">
                @foreach ($products as $product)
                <div class="col-md-6 col-lg-4 col-sm-6 col-6">
                    <div class="card">
                    <a class="produkt-name" href={{route('obuv.show', $product->label)}}>
                        <img src="{{asset('img/products-laptop/'.$product->label.'.jpg')}}" class="w-100" alt="..." />
                        <div class="product_name">
                            <h6>{{$product->name}}</h6>
                        </div>
                        <div class="price">{{$product->price.' €'}}</div>
                    </a>        
                    </div>
                </div>
                @endforeach
            </div>
            <nav aria-label="Navigacia produktov">
                    <ul class="pagination justify-content-center">
                    @if($products instanceof \Illuminate\Pagination\AbstractPaginator )
                        {{ $products->appends(request()->input())->links() }}
                    @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>

@endsection