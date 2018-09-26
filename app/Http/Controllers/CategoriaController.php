<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use Illuminate\Database\QueryException;

class CategoriaController extends Controller
{
    private $categoria;
    
    public function __construct(Categoria $categoria) {
        $this->categoria = $categoria;
    }

    public function index()
    {
        $this->categoria = Categoria::orderBy('id', 'desc')->get();
        $categorias = $this->categoria;
        return view('categorias.index', compact('categorias'));
    }
    public function create()
    {
        return view('categorias.create');
    }

    public function edit($id)
    {
        $this->categoria = Categoria::find($id);
        $categoria = $this->categoria;
        return view('categorias.edit', compact('categoria'));
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
        try
        {
            $this->categoria->save();
            return redirect('/categorias')->with('success', 'Categoria cadastrada com sucesso');
        } catch(QueryException $ex)
        {
            return redirect('/categorias')->with('failure', 'Erro ao cadastrar categoria');
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, $this->categoria->rules, $this->categoria->messages);
        $this->categoria = Categoria::find($id);
        $this->categoria->categoria = $request->get('nome');
        try
        {
            $this->categoria->update();
             return redirect('/categorias')->with('success', 'Categoria alterada com sucesso');
        } catch(QueryException $ex)
        {
            return redirect('/categorias')->with('failure', 'Erro ao alterar categoria');
        }
    }
    public function destroy($id)
    {
        $this->categoria = Categoria::find($id);
        try
        {
            $this->categoria->delete();
             return redirect('/categorias')->with('success', 'Categoria deletada com sucesso');
        } 
        catch(QueryException $ex)
        {
            return redirect('/categorias')->with('failure', 'Erro ao deletar categoria');
        }
    }
}
