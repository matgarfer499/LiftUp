<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Clothe;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class ClothesController extends Controller
{
    public function clothes($gender)
    {
        $clothes = Clothe::where('gender', $gender)->with('images')->with('wishlist')->groupBy('clothes.id', 'clothes.type_product', 'clothes.name', 'clothes.gender', 'clothes.discount',
        'clothes.discount_rate', 'clothes.price', 'clothes.description', 'clothes.material')->get();
        $amount = $clothes->count();

        
        foreach ($clothes as $clothe) {
            $isLiked = false; // Valor predeterminado
            foreach ($clothe->wishlist as $liked) {
                if ($liked->pivot->idUse == auth()->user()?->id) {
                    $isLiked = true; // Se encontró un "liked"
                break; // Salir del bucle interno
                }
            }
            // Asignar el valor de $isLiked al objeto $man
            $clothe->isLiked = $isLiked;
        }

        return view('clothes.clothes', compact('clothes', 'amount'));
    }

    public function view($id)
    {
        $images = Clothe::where('id', $id)->with('images')->groupBy('clothes.id', 'clothes.type_product', 'clothes.name', 'clothes.gender', 'clothes.discount',
                'clothes.discount_rate', 'clothes.price', 'clothes.description', 'clothes.material')->get();

        $colores = Clothe::with('clothingColor')->where('id', $id)->get();

        $tallas = Clothe::with('clothingSize')->where('id', $id)->get();
        
        $reviews = Review::with('userReview')->where('idClo', $id)->get();

        return view('clothes.images', compact('images', 'colores', 'tallas', 'reviews'));
    }

    public function wishlist($idUse)
    {
        $liked = User::with('wishlist')->where('id', $idUse)->get();

        //dd($liked[0]->wishlist[0]);

        return view('clothes.wishlist', compact('liked'));
    }

    public function addToWishlist(Request $request)
    {
        $idClo = $request->input('idClo');
        $idUse = auth()->id();

        $user = User::findOrFail($idUse);

        if ($user->wishlist()->wherePivot('idClo', $idClo)->exists()) {
            $user->wishlist()->detach($idClo, ['idUse' => $idUse, 'idClo' => $idClo]);
            return response()->json(['success' => true]);
        } else {
            $user->wishlist()->attach($idClo, ['idUse' => $idUse, 'idClo' => $idClo]);
            return response()->json(['success' => true]);
        }
    }
}
