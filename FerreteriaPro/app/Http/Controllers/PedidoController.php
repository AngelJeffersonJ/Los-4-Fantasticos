<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    public function index()
    {
        $usuario = Auth::user();

        $pedidos = DB::table('compras_cliente')
            ->where('user_id', $usuario->id)
            ->orderBy('created_at', 'desc')
            ->get();

        if ($usuario->email === 'admin@example.com') {
            return view('pedidos.admin', compact('pedidos'));
        } else {
            return view('pedidos.index', compact('pedidos'));
        }
    }
}
