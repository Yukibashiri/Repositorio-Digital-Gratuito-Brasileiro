<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
\Carbon\Carbon::setToStringFormat('d/m/Y H:i:s');

class ItemTags extends Model
{
    protected $table = "item_tem_palavras_chave";
    public $timestamps = false;
}
