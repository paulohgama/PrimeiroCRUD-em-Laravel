<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;

class CategoriaController extends Controller
{
    private $categoria;
    
    public function __construct(Categoria $categoria) {
        $this->categoria = $categoria;
    }

    public function index()
    {
        $this->categoria = Categoria::all();
        $categorias = $this->categoria;
        //dd($categorias);
        return view('categorias.index', compact('categorias'));
    }
    public function create()
    {
        return view('categorias.create');
    }

    public function edit($id)
    {
        $this->categoria = Categoria::find($id);
        $categorias = $this->categoria;
        return view('categorias.edit', compact('categorias'));
    }

    public function delete($id)
    {
        $this->categoria = Categoria::find($id);
        $categoria = $this->categoria;
        return view('categorias.delete', compact('categoria'));
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->categoria->rules, $this->categoria->messages);
        $this->categoria->categoria = $request->get('nome');
        $this->categoria->save();
        return redirect('/categorias');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, $this->categoria->rules, $this->categoria->messages);
        $this->categoria->find($id);
        $this->categoria->categoria = $request->get('nome');
        try
        {
            $this->categoria->save();
        }
        catch(Exception $ex){

        }
        return redirect('/categorias');
    }
    public function destroy($id)
    {
        $this->categoria = Categoria::find($id);
        try
        {
            $this->categoria->delete();
        }
        catch(\Illuminate\Database\QueryException $ex)
        {
            return redirect('categorias/'.$id.'/delete')->with('error', 'Erro ao Excluir categoria');
        }

        return redirect('/categorias');
    }
}
