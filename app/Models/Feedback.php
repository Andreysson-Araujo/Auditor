<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'formulario_id',
        'user_id',
        'mensagem'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function formulario()
    {
        return $this->belongsTo(Formulario::class);
    }
}
