<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produtor extends Model
{
    protected $table = 'produtor'; // Nome da tabela no banco de dados

    protected $fillable = [
        'idProdutor', 'nomeProdutor', 'cpfProdutor'
    ];
}
