<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
\Carbon\Carbon::setToStringFormat('d/m/Y H:i:s');

class ItemFile extends Model
{
    protected $table = "item_tem_arquivos";
}
