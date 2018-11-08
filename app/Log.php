<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
\Carbon\Carbon::setToStringFormat('d/m/Y H:i:s');

class Log extends Model
{
    protected $table = "logs_de_acao";
}
