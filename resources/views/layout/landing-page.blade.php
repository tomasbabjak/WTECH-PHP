@extends('layout.app')

@section('content')
	<div class="dropdown-sm show">
		<a class="dropbtn btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kategórie</a>
		<div class="dropdown-menu dropdown-content" aria-labelledby="dropdownMenuLink">
		@foreach ($categories as $category)
			<a class="dropdown-item" href="{{route('test.show', $category->label)}}">{{$category->name}}</a>
		@endforeach
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-3 col-md-3 cont">
				<div class="sidenav-lg rightnav">
					<p>Kategorie:</p>
					@foreach ($categories as $category)
					<a href="{{route('test.show', $category->label)}}">{{$category->name}}</a>
					@endforeach
				</div>
			</div>
			<div class="col-lg-6 col-md-9 cont">
			<div id="car" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#car" data-slide-to="0" class="active"></li>
				<li data-target="#car" data-slide-to="1"></li>
				<li data-target="#car" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner">
				<div class="carousel-item active">
				<img class="d-block w-100" src="{{asset('img/pictures-laptop/boots_in_forest.jpg')}}" alt="First slide">
				</div>
				<div class="carousel-item">
				<img class="d-block w-100" src="{{asset('img/pictures-laptop/winter_adventure.jpg')}}" alt="Second slide">
				</div>
				<div class="carousel-item">
				<img class="d-block w-100" src="{{asset('img/pictures-laptop/boots_in_leaves.jpg')}}" alt="Third slide">
				</div>
			</div>
			</div>

			</div>
			<div class="col-lg-3 col-md-0 cont">
				<div class="sidenav-lg rightnav">
				</div>
			</div>
		</div>
	</div>
    @include('layout.partials.carousel-laptop');
	@include('layout.partials.carousel-phone');
@endsection
