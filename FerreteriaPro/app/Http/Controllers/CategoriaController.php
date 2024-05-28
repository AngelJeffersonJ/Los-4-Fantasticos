<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;

class CategoriaController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            $categorias = Categoria::all();
            return view('categorias.index', compact('categorias'));
        }
        return redirect()->route('errors.access_denied');
    }

    public function create()
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            return view('categorias.create');
        }
        return redirect()->route('errors.access_denied');
    }

    public function store(Request $request)
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            $request->validate([
                'nombre' => 'required'
            ]);

            Categoria::create($request->all());

            return redirect()->route('categorias.index')->with('success', 'Categoría creada exitosamente.');
        }
        return redirect()->route('errors.access_denied');
    }

    public function show(Categoria $categoria)
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            return view('categorias.show', compact('categoria'));
        }
        return redirect()->route('errors.access_denied');
    }

    public function edit(Categoria $categoria)
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            return view('categorias.edit', compact('categoria'));
        }
        return redirect()->route('errors.access_denied');
    }

    public function update(Request $request, Categoria $categoria)
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            $request->validate([
                'nombre' => 'required'
            ]);

            $categoria->update($request->all());

            return redirect()->route('categorias.index')->with('success', 'Categoría actualizada exitosamente.');
        }
        return redirect()->route('errors.access_denied');
    }

    public function destroy(Categoria $categoria)
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            $categoria->delete();
            return redirect()->route('categorias.index')->with('success', 'Categoría eliminada exitosamente.');
        }
        return redirect()->route('errors.access_denied');
    }
}
