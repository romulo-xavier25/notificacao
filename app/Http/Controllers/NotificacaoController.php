<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificacaoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function notificacoes(Request $request)
    {
        $notificacoes = $request->user()->unreadNotifications;

        return response()->json(compact('notificacoes'));
    }

    public function marcarComoLido(Request $request)
    {
        $notificacao = $request->user()
                                    ->notifications()
                                    ->where('id', $request->id)
                                    ->first();
        if ($notificacao)
            $notificacao->markAsRead();
    }

    public function marcarTodasComoLidas(Request $request)
    {
        $request->user()->unreadNotifications->markAsRead();
    }

}
