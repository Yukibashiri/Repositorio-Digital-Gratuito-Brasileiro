<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
\Carbon\Carbon::setToStringFormat('d/m/Y H:i:s');

class Colecao extends Model
{
    use SoftDeletes;
    protected $table = "colecao";

    public function nextPosition()
    {
        $lastPosition = Colecao::withTrashed()->orderBy('posicao','desc')->select('posicao')->first();
        return $lastPosition->posicao + 1;
    }
}
