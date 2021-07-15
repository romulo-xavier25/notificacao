@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-12 mensagemAlert">
            @include('includes.alerts')
        </div><!-- fim da Div mensagemAlert -->

        <div class="col-md-12 blocoTituloPagina">
            <h1 class="h1">
                {{ $post->titulo }}
            </h1>
        </div><!-- fim da Div blocoTituloPagina -->

        <div class="col-md-12 blocoPostagemPost">
            <p>
                {{ $post->mensagem }}
            </p>
        </div><!-- fim da Div blocoPostagemPost -->

        <div class="col-md-12 blocoComentarios">
            @include('posts.comentarios.comentario')
        </div><!-- fim da Div blocoComentarios -->
    </div><!-- fim da Div container -->
    
@endsection
