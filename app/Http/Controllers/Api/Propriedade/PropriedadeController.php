<?php

namespace App\Http\Controllers\Api\Propriedade;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PropriedadeRequest;
use App\Models\Propriedade;
use Exception;
use Illuminate\Support\Facades\DB;


class PropriedadeController extends Controller
{
    public readonly Propriedade $propriedade;

    public function __construct(){
        $this->propriedade = new Propriedade();
    }

    public function index() {
        return response()->json($this->propriedade->all());
    }

    public function show(string $id) {
        $propriedade = DB::select('SELECT * FROM propriedade WHERE idPropriedade = ?', [$id]);
        if (!$propriedade){
            return response()->json([
                'message' => "Essa propriedade não está cadastrada!"
            ], 403);
        } else {
            return response()->json($propriedade);
        }
    }

    public function store(PropriedadeRequest $request) {
        $dto = $request->only([
            'nomePropriedade',
            'localizacao',
            'tamanho',
            'uso'
        ]);

        try {
            DB::insert('INSERT INTO `propriedade` (`nomePropriedade`, `localizacao`, `tamanho`, `uso`) VALUES (?, ?, ?, ?)', [$dto['nomePropriedade'], $dto['localizacao'], $dto['tamanho'], $dto['uso']]);

            return response()->json([
                'message' => "Propriedade cadastrada com sucesso!"
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' =>  $e->getMessage()
            ], 400);
        }
    }
}
