<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Colecao;

class ColecaoController extends Controller
{
    public function index()
    {
        return response()->json(Colecao::pluck('nome', 'id'));
    }
}
