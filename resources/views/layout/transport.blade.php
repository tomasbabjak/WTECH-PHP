@extends('layout.app')

@section('content')

<section class="section-jumbotron text-center">
        <div class="container-fluid">
          <h1 class="jumbotron-heading">Doprava a platba</h1>
          <p class="lead">
            Vyberte prosím spôsob doručenia tovaru a platby.
          </p>
        </div>
      </section>
      <div class="card">
        <div class="row justify-content-center">
          <div class="mb-2 col-lg-8">
            <div class="card ">
			<form action="{{ route('transport.show')}}" method="get">
              <div class="platba">
                <h4>Vyberte dopravu:</h4>
				@foreach ($transports as $transport)
                <div class="custom-control custom-radio">
                  <input
                    type="radio"
                    class="custom-control-input"
                    id="transport{{$transport->id}}"
                    name="radio1[]"
					value="{{$transport->id}}"
                    required
                  />
                  <label
                    class="custom-control-label"
                    for="transport{{$transport->id}}"
                    >{{$transport->name}}</label
                  >
                  <label class="cena-doprava" for="transport{{$transport->id}}">
                    {{$transport->price}}</label
                  >
                </div>
				@endforeach
              </div>
            </div>
            <div class="card">
              <div class="platba">
                <h4>Vyberte sposob platby:</h4>
				@foreach ($payments as $payment)
                <div class="custom-control custom-radio">
                  <input
                    type="radio"
                    class="custom-control-input"
                    id="payment{{$payment->id}}"
                    name="radio2[]"
					value="{{$payment->id}}"
                    required
                  />
                  <label
                    class="custom-control-label"
                    for="payment{{$payment->id}}"
                    >{{$payment->name}}</label
                  >
                </div>
				@endforeach
              </div>
            </div>
            <div class="d-flex flex-row justify-content-between">
              <button class="btn btn-secondary" href="{{route('fart.index')}}">Späť</button>
              <button class="btn btn-secondary" type="submit" href="{{route('transport.show')}}">Pokračovať</button>
			  @csrf
			</form>
            </div>
          </div>
        </div>
      </div>
@endsection