<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Inertia\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    // get product_id
    $product = DB::table('carts')->where('product_id',$request->product_id)->first();

    $validate =$request->validate
        ([
            'quantity' => ['required'],
            'user_id' => ['required'],
            'product_id'=> ['required'],
            'price'=> ['required'],
        ]);

        if($product !== null) 
        {
            DB::table('carts')
            ->where('product_id',$request->product_id)
            ->update(['quantity'=> ((int)$product->quantity + $request->quantity)]);

        } else {

            Cart::create($validate);
            
        }
    

        
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
