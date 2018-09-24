@extends('layout')

@section('content')
<fieldset class="form-group">
<legend>Cadastrar categoria</legend>
<form class="form-horizontal" method="POST" action="{{ route('categorias.store') }}">
    @csrf
    <div class="form-group">
        <label class="control-label col-sm-1" for="nome">Nome</label>
        <div class="col-sm-10">
            <input type="text" name="nome" class="form-control" id="nome" placeholder="Categoria" value="{{old('nome')}}">
        </div>
    </div>
    <div class="form-group"> 
    <div class="col-sm-offset-1 col-sm-10">
      <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-floppy-disk"> Cadastrar</span></button>
    </div>
  </div>
</form>
</fieldset>
@include('inc.errors')
@endsection