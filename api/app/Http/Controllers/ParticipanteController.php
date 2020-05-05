<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ParticipanteRequest;
use App\Participante;
use App\Services\ParticipanteService;
use Illuminate\Support\Str;

class ParticipanteController extends Controller
{

    public function index()
    {
        return Response()->json(Participante::all(),200);
    }

    public function store(ParticipanteRequest $request)
    {
        $validatedData = $request->validated();
        $data = $request->all();
        if(! $participante = Participante::where('nome', $data['nome'])->first()) {
            $participante = ParticipanteService::create($data);

            return Response()->json([
                'message' => 'Recurso criado',
                'resource' => $participante
            ], 201);
        }

        return Response()->json([
            'message' => 'Recurso ja existente',
        ], 400);
    }

    public function show($id)
    {
        if($participante = Participante::find($id)) {
            return Response()->json([
                'message' => 'Recurso encontrado',
                'resource' => $participante
            ], 200);
        }

        return Response()->json([
            'message' => 'Recurso não encontrado'
        ], 404);
    }

    public function update(ParticipanteRequest $request, $id)
    {
        $validatedData = $request->validated();
        $data = $request->all();
        if($participante = Participante::find($id)) {
            $participante = ParticipanteService::update($data, $participante);

            return Response()->json([
                'message' => 'Recurso alterado',
                'resource' => $participante
            ], 200);
        }

        return Response()->json([
            'message' => 'Recurso não encontrado'
        ], 404);
    }

    public function destroy($id)
    {
        if($participante = Participante::find($id)) {
            ParticipanteService::delete($participante);

            return Response()->json([
                'message' => 'Recurso excluido'
            ], 200);
        }

        return Response()->json([
            'message' => 'Recurso não encontrado'
        ], 404);
    }
}
