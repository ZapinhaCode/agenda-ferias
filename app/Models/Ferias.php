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
    ];

    public function usuario() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function usuarioAutoriza() {
        return $this->belongsTo(User::class, 'user_autorizacao_id');
    }

    public function getDataInicioAttribute($value) {
        if (strlen($value) > 0) {
            return (new Carbon($this->attributes['data_inicio']))->format('d/m/Y');
        } else {
            return null;
        }
    }

    public function getDataRetornoAttribute($value) {
        if (strlen($value) > 0) {
            return (new Carbon($this->attributes['data_retorno']))->format('d/m/Y');
        } else {
            return null;
        }
    }
}
