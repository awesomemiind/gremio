<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Http\Requests\ChapaRequest;
use App\Chapa;
use App\Services\ChapaService;
use Illuminate\Http\Request;

class ChapaController extends Controller
{

    public function index()
    {
        return Response()->json(Chapa::all(), 200);
    }


    public function store(ChapaRequest $request)
    {
        $valitedData = $request->validated();
        $data = $request->all();
        if(! Chapa::where('nome', $data['nome'])->first()) {
            $chapa =  ChapaService::create($data);
            return Response()->json([
                'message' => 'Recurso criado',
                'resource' => $chapa
            ], 201);
        }

        return Response()->json([ 'message' => 'Recurso ja existente'], 400);
    }

    public function show($id)
    {
        if($chapa = Chapa::find($id)) {
            return Response()->json([
                'message' => 'Recurso encontrado',
                'resource' => $chapa
            ], 200);
        }

        return Response()->json(['message' => 'Recurso não encontrado'], 404);
    }


    public function update(Request $request, $id)
    {
        $data = $request->all();
        if($chapa = Chapa::find($id)) {
            $chapa = ChapaService::update($data, $chapa);
            return Response()->json([
                'message' => 'Recurso alterado',
                'resource' => $chapa
            ], 200);
        }

        return Response()->json(['message' => 'Recurso não encontrado'], 404);
    }

    public function destroy($id)
    {
        if($chapa = Chapa::find($id)) {
            ChapaService::delete($chapa);
            return Response()->json(['message' => 'Recurso excluido'], 200);
        }

        return Response()->json([ 'message' => 'Recurso não encontrado'], 404);
    }
}
