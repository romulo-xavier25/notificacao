<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comentario;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'titulo', 'mensagem'];

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
