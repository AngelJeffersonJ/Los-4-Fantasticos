<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ComprasClienteController extends Controller
{
    public function index()
    {
        if (!Auth::check() || Auth::user()->email !== 'admin@example.com') {
            return redirect()->route('errors.access_denied');
        }

        $compras = DB::table('compras_cliente')
            ->join('productos', 'productos.id', '=', 'compras_cliente.producto_id')
            ->join('users', 'users.id', '=', 'compras_cliente.user_id')
            ->select('compras_cliente.*', 'productos.nombre as producto', 'users.name as cliente')
            ->orderBy('compras_cliente.created_at', 'desc')
            ->get();

        return view('compras_cliente.index', compact('compras'));
    }
}
