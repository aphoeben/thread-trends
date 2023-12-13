<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart as CartModel; // Use the Cart model
use App\Models\OrderItem;
use App\Models\Order;




class ProductController extends Controller
{
    // Shows all records
    public function show()
    {
        $categories = Product::latest()->paginate('5');;
        return view('category.index', ['categories' => $categories]);
    }

    // Create form for category
    public function create()
    {
        $categories = Product::all();
        return view('category.create', ['categories' => $categories]);
    }

  // Saves the record
public function save(Request $request)
{
    $this->validate(request(), [
        'name' => 'required|min:1|max:255',
        'description' => 'required|min:1|max:255',
        'price' => 'required|min:1|max:255',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]);

    $file = $request->file('image');
    $extension = $file->getClientOriginalExtension();
    $fileName = time() . '.' . $extension;
    $file->move('storage/products', $fileName);

    $category = new Product;
    $category->name = $request->name;
    $category->description = $request->description;
    $category->price = $request->price;
    $category->image = $fileName;
    $category->section = $request->section;
    $category->qty = $request->qty;
    $category->save();

    return redirect('/category')->with('status', 'Item added.');
}


    // Edits the record
    public function update(Request $request, $id)
    {
        $category = Product::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->price = $request->price;
        $category->section = $request->section;
        $category->qty = $request->qty;
        if ($request->hasfile('image')) {
            $destination = 'storage/products' . $category->image;

            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . 'edited' . '.' . $extension;
            $file->move('storage/products', $filename);
            $category->image = $filename;
        }

        $category->update();

        return redirect('/category')->with('status', 'Item updated.');
    }

    // Delete the record
    public function destroy($id)
    {
        $category = Product::find($id);
        $category->delete();
        return redirect('/category')->with('status', 'Item deleted successfully.');
    }

    // Shows all products
    public function index()
    {
        $products = Product::all();
        return view('products', ['products' => $products]);
    }

    // Shows men's products
    public function showMen()
    {
        $products = Product::where('section', 'M')->get();
        return view('men', ['products' => $products]);
    }

    // Shows women's products
    public function showWomen()
    {
        $products = Product::where('section', 'W')->get();
        return view('women', ['products' => $products]);
    }

     // Adds a product to the cart
     public function addToCart(Request $request, $id)
     {
         // Check if the user is authenticated
         if (Auth::check()) {
             // Check if the user is a customer (is_admin is 0)
             if (Auth::user()->is_admin == 0) {
                 $product = Product::find($id);
     
                 // Check if the product is already in the cart
                 $cartItem = CartModel::where('user_id', Auth::id())
                     ->where('product_id', $product->id)
                     ->first();
     
                 if ($cartItem) {
                     // If the product is already in the cart, increment the quantity
                     $cartItem->quantity += 1;
                     $cartItem->save();
                 } else {
                     // If the product is not in the cart, add it
                     CartModel::create([
                         'user_id' => Auth::id(),
                         'product_id' => $product->id,
                         'quantity' => 1,
                     ]);
                 }
     
                 // Add the product to the session cart
                 Cart::add(array(
                     'id' => $product->id,
                     'name' => $product->name,
                     'price' => $product->price,
                     'quantity' => 1,
                     'attributes' => array(),
                     'associatedModel' => $product
                 ));
     
                 return redirect()->route('showCart');
             } else {
                 return redirect()->back()->withErrors(['You are not allowed to add items to the cart.']);
             }
         } else {
             return redirect()->route('login');
         }
     }
     
 // Updates the quantity of a product in the cart
 public function updateCart(Request $request, $id)
 {
     // Update the quantity in the session cart
     Cart::update($id, array(
         'quantity' => array(
             'relative' => false,
             'value' => $request->quantity,
         ),
     ));
 
     // Update the quantity in the carts table
     $cartItem = CartModel::where('user_id', Auth::id())
         ->where('product_id', $id)
         ->first();
 
     if ($cartItem) {
         $cartItem->quantity = $request->quantity;
         $cartItem->save();
     }
 
     return redirect()->route('showCart');
 }
 
 
 public function removeFromCart($id)
 {
     // Remove the item from the session cart
     Cart::remove($id);
 
     // Remove the item from the carts table
     $cartItem = CartModel::where('user_id', Auth::id())
         ->where('product_id', $id)
         ->first();
 
     if ($cartItem) {
         $cartItem->delete();
     }
 
     return redirect()->route('showCart');
 }
 
 // Shows the cart
 public function showCart()
 {
     $cartItems = CartModel::where('user_id', Auth::id())->get();
     $subtotal = $this->getSubTotal();
     $platformFee = $subtotal * 0.002;
     $total = $subtotal + $platformFee + 50;
 
     // Pass the cart items, subtotal, platform fee, and total to your view...
     return view('cart', ['cartItems' => $cartItems, 'subtotal' => $subtotal, 'platformFee' => $platformFee, 'total' => $total]);
 }
 
 


 public function getSubTotal()
 {
     $cartItems = CartModel::where('user_id', Auth::id())->get();
     $subtotal = 0;
 
     foreach ($cartItems as $item) {
         // Check if the associated product is not null
         if ($item->product) {
             // Remove any commas in the price and convert it to a float
             $price = floatval(str_replace(',', '', $item->product->price));
             $subtotal += $item->quantity * $price;
         }
     }
 
     return $subtotal;
 }
 public function checkout()
{
    // Check if the cart is empty
    if (CartModel::isEmpty()) {
        return redirect()->back()->withErrors(['Your cart is empty.']);
    }

    $cartItems = CartModel::where('user_id', Auth::id())->get();
    $subtotal = $this->getSubTotal();
    $platformFee = $subtotal * 0.002;
    $total = $subtotal + $platformFee + 50;

    // Create a new order
    $order = new Order;
    $order->user_id = Auth::id();
    $order->total_price = $total;
    $order->save();

    // Iterate over cart items and store each in the order_items table
    foreach ($cartItems as $item) {
        $orderItem = new OrderItem; // Assuming you have an OrderItem model
        $orderItem->order_id = $order->id;
        $orderItem->product_id = $item->product_id;
        $orderItem->quantity = $item->quantity;
        $orderItem->save();
    }

    // Clear the cart after checkout
    Cart::clear();
    CartModel::where('user_id', Auth::id())->delete();

    // Pass the order_id to the view
    return view('checkout', ['order_id' => $order->id, 'subtotal' => $subtotal, 'platformFee' => $platformFee, 'total' => $total]);
}


 
}