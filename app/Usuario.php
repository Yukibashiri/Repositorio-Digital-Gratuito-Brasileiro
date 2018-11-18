<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
\Carbon\Carbon::setToStringFormat('d/m/Y H:i:s');

class Usuario extends Model
{
        use SoftDeletes;
        protected $table = "usuario";
        protected $fillable = [
        'login', 'email', 'esta_ativo','categoria_id','informacao_pessoal_id','codinome', 'created_at','updated_at', 'email_verified_at'
    ];
}
