<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected function authenticated(Request $request, $user)
    {
        if ($user->role->name === 'admin') {
            return redirect()->route('admin.index');
        }

        return redirect()->route('cliente.index');
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
