@extends('layout')

@section('content')
<fieldset class="form-group">
<legend>Deseja deletar?</legend>
  <form method="POST" action="{{ route('users.destroy', $user->id) }}">
        @method('DELETE')
        @csrf
        <div class="form-group">
        <table>
            <tr>
                <th>Nome: </th>
                <td>{{ $user->nome }}<td><tr>
            <tr>
                <th>Email: </th>
                <td>{{ $user->email }}<td><tr>
        <tr>
            <th>Data de Nascimento: </th>
            <td><input type="date" value="{{ $user->datanasc }}" disabled></td></tr>
        <tr>
            <th>Foto: </th>
            <td><img src="{{$user->fotothun}}" class="img-thumbnail" alt="{{$user->nome}}"><img /></td></tr>
        </table>
        </div>
        <br>
        <div class="btn-group"> 
        <button class="btn btn-danger" type="submit"></span>Deletar</button>
        <a  class="btn btn-success" href="{{route('users.index')}}" role="button">Cancelar</a>
    </div>
    </form>
</fieldset>
@endsection