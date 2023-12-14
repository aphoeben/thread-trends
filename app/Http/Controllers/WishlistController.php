<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class WishlistController extends Controller
{
    public function add(Request $request, $productId)
    {
        $user = Auth::user();
        if ($user->wishlist()->where('product_id', $productId)->exists()) {
            return back()->with('status', 'This item is already in your wishlist!');
        }
        $user->wishlist()->syncWithoutDetaching($productId);
        return back()->with('success', 'Item added to wishlist!');
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