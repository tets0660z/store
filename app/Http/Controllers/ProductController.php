<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Product;
use Illuminate\Http\Request;

use function Pest\Laravel\json;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function carts($id)
    {
        $user = User::findOrFail($id);
        // dd($user->products);

        return Inertia::render('Cart/Index', ['items' => $user->products]);
    }
    public function index(): Response
    {
        
        $items = Product::all();
        return Inertia::render('Product/Index', ['items' => $items]);
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
        //
    }
    
    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
   
        // $item = Http::get("https://fakestoreapi.com/products/{$id}")->json();
        // dd($item);
        $item = Product::findOrFail($id);
        return Inertia::render('Product/Show', ['item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
