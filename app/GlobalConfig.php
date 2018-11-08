<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
\Carbon\Carbon::setToStringFormat('d/m/Y H:i:s');

class GlobalConfig extends Model
{
    protected $table = "configuracao_sistema";
}
