<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
\Carbon\Carbon::setToStringFormat('d/m/Y H:i:s');

class Usuario extends Model
{
        protected $fillable = [
        'login', 'email', 'esta_ativo','categoria_id','informacao_pessoal_id','codinome', 'created_at','updated_at', 'email_verified'
    ];
}
