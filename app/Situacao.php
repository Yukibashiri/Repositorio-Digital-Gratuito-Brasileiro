<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
\Carbon\Carbon::setToStringFormat('d/m/Y H:i:s');

class Situacao extends Model
{
    use SoftDeletes;
    protected $table = "situacao";

    public function nextPosition()
    {
        $lastPosition = Situacao::withTrashed()->orderBy('posicao','desc')->select('posicao')->first();
        return $lastPosition->posicao + 1;
    }
}
