@extends('layout.app')

@section('content')

<section class="section-jumbotron text-center">
    <div class="container-fluid">
        <h1 class="jumbotron-heading">Fakturačné údaje</h1>
        <p class="lead">
        Vyplňte prosím adresu, kde Vám má byť tovar doručený.
        </p>
    </div>
</section>

<div class="card">
<form action="{{ route('customer.index')}}" method="get">
    <div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-10">
        <div class="form-row">
            <div class="col-md-6 col-lg-6 mb-3">
            <label for="validationServer01">Meno</label>
            <input
                name="fname"
                type="text"
                class="form-control"
                id="validationServer01"
                placeholder="Meno"
            />
            </div>
            <div class="col-md-6 col-lg-6 mb-3">
            <label for="validationServer02">Priezvisko</label>
            <input
                name="lname"
                type="text"
                class="form-control"
                id="validationServer02"
                placeholder="Priezvisko"
                required
            />
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6 col-lg-6 mb-3">
            <label for="validationServerUsername">E-mail</label>
            <div class="input-group">
                <input
                name="email"
                type="email"
                class="form-control"
                id="validationServerUsername"
                placeholder="E-mail"
                aria-describedby="inputGroupPrepend3"
                required
                />
            </div>
            </div>
            <div class="col-md-6 col-lg-6 mb-3">
            <label for="validationServerUsername1"
                >Telefónne číslo:</label
            >
            <div class="input-group">
                <input
                name="phone"
                type="phone"
                class="form-control"
                id="validationServerUsername1"
                placeholder="Telefonne cislo"
                aria-describedby="inputGroupPrepend3"
                required
                />
            </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6 col-lg-6 mb-3">
            <label for="validationServerUsername2">Krajina</label>
            <div class="input-group">
                <input
                name="country"
                type="text"
                class="form-control"
                id="validationServerUsername2"
                placeholder="Krajina"
                aria-describedby="inputGroupPrepend3"
                required
                />
            </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="inputAddress">Ulica</label>
                <input
                name="address"
                type="text"
                class="form-control"
                id="inputAddress"
                placeholder="Ulica"
                />
            </div>
            </div>
            <div class="col-md-3 mb-3">
            <label for="validationServer04">Mesto</label>
            <input
                name="city"
                type="text"
                class="form-control"
                id="validationServer04"
                placeholder="Mesto"
                required
            />
            </div>
            <div class="col-md-3 mb-3">
            <label for="validationServer05">PSC</label>
            <input
                name="zip"
                type="text"
                class="form-control"
                id="validationServer05"
                placeholder="PSC"
                required
            />
            </div>
        </div>
        <div class="form-group">
            <div class="form-check">
            <input
                class="form-check-input"
                type="checkbox"
                value=""
                id="invalidCheck3"
                required
            />
            <label class="form-check-label" for="invalidCheck3">
                Podvrdte suhlas so spracovanim osobnych udajov.
            </label>
            </div>
        </div>
        <div class="d-flex flex-row justify-content-between">
            <button class="btn btn-secondary" href="{{route('transport.index')}}">Späť</button>
            <button class="btn btn-secondary" type="submit" href="{{route('customer.index')}}">Pokračovať</button>
        </div>
        </div>
    </div>
    </div>
</form>
</div>
@endsection