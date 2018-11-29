<?php

namespace App\Http\Controllers\Api;

use App\InformacaoPessoal;
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
            ->where(function($q) {
                if (request()->filled('q'))
                    $q->where('informacao_pessoal.nome', 'like', '%'.request('q').'%');
            })
            ->select( 'usuario.id')
            ->selectRaw('CONCAT(informacao_pessoal.sobrenome, \', \', informacao_pessoal.nome) as nome')
            ->get());
    }

    public function queryUsers(
        Request $request
    )
    {
        $users = InformacaoPessoal::where(function($q) use ($request) {
            if ($request->filled('q'))
                $q->where('nome', 'like', '%'.$request->get('q').'%')->orWhere('sobrenome', 'like', '%'.$request->get('q').'%');
        })->selectRaw('CONCAT(nome,\' \',sobrenome) as nome, id')->get();

        return response()
            ->json($users);
    }
}
