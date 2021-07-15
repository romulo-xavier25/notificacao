<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function index()
    {
        $posts = $this->post->with('comentarios')->paginate();

        return view('posts.index', compact('posts'));
    }

    public function show($id)
    {
        // with é usado para trazer o relacionamento dos comentarios com usuario
        $post = $this->post->with(['comentarios.user', 'user'])->find($id);
        
        return view('posts.show', compact('post'));
    }
}
