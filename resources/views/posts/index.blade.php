@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-12 mensagemAlert">
            @include('includes.alerts')
        </div><!-- fim da Div mensagemAlert -->
        
        <div class="col-md-12 blocoTituloPagina">
            <h1 class="h1">
                Listagem dos posts:
            </h1>
        </div><!-- fim da Div blocoTituloPagina -->

        <div class="col-md-12 blocoPostagemPost">
            @foreach($posts as $post)

                <h1 class="h4">
                    <a href="{{ route('posts.show', $post->id) }}">
                        {{ $post->titulo }} ({{ $post->comentarios->count() }})
                    </a>
                </h1>

                <hr />
                
            @endforeach

            <div class="col-md-12">
                {!! $posts->links() !!}
            </div>

        </div><!-- fim da Div blocoPostagemPost -->
    </div><!-- fim da Div container -->



@endsection
