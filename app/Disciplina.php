<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
\Carbon\Carbon::setToStringFormat('d/m/Y H:i:s');

class Disciplina extends Model
{
    use SoftDeletes;
    protected $table = "disciplina";
}
