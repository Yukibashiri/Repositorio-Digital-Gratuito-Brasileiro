<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
    public function registrarInformacoes(
        Request $request
    )
    {
        $this->validate($request, [
//            'colecao_id'    => 'required',
              'titulo'        => 'required'
//            'sub_titulo'    => 'required',
//            'curso_id'      => 'required',
//            'disciplina_id' => 'required'
        ]);

        return response()
            ->json(['error' => false]);
    }
}
