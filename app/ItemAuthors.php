<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
\Carbon\Carbon::setToStringFormat('d/m/Y H:i:s');

class ItemAuthors extends Model
{
    protected $table = "item_tem_autores";
}
