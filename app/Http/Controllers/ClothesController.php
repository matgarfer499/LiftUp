<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Clothe;
use App\Models\Review;
use App\Models\Color;
use Illuminate\Http\Request;

class ClothesController extends Controller
{
    public function clothes($gender)
    {
        $clothes = Clothe::where('gender', $gender)->with('images')->with('wishlist')->get();
        $amount = $clothes->count();
        $colors = Color::get();
        
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

        return view('clothes.clothes', compact('clothes', 'amount', 'gender', 'colors'));
    }

    public function view($id)
    {
        $images = Clothe::where('id', $id)->with('images')->get();

        $colores = Clothe::with('clothingColor')->where('id', $id)->get();

        $tallas = Clothe::with('clothingSize')->where('id', $id)->get();
        
        $reviews = Review::with('userReview')->where('idClo', $id)->get();

        return view('clothes.images', compact('images', 'colores', 'tallas', 'reviews'));
    }

    public function sortFilter(Request $request, $gender){

        $sort = $request->input('sort');
        $typeProduct = $request->input('typeProduct');
        $color = $request->input('color');
        $sizes = $request->input('sizes');
        $discount = $request->input('discount');
        $minPrice = $request->input('minPrice');
        $maxPrice = $request->input('maxPrice');
        
        $clothes = Clothe::where('gender', $gender)->with('images')->with('wishlist')->whereBetween('price', [$minPrice, $maxPrice]);

        if(isset($typeProduct)){
            $clothes = $clothes->whereIn('type_product', $typeProduct);
        }
        if(isset($discount)){
            $clothes = $clothes->where('discount', 1)->whereIn('discount_rate', $discount);
        }
        if(isset($sizes)){
            $clothes = $clothes->when(isset($sizes), function ($query) use ($sizes) {
                $query->whereHas('clothingSize', function ($subQuery) use ($sizes) {
                    $subQuery-> whereIn('size', $sizes);
                });
            });
        }
        if(isset($color)){
            $clothes = $clothes->when(isset($color), function ($query) use ($color) {
                $query->whereHas('clothingColor', function ($subQuery) use ($color) {
                    $subQuery-> whereIn('color', $color);
                });
            });
        }
        
        if($sort == "asc" || $sort == "desc"){
            $clothes = $clothes->orderBy('clothes.price', $sort)->get();
        } else if ($sort == "new"){
            $clothes = $clothes->latest('created_at')->get();
        }else{
            $clothes = $clothes->get();
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
