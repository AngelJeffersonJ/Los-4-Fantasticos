<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = DB::table('categorias')->get();
        return view('categories.index', compact('categories'));
    }

    public function show($id)
    {
        $category = DB::table('categorias')->where('id', $id)->first();
        $products = DB::table('productos')
            ->where('id_categoria', $id)
            ->leftJoin('proveedores', 'productos.id_proveedor', '=', 'proveedores.id')
            ->select('productos.*', 'proveedores.nombre as proveedor_nombre')
            ->get();
        return view('categories.show', compact('category', 'products'));
    }
}
