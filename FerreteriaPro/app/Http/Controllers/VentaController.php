<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\Cliente;
use Illuminate\Support\Facades\Auth;

class VentaController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            $ventas = Venta::all();
            return view('ventas.index', compact('ventas'));
        }
        return redirect()->route('errors.access_denied');
    }

    public function create()
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            $clientes = Cliente::all();
            return view('ventas.create', compact('clientes'));
        }
        return redirect()->route('errors.access_denied');
    }

    public function store(Request $request)
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            $request->validate([
                'fecha' => 'required|date',
                'id_cliente' => 'required|exists:clientes,id'
            ]);

            Venta::create($request->all());

            return redirect()->route('ventas.index')->with('success', 'Venta creada exitosamente.');
        }
        return redirect()->route('errors.access_denied');
    }

    public function show(Venta $venta)
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            return view('ventas.show', compact('venta'));
        }
        return redirect()->route('errors.access_denied');
    }

    public function edit(Venta $venta)
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            $clientes = Cliente::all();
            return view('ventas.edit', compact('venta', 'clientes'));
        }
        return redirect()->route('errors.access_denied');
    }

    public function update(Request $request, Venta $venta)
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            $request->validate([
                'fecha' => 'required|date',
                'id_cliente' => 'required|exists:clientes,id'
            ]);

            $venta->update($request->all());

            return redirect()->route('ventas.index')->with('success', 'Venta actualizada exitosamente.');
        }
        return redirect()->route('errors.access_denied');
    }

    public function destroy(Venta $venta)
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            $venta->delete();
            return redirect()->route('ventas.index')->with('success', 'Venta eliminada exitosamente.');
        }
        return redirect()->route('errors.access_denied');
    }
}
