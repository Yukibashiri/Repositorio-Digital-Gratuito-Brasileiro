<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Papel;
class PapelController extends Controller
{
    public function index()
    {
        return response()->json(Papel::pluck('nome', 'id'));
    }
}
