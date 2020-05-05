<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Participante;
use App\Http\Requests\ParticipanteRequest;

class ParticipanteController extends Controller
{

    public function index()
    {
        //
    }

    public function store(ParticipanteRequest $request)
    {
        $validatedData = $request->validated();
        return $validatedData;
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
