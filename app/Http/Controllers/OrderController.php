<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('orders.index');
    }

    public function addToCart(Request $request)
    {
        return response()->json(['success' => true, 'message' => 'Added to cart!']);
    }

    public function checkout()
    {
        return view('orders.checkout');
    }

    public function processPayment(Request $request)
    {
        return redirect()->route('orders.success');
    }

    public function success()
    {
        return view('orders.success');
    }
}