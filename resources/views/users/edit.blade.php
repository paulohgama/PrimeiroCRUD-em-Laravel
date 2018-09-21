@extends('layout')

@section('content')
<h1>Editando Usuario</h1>
<form class="form-horizontal" method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
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
          <label class="control-label col-sm-2" for="data">Data de Nascimento</label>
          <div class="col-sm-10">
          <input type="date" name="data" class="form-control" id="data" value={{ $user->datanasc }} />
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="foto">Foto</label>
          <div class="col-sm-10">
          <img src="/{{$user->fotothun}}" class="img-thumbnail" alt="{{$user->nome}}" id="foto"><img />
          <input type="file" class="form-control" name="foto" id="foto"  accept="image/*">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="categoria">Categoria</label>
          <div class="col-sm-10">
          <select name="id_categoria" id="categoria" class="form-control">
          @foreach($categorias as $categoria)
              <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
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
@endsection