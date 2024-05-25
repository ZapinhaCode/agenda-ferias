<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Ferias extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'user_id',
        'titulo',
        'observacao',
        'data_inicio',
        'data_retorno',
        'local_ferias',
        'status',
        'user_autorizacao_id',
    ];

}
