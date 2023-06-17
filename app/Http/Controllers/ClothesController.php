<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Clothe;
use App\Models\User;
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

        if(auth()->user()){
            $idUse = auth()->user()?->id;
            $purchases = User::with('purchase')->where('id', $idUse)->get();
            $total = 0;
            foreach($purchases as $purchase){
                foreach($purchase->purchase as $bag){
                    $total += $bag->price;
                }
            }
            $view1 = view('layouts.plantilla', compact('purchases', 'total'));
            $view2 = view('clothes.clothes', compact('clothes', 'amount', 'gender', 'colors'));
            return $view1->with('view2', $view2);
        } else {
            return view('clothes.clothes', compact('clothes', 'amount', 'gender', 'colors'));
        }
        


    }

    public function deleteBag(Request $request)
    {
        $idClo = $request->input('idClo');
        $idUse = auth()->user()->id;

        $user = User::findOrFail($idUse);

        if ($user->purchase()->wherePivot('idClo', $idClo)->exists()) {
            $user->purchase()->detach($idClo, ['idUse' => $idUse, 'idClo' => $idClo]);
            return response()->json(['success' => true]);
        } else {
            $user->purchase()->attach($idClo, ['idUse' => $idUse, 'idClo' => $idClo]);
            return response()->json(['success' => true]);
        }
    }

    public function view($id)
    {
        $images = Clothe::where('id', $id)->with('images')->with('wishlist')->get();

        foreach ($images as $image) {
            $isLiked = false; // Valor predeterminado
            foreach ($image->wishlist as $liked) {
                if ($liked->pivot->idUse == auth()->user()?->id) {
                    $isLiked = true; // Se encontró un "liked"
                break; // Salir del bucle interno
                }
            }
            // Asignar el valor de $isLiked al objeto $man
            $image->isLiked = $isLiked;
        }   

        $colores = Clothe::with('clothingColor')->where('id', $id)->get();

        $tallas = Clothe::with('clothingSize')->where('id', $id)->get();
        
        $reviews = Review::with('userReview')->where('idClo', $id)->get();
        $totalReviews = $reviews->count();

        $stars = [];
        
        for ($score = 5; $score >= 1; $score--) {
            $stars[$score] = Review::with('userReview')->where('idClo', $id)->where('score', $score)->get();
        }

        $puntuation = Review::with('userReview')->where('idClo', $id)->sum('score');
        return view('clothes.images', compact('images', 'colores', 'tallas', 'reviews', 'totalReviews', 'stars', 'puntuation'));
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

    public function search(Request $request)
    {
        $search = $request->input('search');
        $gender = $request->input('gender');

        $clothes = Clothe::where(function ($query) use ($search) {
            $query->where('type_product', 'like', '%'.$search.'%')
                  ->orWhere('name', 'like', '%'.$search.'%')
                  ->orWhere('gender', 'like', '%'.$search.'%');
        })->where('gender', $gender)->get();

        return view('clothes.sortFilter', compact('clothes'));
    }
}
