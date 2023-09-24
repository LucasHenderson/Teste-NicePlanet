<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Propriedade extends Model
{
    protected $table = 'propriedade'; // Nome da tabela no banco de dados

    protected $fillable = [
        'idPropriedade', 'nomePropriedade', 'localizacao', 'tamanho', 'uso'
    ];
}
