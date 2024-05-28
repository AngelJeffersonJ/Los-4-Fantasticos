<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            $clientes = Cliente::all();
            return view('clientes.index', compact('clientes'));
        }
        return redirect()->route('errors.access_denied');
    }

    public function create()
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            return view('clientes.create');
        }
        return redirect()->route('errors.access_denied');
    }

    public function store(Request $request)
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            $request->validate([
                'nombre' => 'required',
                'direccion' => 'required',
                'telefono' => 'required'
            ]);

            Cliente::create($request->all());

            return redirect()->route('clientes.index')->with('success', 'Cliente creado exitosamente.');
        }
        return redirect()->route('errors.access_denied');
    }

    public function show(Cliente $cliente)
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            return view('clientes.show', compact('cliente'));
        }
        return redirect()->route('errors.access_denied');
    }

    public function edit(Cliente $cliente)
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            return view('clientes.edit', compact('cliente'));
        }
        return redirect()->route('errors.access_denied');
    }

    public function update(Request $request, Cliente $cliente)
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            $request->validate([
                'nombre' => 'required',
                'direccion' => 'required',
                'telefono' => 'required'
            ]);

            $cliente->update($request->all());

            return redirect()->route('clientes.index')->with('success', 'Cliente actualizado exitosamente.');
        }
        return redirect()->route('errors.access_denied');
    }

    public function destroy(Cliente $cliente)
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            $cliente->delete();
            return redirect()->route('clientes.index')->with('success', 'Cliente eliminado exitosamente.');
        }
        return redirect()->route('errors.access_denied');
    }
}
