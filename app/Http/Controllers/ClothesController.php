<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Clothe;
use App\Models\Review;

class ClothesController extends Controller
{
    public function men()
    {
        
        $menClothes = Clothe::where('gender', 'H')->with('images')->groupBy('clothes.id', 'clothes.type_product', 'clothes.name', 'clothes.gender', 'clothes.discount',
        'clothes.discount_rate', 'clothes.price', 'clothes.description')->get();

        return view('clothes.menClothes', compact('menClothes'));
    }

    public function women()
    {
        $womenClothes = Clothe::where('gender', 'M')->with('images')->groupBy('clothes.id', 'clothes.type_product', 'clothes.name', 'clothes.gender', 'clothes.discount',
        'clothes.discount_rate', 'clothes.price', 'clothes.description')->get();

        return view('clothes.womenClothes', compact('womenClothes'));
    }

    public function view($id)
    {
        $images = Clothe::where('id', $id)->with('images')->groupBy('clothes.id', 'clothes.type_product', 'clothes.name', 'clothes.gender', 'clothes.discount',
                'clothes.discount_rate', 'clothes.price', 'clothes.description')->get();

        $colores = Clothe::with('clothingColor')->where('id', $id)->get();

        $tallas = Clothe::with('clothingSize')->where('id', $id)->get();
        
        $reviews = Review::with('userReview')->where('idClo', $id)->get();

        return view('clothes.images', compact('images', 'colores', 'tallas', 'reviews'));
    }
}
