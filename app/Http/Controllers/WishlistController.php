<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class WishlistController extends Controller
{
    public function add(Request $request, $productId)
{
    $user = Auth::user();
    $user->wishlist()->attach($productId);
    return back();
}

public function remove(Request $request, $productId)
{
    $user = Auth::user();
    $user->wishlist()->detach($productId);
    return back();
}
public function index()
{
    $user = Auth::user();
    $wishlist = $user->wishlist;
    return view('wishlist', ['wishlist' => $wishlist]); // Changed 'wishlist.index' to 'wishlist'
}


}