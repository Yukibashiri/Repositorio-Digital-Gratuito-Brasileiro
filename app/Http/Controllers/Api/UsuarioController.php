<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Usuario;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function index()
    {
        return response()->json(
            DB::table('usuario')
            ->join('informacao_pessoal', 'usuario.informacao_pessoal_id', '=', 'informacao_pessoal.id')
            ->join('categoria', 'usuario.categoria_id', '=', 'categoria.id')
            ->whereNull('usuario.deleted_at')
            ->whereIn('usuario.categoria_id',array(1,2,3))
            ->select( 'usuario.id')
            ->selectRaw('CONCAT(informacao_pessoal.sobrenome, \', \', informacao_pessoal.nome) as nome')
            ->get());
    }
}
