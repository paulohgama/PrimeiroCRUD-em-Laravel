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
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datacalendar" ).datepicker({
        altFormat: 'dd-mm-yy',
        changeMonth: true,
        changeYear: true,
        dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
        dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
        dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
        monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
        monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
    })
    ;
  });
  </script>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#" data-toggle="modal" data-target="#myModal">CRUD</a>
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
<h1>Editando Usuario</h1>
<form class="form-horizontal" method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
         {{ $lock = null}}
        <div class="form-group">
          <label class="control-label col-sm-2" for="nome">Nome</label>
          <div class="col-sm-10">
            <input type="text" name="nome" class="form-control" id="nome" value={{ $user->nome }} />
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Email</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" name="email" value={{ $user->email }} />
            </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="datacalendar">Data de Nascimento</label>
          <div class="col-sm-10">
              <input type="text" name="data" class="form-control" id="datacalendar" value={{ $user->datanasc }} />
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="foto">Foto</label>
          <div class="col-sm-10">
          <img src="/{{ $user->fotothun }}" class="img-thumbnail" alt="{{$user->nome}}"/>
          <input type="file" class="form-control" name="foto" id="foto">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="categoria">Categoria</label>
          <div class="col-sm-10">
          <select name="id_categoria" id="categoria" class="form-control">
              <option value="">Escolha sua categoria...</option>
          @foreach($categorias as $categoria)
            @if($categoria->id == $user->id_fk_categoria)
                {{$lock = 'selected'}}
            @else
                {{$lock = null}}
            @endif
              <option value="{{$categoria->id}}" {{$lock}}>{{$categoria->categoria}}</option>
          @endforeach
          </select>
          </div>
        </div>
        <div class="form-group"> 
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-refresh"></span> Atualizar</button>
          </div>
        </div>
      </form>
@include('inc.errors')
</div>
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">CRUD EM LARAVEL</h4>
      </div>
      <div class="modal-body">
        Paulo Henrique Silva dos Santos
      </div>
      <div class="modal-footer">
        <b>KBRTEC</b>
      </div>

    </div>
  </div>
</div>
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>