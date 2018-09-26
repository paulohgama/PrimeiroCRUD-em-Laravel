@extends('layout')

@section('content')
<br>
<div class="table-responsive">
<table class="table table-bordered">
    <tr align="center">
        <th>ID</th>
        <th>Categoria</th>
        <th colspan="2">Action</th>
    </tr>
    @foreach($categorias as $categoria)
        <tr>
            <td>{{$categoria->id}}</td>
            <td>{{$categoria->categoria}}</td>
            <td><a class="btn btn-info" href="{{ route('categorias.edit',$categoria->id)}}" role="button"><span class="glyphicon glyphicon-edit"> Editar</a></td>
            <td><a class="btn btn-warning" href="{{ route('categorias.delete',$categoria->id)}}" role="button"><span class="glyphicon glyphicon-trash"> Deletar</a></td>
        </tr>
        @endforeach
  </table>
  </div>
  @include('inc.feedback')
@endsection