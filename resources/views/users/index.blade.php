@extends('layout')

@section('content')
<div class="table-responsive">
<table class="table table-bordered">
    <tr align="center">
        <td>ID</td>
        <td>Nome</td>
        <td>E-mail</td>
        <td>Data de Nascimento</td>
        <td>Foto</td>
        <td>Categoria</td>
        <td colspan="2">Ação</td>
    </tr>
    @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->nome}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->datanasc}}</td>
            <td><img src="{{$user->fotothun}}" class="img-thumbnail" alt="{{$user->nome}}"><img /></td>
            <td>{{$user->categoria}}</td>
            <td><a class="btn btn-info" href="{{ route('users.edit',$user->id)}}" role="button"><span class="glyphicon glyphicon-edit"> Editar</a></td>
            <td><a class="btn btn-warning" href="{{ route('users.delete',$user->id)}}" role="button"><span class="glyphicon glyphicon-trash"> Deletar</a></td>
        </tr>
        @endforeach
  </table>
  </div>
@endsection