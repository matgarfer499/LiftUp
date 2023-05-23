<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Clothe;
use App\Models\Review;
use Illuminate\Http\Request;

class ClothesController extends Controller
{
    public function clothes($gender)
    {
        $clothes = Clothe::where('gender', $gender)->with('images')->with('wishlist')->groupBy('clothes.id', 'clothes.type_product', 'clothes.name', 'clothes.gender', 'clothes.discount',
        'clothes.discount_rate', 'clothes.price', 'clothes.description', 'clothes.material', 'clothes.created_at', 'clothes.updated_at')->get();
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

        if($gender === 'H'){
            $gender = "Hombre";
        }else{
            $gender = "Mujer";
        }

        return view('clothes.clothes', compact('clothes', 'amount', 'gender'));
    }

    public function view($id)
    {
        $images = Clothe::where('id', $id)->with('images')->groupBy('clothes.id', 'clothes.type_product', 'clothes.name', 'clothes.gender', 'clothes.discount',
                'clothes.discount_rate', 'clothes.price', 'clothes.description', 'clothes.material', 'clothes.created_at', 'clothes.updated_at')->get();

        $colores = Clothe::with('clothingColor')->where('id', $id)->get();

        $tallas = Clothe::with('clothingSize')->where('id', $id)->get();
        
        $reviews = Review::with('userReview')->where('idClo', $id)->get();

        return view('clothes.images', compact('images', 'colores', 'tallas', 'reviews'));
    }

    public function sortFilter(Request $request, $gender){
        $sort = $request->input('sort');

        switch($sort){
            case "asc":
                $clothes = Clothe::where('gender', $gender)->with('images')->with('wishlist')->groupBy('clothes.id', 'clothes.type_product', 'clothes.name', 'clothes.gender', 'clothes.discount',
                'clothes.discount_rate', 'clothes.price', 'clothes.description', 'clothes.material', 'clothes.created_at', 'clothes.updated_at')->orderBy('clothes.price', $sort)->get();
                break;
            case "desc":
                $clothes = Clothe::where('gender', $gender)->with('images')->with('wishlist')->groupBy('clothes.id', 'clothes.type_product', 'clothes.name', 'clothes.gender', 'clothes.discount',
                'clothes.discount_rate', 'clothes.price', 'clothes.description', 'clothes.material', 'clothes.created_at', 'clothes.updated_at')->orderBy('clothes.price', $sort)->get();
                break;
            case "new":
                $clothes = Clothe::where('gender', $gender)->with('images')->with('wishlist')->groupBy('clothes.id', 'clothes.type_product', 'clothes.name', 'clothes.gender', 'clothes.discount',
                'clothes.discount_rate', 'clothes.price', 'clothes.description', 'clothes.material', 'clothes.created_at', 'clothes.updated_at')->latest('created_at')->get();
                break;
            default:
            $clothes = Clothe::where('gender', $gender)->with('images')->with('wishlist')->groupBy('clothes.id', 'clothes.type_product', 'clothes.name', 'clothes.gender', 'clothes.discount',
            'clothes.discount_rate', 'clothes.price', 'clothes.description', 'clothes.material', 'clothes.created_at', 'clothes.updated_at')->get();
        }
        
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

        return view('clothes.sortFilter', compact('clothes'));
    }
}
