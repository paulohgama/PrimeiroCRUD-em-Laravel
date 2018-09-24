<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Categoria;
use Intervention\Image\ImageManagerStatic as Image;
use App\Mail\dispararEmail;

class UserController extends Controller
{
    private $user;
    public function __construct(User $user) {
        $this->user = $user;
    }
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
        return view('users.delete', compact('user'));
    }

    public function store(Request $request, ImageRepository $repo)
    {  
        $this->validate($request, $this->user->rules, $this->user->messages);
        try
        {
            $dispara = new dispararEmail( $request->get('email'), $request->get('nome'), 'Seu cadastro');
            $dispara->build();
        }
        catch(Exception $ex)
        {
            return redirect('users')->with('dawn');
        }
        $userfoto = $repo->saveImage($request->foto);
        $userfotothum= $repo->saveImageThumbnail($request->file('foto'), 150);
        $users = new User([
            'nome' => $request->get('nome'),
            'email' => $request->get('email'),
            'datanasc' => $request->get('data'),
            'id_fk_categoria' => $request->get('id_categoria'),
            'foto' => $userfoto,
            'fotothun' => $userfotothum,            
        ]);
        try{
            $users->save();
        }
        catch(Exception $ex)
        {
           $ex->getMessage();
        }
        return redirect('users');
    }

    public function update(Request $request, $id, ImageRepository $repo)
    {
       
        $request->validate([
        'nome'=>'required',
        'email'=>'required'
      ]);

      $users = User::find($id);
      
      $users->nome = $request->get('nome');
      $users->email = $request->get('email');
      $dispara = new dispararEmail( $users->email, $users->nome, 'Sua atualização');
      $dispara->build();
      if ($request->foto != "") {
        $userfoto = $repo->saveImage($request->foto);
        $userfotothum= $repo->saveImageThumbnail($request->foto, 150);
        $repo->apagarImages($users->foto, $users->fotothun);
        $users->foto = $userfoto;
        $users->fotothun = $userfotothum;
      }
      $users->datanasc = $request->get('data');
      
      $users->id_fk_categoria = $request->get('id_categoria');
      $users->update();

      return redirect('users');
    }
    public function destroy($id, ImageRepository $repo)
    {
        $users = User::find($id);
        $repo->apagarImages($users->foto, $users->fotothun);
        $users->delete();
        return redirect('users');
    }
}
