<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MercadotecniaController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            return view('mercadotecnia.index');
        }

        return redirect()->route('errors.access_denied');
    }
}
