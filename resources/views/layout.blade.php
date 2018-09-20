<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CRUD</title>
  <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">CRUD</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="/">Home</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Usuario
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="{{route('users.create')}}">Criar Usuario</a></li>
          <li><a href="{{route('users.index')}}">Listar Usuario</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Categoria
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="{{route('categorias.create')}}">Criar Categoria</a></li>
          <li><a href="{{route('categorias.index')}}">Listar Categoria</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
<div class="container">
  @yield('content')
  </div>
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>