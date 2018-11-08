<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
\Carbon\Carbon::setToStringFormat('d/m/Y H:i:s');

class InformacaoPessoal extends Model
{
    protected $table = "informacao_pessoal";
}
