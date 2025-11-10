<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    protected $table = 'veiculos';
    protected $fillable = ['modelo_id', 'cor_id', 'ano', 'quilometragem','valor', 'detalhes', 'imagem1', 'imagem2', 'imagem3'];
    // Veiculo pertence a um Modelo
    public function modelo()
    {
        return $this->belongsTo(Modelo::class);
    }
    // Veiculo pertence a uma Cor
    public function cor()
    {
        return $this->belongsTo(Cor::class);
    }
}
