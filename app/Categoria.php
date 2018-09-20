<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    protected $fillable = ['categoria'];
    public $timestamps=false;

    /*public function users()
    {
        $this->hasMany(User::class);
    }*/
}
