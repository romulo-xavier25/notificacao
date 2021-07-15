<hr />

@if (Auth::check())
    <form id="formComentarios" name="formComentarios" action="{{ route('comentario.store') }}" method="POST" class="form">
        @csrf

        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <div class="form-group">
            <input type="text" name="titulo" placeholder="Título" class="form-control" />
        </div>

        <div class="form-group">
            <textarea name="mensagem" class="form-control" placeholder="Comentário" cols="30" rows="5"></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Comentar</button>
        </div>
    </form>
@endif

@if (!Auth::check())
    Precisa estar logado para fazer os comentários. <a href="{{ url('/login') }}">Clique aqui para entrar.</a>
@endif

<hr />

<h1 class="h3">Comentários ({{ $post->comentarios->count() }})</h1>

@if (count($post->comentarios) == 0)
    nenhum comentario foi feito.
@endif

@foreach ($post->comentarios as $comentarios)
    <p>
        <strong class="strong">
            {{ $comentarios->user->name }} comentou: 
        </strong>
        {{ $comentarios->titulo }} - {{ $comentarios->mensagem  }}
    </p>
@endforeach
