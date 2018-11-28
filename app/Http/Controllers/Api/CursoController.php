<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Curso;

class CursoController extends Controller
{
    public function index()
    {
        return response()->json(Curso::pluck('nome', 'id'));
    }
}
