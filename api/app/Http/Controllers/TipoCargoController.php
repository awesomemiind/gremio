<?php

namespace App\Http\Controllers;

use App\Http\Requests\TipoCargoRequest;
use App\tipoCargo;
use Illuminate\Http\Request;
use App\Services\TipoCargoService;
use Illuminate\Support\Facades\Validator;

class TipoCargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response()->json(TipoCargo::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoCargoRequest $request)
    {
        $validatedData = $request->validated();

        $tipo = $request->input('tipo');

        if(! TipoCargo::where('tipo', $tipo)->first()) {
            $tipoCargo = TipoCargoService::create($request->all());

            return Response()->json([
                'message' => 'Recurso criado',
                'resource' => $tipoCargo
            ],201);
        }

        return Response()->json([ 'message' => 'Recurso ja existente'], 400);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cargo = TipoCargo::find($id);
        if($cargo) {
            return Response()->json([
                'message' => 'Recurso encontrado',
                'resource' => $cargo
            ], 200);
        }

        return Response()->json(['message' => 'Recurso não encontrado'], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TipoCargoRequest $request, $id)
    {
        $validatedData = $request->validated();

        if($cargo = TipoCargo::find($id)) {
            $cargo = TipoCargoService::update($request->all(), $cargo);
            return Response()->json([
                'message' => 'Recurso alterado',
                'resource' => $cargo
            ], 200);
        }

        return Response()->json(['message' => 'Recurso não encontrado'], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($cargo = TipoCargo::find($id)) {
            TipoCargoService::delete($cargo);
            return Response()->json(['message' => 'Recurso excluido'], 200);
        }

        return Response()->json([ 'message' => 'Recurso não encontrado'], 404);
    }
}
