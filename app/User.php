<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'nome', 'email', 'datanasc', 'foto', 'fotothun', 'id_fk_categoria'
    ];
    public $timestamps = false;
    
    public $rules = [
        'nome' => 'bail|required|min:3|max:100',
        'email' => 'bail|required|email|min:3|max:100|unique:users,email',
        'data' => 'bail|required',
        'foto' => 'bail|required|image',
        'id_categoria' => 'required'
        ];
    public $messages = [
        'nome.required'     => 'O campo nome deve ser preenchido', 
        'nome.min'          => 'O campo nome deve conter mais de 3 caracteres', 
        'nome.max'          => 'O campo nome deve ter no maximo 100 caracteres', 
        'email.required'    => 'O campo email deve ser preenchido', 
        'email.email'       => 'O campo email deve ser um email valido', 
        'email.min'         => 'O campo email deve ter mais de 3 caracteres', 
        'email.max'         => 'O campo email deve ter no maximo 100 caracteres', 
        'email.unique'      => 'Este email já foi utilizado', 
        'data.required'     => 'O campo data deve ser preenchido', 
        'foto.required'     => 'A foto deve ser inserida', 
        'foto.image'        => 'O arquivo deve ser uma imagem valida',
        'id_categoria.required' => 'A categoria deve ser inserida'
        ];

    /*public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }*/
}
