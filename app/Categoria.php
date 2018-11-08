<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
\Carbon\Carbon::setToStringFormat('d/m/Y H:i:s');

class Categoria extends Model
{
    use SoftDeletes;
    protected $table = "categoria";

    public function nextPosition()
    {
        $lastPosition = Categoria::withTrashed()->orderBy('posicao','desc')->select('posicao')->first();
        return $lastPosition->posicao + 1;
    }
}
