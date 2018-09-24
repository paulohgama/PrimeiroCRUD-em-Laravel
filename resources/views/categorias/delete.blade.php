@extends('layout')

@section('content')
<fieldset class="form-group">
<legend>Deseja deletar?</legend>
  <form method="POST" action="{{ route('categorias.destroy', $categoria->id) }}">
        @method('DELETE')
        @csrf
        <div class="form-group">
        <table>
          <tr>
            <th>Categoria: </th><td>{{ $categoria->categoria }}</td></tr>
        <tr>
        </table>
        <br>
        <div class="btn-group">
            <a  class="btn btn-success" href="{{route('categorias.index')}}"><span class="glyphicon glyphicon-arrow-left"></span> Cancelar</a>
            <button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-remove"></span> Deletar</button>
            </div>

    </form>
</fieldset>
@if (session('error'))
    <div class="alert alert-danger show" role="alert">
       {{session('error')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@endsection