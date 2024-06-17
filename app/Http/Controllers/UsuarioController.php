<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function edit($id)
    {
        $User = User::findOrFail($id);
        return view('users.edit', compact('User'));
    }

    public function update(Request $request, $id)
    {
        $User = User::findOrFail($id);
        $User->update($request->all());

        return redirect()->route('users.index')->with('success', 'User actualizado correctamente');
    }

    public function destroy($id)
    {
        $User = User::findOrFail($id);
        $User->delete();

        return redirect()->route('users.index')->with('success', 'User eliminado correctamente');
    }
}
