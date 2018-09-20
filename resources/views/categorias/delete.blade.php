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
        <div>
        <div class="btn-group"><button class="btn btn-danger" type="submit"></span>Deletar</button>
        <a  class="btn btn-success" href="{{route('categorias.index')}}">Cancelar</a></div>

    </form>
</fieldset>
@endsection