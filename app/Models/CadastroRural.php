<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CadastroRural extends Model
{
    protected $table = 'cadastrorural'; // Nome da tabela no banco de dados

    protected $fillable = [
        'id', 'idProdutor', 'idPropriedade'
    ];
}
