<?php

namespace App\Http\Controllers\Api\CadastroRural;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CadastroRuralRequest;
use App\Models\CadastroRural;
use Exception;
use Illuminate\Support\Facades\DB;

class CadastroRuralController extends Controller
{
    //faz com que a var $cadastrorural possa ser usada em qualquer parte dessa class
    //sem precisa ser instanciada novamente
    public readonly CadastroRural $cadastrorural;

    public function __construct(){
        $this->cadastrorural = new CadastroRural();
    }

    //lista todos os cadastros rurais
    public function index() {
        return response()->json($this->cadastrorural->all());
    }

    //apresenta os dados de apenas 1 produtor baseado no id
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

    //apresenta os dados de apenas 1 propriedade baseado no id
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

    //faz o registro no bd de um novo cadastro rural
    public function store(CadastroRuralRequest $request) {
        $dto = $request->only([
            'idProdutor',
            'idPropriedade'
        ]);

        $produtor = DB::select('SELECT * FROM produtor WHERE idProdutor = ?', [$dto['idProdutor']]);
        $propriedade = DB::select('SELECT * FROM propriedade WHERE idPropriedade = ?', [$dto['idPropriedade']]);
        $jaExiste = DB::select('SELECT * FROM cadastrorural WHERE idProdutor = ? AND idPropriedade = ?', [$dto['idProdutor'], $dto['idPropriedade']]);

        //talvez separa essas validacoes em um outro arquivo seja interessante
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
