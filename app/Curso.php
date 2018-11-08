<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
\Carbon\Carbon::setToStringFormat('d/m/Y H:i:s');

class Curso extends Model
{
    use SoftDeletes;
    protected $table = "curso";

    public function getCursosDisponiveis()
    {
        return Curso::select('id','nome')->where('status','=','1')->orderBy('nome')->get();

    }
}
