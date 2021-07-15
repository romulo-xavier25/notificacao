<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Auth;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = ['post_id', 'user_id', 'titulo', 'mensagem'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cadastrarComentario(Request $request)
    {
        $comentario = new Comentario();
        try{
            $comentario->user_id = Auth::user()->id;
            $comentario->post_id = $request->post_id;
            $comentario->titulo = $request->titulo;
            $comentario->mensagem = $request->mensagemComentario;
            $comentario->save();            

            return [
                'success' => true,
                'message' => 'Comentário realizado com sucesso!'
            ];
        } catch(\Exception $exception) {
            return [
                'success' => false,
                // 'message' => 'Erro na tentativa de realizar o comentário.',
                'message' => $exception->getMessage(),
            ];
        }
    }
}
