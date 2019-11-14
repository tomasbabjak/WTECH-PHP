<!doctype html>
<html lang="sk">
<head>
    @include('layout.partials.head')
</head>

<body>
    <!-- Header for every page -->
    @include('layout.partials.header')

    <main role="main" class="">
        @yield('content')
    </main>
  
    <!-- Bootstrap core JavaScript -->
    @include('layout.partials.footer-scripts');

    <!-- Footer for every page -->
    @include('layout.partials.footer-text')

</body>
</html>     
