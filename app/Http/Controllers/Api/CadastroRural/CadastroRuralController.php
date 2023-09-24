<?php

namespace App\Http\Controllers\Api\CadastroRural;

use App\Http\Controllers\Controller;
use App\Models\CadastroRural;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CadastroRuralController extends Controller
{
    public readonly CadastroRural $cadastrorural;

    public function __construct(){
        $this->cadastrorural = new CadastroRural();
    }

    public function index() {
        return response()->json($this->cadastrorural->all());
    }

    public function showProdutor(string $id) {
        $cadastrorural = DB::select('SELECT * FROM cadastrorural WHERE idProdutor = ?', [$id]);
        if (!$cadastrorural){
            return response()->json([
                'message' => "Esse produtor não possui cadastro rural!"
            ], 400);
        } else {
            return response()->json($cadastrorural);
        }
    }

    public function showPropriedade(string $id) {
        $cadastrorural = DB::select('SELECT * FROM cadastrorural WHERE idPropriedade = ?', [$id]);
        if (!$cadastrorural){
            return response()->json([
                'message' => "Essa propriedade não possui cadastro rural!"
            ], 400);
        } else {
            return response()->json($cadastrorural);
        }
    }

    public function store(Request $request) {
        $dto = $request->only([
            'idProdutor',
            'idPropriedade'
        ]);

        $produtor = DB::select('SELECT * FROM produtor WHERE idProdutor = ?', [$dto['idProdutor']]);
        $propriedade = DB::select('SELECT * FROM propriedade WHERE idPropriedade = ?', [$dto['idPropriedade']]);
        $jaExiste = DB::select('SELECT * FROM cadastrorural WHERE idProdutor = ? AND idPropriedade = ?', [$dto['idProdutor'], $dto['idPropriedade']]);

        if ($jaExiste){
            return response()->json([
                'message' => "Esse Cadastro Rural já existe!"
            ], 400);
        }

        if (!$produtor || !$propriedade){
            return response()->json([
                'message' => "O produtor ou propriedade informados não estão cadastrados!"
            ], 400);
        } else {
            try {
                DB::insert('INSERT INTO `cadastrorural` (`idProdutor`, `idPropriedade`) VALUES (?, ?)', [$dto['idProdutor'], $dto['idPropriedade']]);
                return response()->json([
                    'message' => "Cadastro Rural realizado com sucesso!"
                ], 200);
            } catch (Exception $e) {
                return response()->json([
                    'message' => $e->getMessage()
                ], 400);
            }
        }
    }
}
