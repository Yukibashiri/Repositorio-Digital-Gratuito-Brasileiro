<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\GlobalConfig;

class GlobalConfigController extends Controller
{
    public function index()
    {
        return response()->json(GlobalConfig::pluck('nome', 'id'));
    }

    public function maxKeyWords()
    {
        
        $res = GlobalConfig::where('nome','=','max_keywords')->select('valor')->first();
        $valor = $res['valor'];
        return $valor;
    }

    public function minKeyWords()
    {
        return response()->json(GlobalConfig::where('nome','=','min_keywords')->pluck('valor'));
    }
}
