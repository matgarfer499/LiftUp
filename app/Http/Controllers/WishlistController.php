<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function viewLikes($idUse)
    {
        $liked = User::with('wishlist')->where('id', $idUse)->get();

        return view('clothes.wishlist', compact('liked'));
    }

    public function addRemoveToWishlist(Request $request)
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
