<header class="header">
    <div class="header_bar">
      <button class="btn_bar" onclick="openNav()" id="btn_menu">
        <img src="{{ asset('img/pictures-320/menu-42.png') }}" alt="menu icon" />
      </button>
      <button
        class="navbar-toggler btn_bar"
        id="btn_search"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <img src="{{ asset('img/pictures-320/search-42.png') }}" alt="search icon" />
      </button>
      <a href={{route('test')}} title="Uvodna stranka eshopu terra">
        <img src="{{ asset('img/terra_logo.png') }}" alt="terra logo" />
      </a>
      <div class="full-search">
        <form class="form-inline my-2 my-lg-0 full-search">
          <input
            class="form-control mr-sm-2"
            type="search"
            placeholder="Search"
            aria-label="Search"
          />
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
            Search
          </button>
        </form>
      </div>
      <button class="btn_bar" id="btn_user">
        <img src="{{ asset('img/pictures-320/user-42.png') }}" alt="button icon" />
      </button>
      <button class="btn_bar" id="btn_cart">
        <a href="{{route('fart.index')}}">
          <img src="{{ asset('img/pictures-320/cart-42.png') }}" alt="cart icon" />
        </a>
      </button>
    </div>

    <div id="mySidenav" class="sidenav-sm">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"
        >&times;</a
      >
      <div>
      	@guest
        <a href="{{ route('login') }}">Prihlasenie/Registracia</a>
		@endguest
		@auth
		<div class="row justify-content-between user-panel">
			<a class="col-3 " href="#" role="button" v-pre>
			{{ Auth::user()->name }} <span class="caret"></span>
			</a>
            <a class="col-4" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
		</div>
        @endauth
        <a href="{{route('fart.index')}}">Nakupny kosik</a>
        <a href="#">O nas</a>
        <a href="#">Kontakt</a>
        <a data-toggle="collapse" href="#collapse1">Kategorie</a>
        <div id="collapse1" class="collapse">
          @foreach ($categories as $category)
					<a class="panel-body" href="{{route('test.show', $category->label)}}">{{$category->name}}</a>
					@endforeach
        </div>
      </div>
    </div>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <form class="form-inline my-2 my-lg-0">
        <input
          class="form-control mr-sm-2"
          type="search"
          placeholder="Search"
          aria-label="Search"
        />
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
          Search
        </button>
      </form>
    </div>

    <div class="nav-row">
      <ul class="nav flex-column flex-sm-row justify-content-center">
        <li class="nav-item flex-sm-fill">
		@guest
        <a class="nav-link" href="{{ route('login') }}">Prihlasenie/Registracia</a>
		@endguest
		@auth
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          {{ Auth::user()->name }} <span class="caret"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
        @endauth        </li>
        <li class="nav-item flex-sm-fill">
          <a class="nav-link" href="{{route('fart.index')}}">Nakupny kosik</a>
        </li>
        <li class="nav-item flex-sm-fill">
          <a class="nav-link" href="#">O nas</a>
        </li>
        <li class="nav-item flex-sm-fill">
          <a class="nav-link" href="#">Kontakt</a>
        </li>
        <li class="nav-item show flex-sm-fill ">
          <a
            class="nav-link dropdown-toggle"
            href="#"
            role="button"
            id="dropdownMenuLink"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
            >Kategorie</a
          >
          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            @foreach ($categories as $category)
					<a class="dropdown-item" href="{{route('test.show', $category->label)}}">{{$category->name}}</a>
					@endforeach
          </div>
        </li>
      </ul>
    </div>
  </header>
