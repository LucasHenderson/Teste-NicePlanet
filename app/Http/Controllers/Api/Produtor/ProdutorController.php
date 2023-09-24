<?php

namespace App\Http\Controllers\Api\Produtor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ProdutorRequest;
use App\Models\Produtor;
use Exception;
use Illuminate\Support\Facades\DB;

class ProdutorController extends Controller
{
    public readonly Produtor $produtor;

    public function __construct(){
        $this->produtor = new Produtor();
    }

    public function index() {
        return response()->json($this->produtor->all());
    }

    public function show(string $id) {
        $produtor = DB::select('SELECT * FROM produtor WHERE idProdutor = ?', [$id]);
        if (!$produtor){
            return response()->json([
                'message' => "Esse produtor não está cadastrado!"
            ], 403);
        } else {
            return response()->json($produtor);
        }
    }

    public function store(ProdutorRequest $request) {
        $dto = $request->only([
            'nomeProdutor',
            'cpfProdutor'
        ]);

        try {
            DB::insert('INSERT INTO `produtor` (`nomeProdutor`, `cpfProdutor`) VALUES (?, ?)', [$dto['nomeProdutor'], $dto['cpfProdutor']]);
            return response()->json([
                'message' => "Produtor cadastrado com sucesso!"
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }
}
