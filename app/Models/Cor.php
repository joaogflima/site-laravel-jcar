<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cor extends Model
{
    protected $table = 'cores';
    protected $fillable = ['nome'];
    // Uma Cor pode estar em muitos Veiculos
    public function veiculos()
    {
        return $this->hasMany(Veiculo::class);
    }
}
