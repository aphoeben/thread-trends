<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function userOrders()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('userorders', ['orders' => $orders]);
    }
    public function adminOrders()
    {
        $orders = Order::paginate(10); // Display 10 orders per page
        return view('orders', ['orders' => $orders]);
    }
    public function complete($id)
    {
        $order = Order::find($id);
        $order->status = 'completed';
        $order->save();
        return redirect('/orders')->with('status', 'Order marked as completed.');
    }
    
    public function cancel($id)
    {
        $order = Order::find($id);
        $order->status = 'cancelled';
        $order->save();
        return redirect('/orders')->with('status', 'Order marked as cancelled.');
    }
    

    
}