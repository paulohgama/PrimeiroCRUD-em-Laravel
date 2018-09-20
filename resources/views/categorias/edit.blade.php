@extends('layout')

@section('content')
<fieldset class="form-group">
<legend>Cadastrar categoria</legend>
<form class="form-horizontal" method="POST" action="{{ route('categorias.update', $categoria->id) }}">
    @csrf
    <div class="form-group">
        <label class="control-label col-sm-2" for="email">Categoria</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="nome" placeholder="Categoria" value={{ $categoria->categoria }}>
        </div>
    </div>
    <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-refresh"></span> Atualizar</button>
    </div>
  </div>
</form>
</fieldset>
@endsection