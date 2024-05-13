<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias', compact('categorias'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:categorias',
        ]);

        Categoria::create($request->all());
        return redirect()->route('index')->with('success', 'Categoría creada exitosamente.');
    }

    public function show(Categoria $categoria)
    {
        return view('show', compact('categoria'));
    }

    public function edit(Categoria $categoria)
    {
        return view('edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nombre' => 'required|unique:categorias,nombre,'.$categoria->id,
        ]);

        $categoria->update($request->all());
        return redirect()->route('index')->with('success', 'Categoría actualizada exitosamente.');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('index')->with('success', 'Categoría eliminada exitosamente.');
    }
}
