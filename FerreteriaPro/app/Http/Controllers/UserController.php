<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function perfil()
    {
        $user = Auth::user();
        return view('user.perfil', compact('user'));
    }

    public function actualizarPerfil(Request $request)
    {
        $user = Auth::user();
        $user->update($request->all());
        return redirect()->route('user.perfil')->with('success', 'Perfil actualizado con éxito');
    }
}
