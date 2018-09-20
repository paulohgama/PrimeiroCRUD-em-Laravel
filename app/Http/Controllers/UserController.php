<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Categoria;
use Intervention\Image\ImageManagerStatic as Image;

class UserController extends Controller
{
    public function index()
    {
        $users = User::select('users.id', 'nome', 'email', 'foto', 'fotothun', 'datanasc', 'categoria')->join('categorias', 'categorias.id', '=', 'id_fk_categoria')->get();
        return view('users.index', compact('users'));
    }
    public function create()
    {
        $categorias = Categoria::all();
        return view('users.create', compact('categorias'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $categorias = Categoria::all();
        return view('users.edit', compact('user','categorias'));
    }

    public function delete($id)
    {
        $user = User::select('users.id', 'nome', 'email', 'foto', 'fotothun', 'datanasc', 'categoria')->join('categorias', 'categorias.id', '=', 'id_fk_categoria')->find($id);
        $categorias = Categoria::all();
        return view('users.delete', compact('user'));
    }

    public function store(Request $request, ImageRepository $repo, User $users)
    {    
        if ($request->hasFile('foto')) {
           $userfoto = $repo->saveImage($request->foto);
        }

        if ($request->hasFile('foto')) {
            $userfotothum= $repo->saveImageThumbnail($request->foto, 150);
         }
        $users->nome = $request->get('nome');
        $users->email = $request->get('email');
        $users->datanasc = $request->get('data'); 
        $users->foto = $userfoto;
        $users->fotothun = $userfotothum;
        $users->id_fk_categoria = $request->get('id_categoria');

        try{
            $users->save();
        }
        catch(Exception $ex)
        {
            $ex->getMessage();
        }
        return redirect('users');
    }

    public function update(Request $request, $id)
    {
      $request->validate([
        'nome'=>'required',
        'email'=>'required'
      ]);

      $users = User::find($id);
      $users->nome = $request->get('nome');
      $users->email = $request->get('email');
      //$users->foto = $request->get('foto');
      $users->datanasc = $request->get('data');
      
      $users->id_fk_categoria = $request->get('id_categoria');
      $users->save();

      return redirect('/');
    }
    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect('/');
    }
}
