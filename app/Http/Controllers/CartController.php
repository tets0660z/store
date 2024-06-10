<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Inertia\Inertia;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        // $products = DB::table('product_user')
        //     ->join('products', 'users.id', '=', 'product_user.user_id')
        //     ->join('users', 'users.id', '=', 'orders.user_id')
        //     ->select('users.*', 'contacts.phone', 'orders.price')
        //     ->get();

        // return Inertia::render('Cart/Index', ['items' => $products]);
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
    $product = DB::table('product_user')->where('product_id',$request->product_id)->first();

    $validate =$request->validate
        ([
            'quantity' => ['required'],
            'user_id' => ['required'],
            'product_id'=> ['required'],
            'price'=> ['required'],
        ]);
    //update or create
        if($product !== null) 
        {
            DB::table('product_user')
            ->where('product_id',$request->product_id)
            ->update(['quantity'=> ((int)$product->quantity + $request->quantity)]);

        } else {

            Cart::create($validate);
            
        }
        // return to_route('product.index');
    

        
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
    public function destroy( $cart)
    {
        $item= Cart::find($cart);
        $item->delete();
        
        // return redirect(route('chirps.index'));
    }
}
