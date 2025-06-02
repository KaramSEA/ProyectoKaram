<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorito;
use App\Models\Restaurante;
use Illuminate\Support\Facades\Auth;

class FavoritoController extends Controller
{
    public function toggle($restaurante_id)
    {
        $user = Auth::user();

        $favorito = Favorito::where('user_id', $user->id)
                            ->where('restaurante_id', $restaurante_id)
                            ->first();

        if ($favorito) {
            $favorito->delete(); // Quitar de favoritos
        } else {
            Favorito::create([
                'user_id' => $user->id,
                'restaurante_id' => $restaurante_id,
            ]);
        }

        return back();
    }
}
