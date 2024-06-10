<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

class Ferias extends Authenticatable
{
    use HasFactory;

    protected $table = 'ferias';

    protected $fillable = [
        'user_id',
        'titulo',
        'observacao',
        'data_inicio',
        'data_retorno',
        'local_ferias',
        'status',
        'user_autorizacao_id',
        'ferias_cor'
    ];

    public function usuario() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function usuarioAutoriza() {
        return $this->belongsTo(User::class, 'user_autorizacao_id');
    }
}
