<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VentaDetalle;
use App\Models\Venta;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

class VentaDetalleController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            $ventaDetalles = VentaDetalle::all();
            return view('venta_detalles.index', compact('ventaDetalles'));
        }
        return redirect()->route('errors.access_denied');
    }

    public function create()
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            $ventas = Venta::all();
            $productos = Producto::all();
            return view('venta_detalles.create', compact('ventas', 'productos'));
        }
        return redirect()->route('errors.access_denied');
    }

    public function store(Request $request)
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            $request->validate([
                'id_venta' => 'required|exists:ventas,id',
                'id_producto' => 'required|exists:productos,id',
                'cantidad' => 'required|integer',
                'precio_unitario' => 'required|numeric'
            ]);

            VentaDetalle::create($request->all());

            return redirect()->route('venta_detalles.index')->with('success', 'Detalle de venta creado exitosamente.');
        }
        return redirect()->route('errors.access_denied');
    }

    public function show(VentaDetalle $ventaDetalle)
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            return view('venta_detalles.show', compact('ventaDetalle'));
        }
        return redirect()->route('errors.access_denied');
    }

    public function edit(VentaDetalle $ventaDetalle)
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            $ventas = Venta::all();
            $productos = Producto::all();
            return view('venta_detalles.edit', compact('ventaDetalle', 'ventas', 'productos'));
        }
        return redirect()->route('errors.access_denied');
    }

    public function update(Request $request, VentaDetalle $ventaDetalle)
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            $request->validate([
                'id_venta' => 'required|exists:ventas,id',
                'id_producto' => 'required|exists:productos,id',
                'cantidad' => 'required|integer',
                'precio_unitario' => 'required|numeric'
            ]);

            $ventaDetalle->update($request->all());

            return redirect()->route('venta_detalles.index')->with('success', 'Detalle de venta actualizado exitosamente.');
        }
        return redirect()->route('errors.access_denied');
    }

    public function destroy(VentaDetalle $ventaDetalle)
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            $ventaDetalle->delete();
            return redirect()->route('venta_detalles.index')->with('success', 'Detalle de venta eliminado exitosamente.');
        }
        return redirect()->route('errors.access_denied');
    }
}
