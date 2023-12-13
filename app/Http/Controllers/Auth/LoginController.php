<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; // Don't forget to add this
use Illuminate\Support\Facades\Auth;
use App\Models\Cart as CartModel; // Use the Cart model
use Darryldecode\Cart\Facades\CartFacade as Cart;
use App\Models\Product; // Use the Product model


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        if ($user->is_admin) {
            return redirect('/admin');
        } else {
            // Load the cart items from the database
            $cartItems = CartModel::where('user_id', Auth::id())->get();

            foreach ($cartItems as $item) {
                $product = Product::find($item->product_id);

                Cart::add(array(
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => $item->quantity,
                    'attributes' => array(),
                    'associatedModel' => $product
                ));
            }

            return redirect('/');
        }
    }
}