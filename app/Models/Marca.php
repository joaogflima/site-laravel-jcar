<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table = 'marcas';
    protected $fillable = ['nome'];
     // Uma Marca possui muitos Modelos
    public function modelos()
    {
        return $this->hasMany(Modelo::class);
    }
}
