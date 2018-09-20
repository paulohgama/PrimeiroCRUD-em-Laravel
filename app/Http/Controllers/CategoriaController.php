<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();

        return view('categorias.index', compact('categorias'));
    }
    public function create()
    {
        return view('categorias.create');
    }

    public function edit($id)
    {
        $categoria = Categoria::find($id);

        return view('categorias.edit', compact('categoria'));
    }

    public function delete($id)
    {
        $categoria = Categoria::find($id);

        return view('categorias.delete', compact('categoria'));
    }

    public function store(Request $request)
    {
        $request->validate(['nome'=>'required']);
        $categoria = new Categoria(['categoria' => $request->get('nome'),]);
        $categoria->save();
        return redirect('/categorias');
    }

    public function update(Request $request, $id)
    {
      $request->validate([
        'nome'=>'required',
      ]);

      $categoria = Categoria::find($id);
      $categoria->categoria = $request->get('nome');
      $categoria->save();

      return redirect('/categorias');
    }
    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        $categoria->delete();

        return redirect('/categorias');
    }
}
