<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\User;

class Setores extends Model
{
    use HasFactory;

    protected $table = 'setores';

    protected $fillable = [
        'nome',
        'gerente_user_id',
    ];

    public function gerente() {
        return $this->belongsTo(User::class, 'gerente_user_id');
    }

    public function getCreatedAtAttribute($value)
    {
        if (strlen($value) > 0) {
            return (new Carbon($this->attributes['created_at']))->format('d/m/Y');
        } else {
            return null;
        }
    }
}
