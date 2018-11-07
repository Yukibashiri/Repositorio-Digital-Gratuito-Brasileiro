<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Papel extends Model
{
    use SoftDeletes;
    protected $table = "papel";

    public function nextPosition()
    {
        $lastPosition = Papel::withTrashed()->orderBy('posicao','desc')->select('posicao')->first();
        return $lastPosition->posicao + 1;
    }
}
