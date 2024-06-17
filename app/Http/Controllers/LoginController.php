<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Productos;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function register(Request $request)
    {
        $productos = Productos::all();
        $user = new User();
        $user->nombre = $request->nombre;
        $user->password = Hash::make($request->password);
        $user->permisos = 'user';

        $user->save();
        Auth::login($user);
        return view('tienda', compact('productos'));
        //return redirect(route('tienda'));
    }

    public function registerAdmin(Request $request)
    {
        $productos = Productos::all();
        $user = new User();
        $user->nombre = $request->nombre;
        $user->password = Hash::make($request->password);
        $user->permisos = 'admin';

        $user->save();
        Auth::login($user);
        //return view('tienda', compact('productos'));
        return redirect(route('admin'));
    }
    
    public function login(Request $request)
    {
        $productos = Productos::all();
        $credentials = [
            "nombre" => $request->nombre,
            "password" => $request->password,
        ];
        $remember = ($request->has('remember') ? true : false);

        if(Auth::attempt($credentials, $remember)){
            $request->session()->regenerate();
            //return redirect()->intended(route('tienda'));
            $user = Auth::user();
            if ($user->permisos === 'user') {
                return view('tienda', compact('productos'));
            } else {
                return redirect()->route('admin'); 
            }
        }else{
            return redirect('login');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
