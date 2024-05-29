<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setores extends Model
{
    use HasFactory;

    protected $table = 'setores';

    protected $fillable = [
        'nome',
        'gerente_user_id',
    ];

    public function gerente() {
        return $this->belongsTo(Usuario::class, 'gerente_user_id');
    }
}
