<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PerfilController extends Controller
{
    public function edit()
    {
        return view('perfil.edit', ['user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::id());

        $request->validate([
            'dni' => 'required|string|max:20|unique:users,dni,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->dni = $request->dni;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('perfil.edit')->with('success', 'Datos actualizados correctamente.');
    }
    public function show()
    {
        return view('perfil.show', ['user' => Auth::user()]);
    }

}
