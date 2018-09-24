@extends('layout')

@section('content')
<fieldset class="form-group">
<legend>Inserir novo usuario</legend>
<form class="form-horizontal" method="POST" action="{{ route('users.store') }}"  enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label class="control-label col-sm-2" for="nome">Nome</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" value="{{old('nome')}}"></div></div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="email">Email</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="email" id="email" placeholder="E-mail"  value="{{old('email')}}"></div></div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="foto">Foto</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" name="foto" id="foto"></div></div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="data">Data de Nascimento</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" name="data" id="data" value="{{old('data')}}"></div></div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="categoria">Categoria</label>
        <div class="col-sm-10">
            <select class="form-control" name="id_categoria" id="categoria">
    @foreach($categorias as $categoria)
        <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
    @endforeach
    </select></div></div>
    <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    <button name="envia"  class="btn btn-info" type="submit"><span class="glyphicon glyphicon-floppy-disk"> Cadastrar</button></div></div>
</form>
@include('inc.errors')
@endsection