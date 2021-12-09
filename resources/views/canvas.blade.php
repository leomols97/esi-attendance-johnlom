<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="{{ secure_asset('css/canvas.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  @yield('css')
  <title>@yield('title')</title>
</head>
<header>
  <h1>@yield('title_header')</h1>
</header>

<body>
  <main class="main">
    @yield('content')
  </main>
  @yield('js')
</body>

<footer>JOHNLOM</footer>

</html>
