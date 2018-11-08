<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
\Carbon\Carbon::setToStringFormat('d/m/Y H:i:s');

class ArquivoExtensao extends Model
{
    use SoftDeletes;
    protected $table = "arquivo_extensao";
}
