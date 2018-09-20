<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'nome', 'email', 'datanasc', 'foto', 'fotothun', 'id_fk_categoria'
    ];
    public $timestamps = false;

    /*public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }*/
}
