<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    protected $table = 'modelos';
    protected $fillable = ['nome', 'marca_id'];
    // Um Modelo pertence a uma Marca
    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }
    // Um Modelo possui muitos Veiculos
    public function veiculos()
    {
        return $this->hasMany(Veiculo::class);
    }
}
