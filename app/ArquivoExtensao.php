<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArquivoExtensao extends Model
{
    use SoftDeletes;
    protected $table = "arquivo_extensao";
}
