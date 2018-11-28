<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Disciplina;

class DisciplinaController extends Controller
{
        public function index()
    {
        return response()->json(Disciplina::pluck('nome', 'id'));
    }
}
