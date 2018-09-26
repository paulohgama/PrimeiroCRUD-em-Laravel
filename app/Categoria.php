<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $primaryKey = 'id';   
    protected $table = 'categorias';
    protected $fillable = ['categoria'];
    public $timestamps=false;
    public $rules = [
        'nome' => 'bail|min:4|max:100|required|unique:categorias,categoria'
    ];
    public $messages = [
        'nome.min' => 'A Categoria precisa ter mais de 3 caracteres',
        'nome.max' => 'A Categoria precisa ter no maximo 100 caracteres',
        'nome.required' => 'A Categoria deve ser preenchida',
        'nome.unique' => 'A categoria deve ser unica'
        ];

    /*public function users()
    {
        $this->hasMany(User::class);
    }*/
}
