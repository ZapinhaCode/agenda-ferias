<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuario';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'email',
        'password',
        'cpf',
        'rg',
        'sexo',
        'data_nascimento',
        'cargo_id',
        'telefone',
        'endereco',
        'numero',
        'complemento',
        'bairro',
        'estado_id',
        'cidade_id',
        'setor_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function cargo() {
        return $this->belongsTo(Cargo::class);
    }

    public function estado() {
        return $this->belongsTo(Estado::class);
    }

    public function cidade() {
        return $this->belongsTo(Cidade::class);
    }

    public function setor() {
        return $this->belongsTo(Setor::class);
    }
}
