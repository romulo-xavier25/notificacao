<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comentario;
use App\Http\Requests\StoreComentarioFormRequest;
use App\Notifications\PostComentado;

class ComentarioController extends Controller
{
    public function store(StoreComentarioFormRequest $request)
    {
        $comentario = $request->user()->comentarios()->create($request->all());
        $author = $comentario->post->user;
        $author->notify(new PostComentado($comentario));

        return redirect()
                        ->route('posts')
                        ->withSuccess('Comentário realizado com sucesso!');
    }
}
