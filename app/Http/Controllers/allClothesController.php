<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Clothe;
use Illuminate\Http\Request;

class allClothesController extends Controller
{
    public function all()
    {
        $clothes = Clothe::all();
        return view('clothes.index', compact('clothes'));
    }
}
