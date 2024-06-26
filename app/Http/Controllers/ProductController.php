<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Product;
use function Pest\Laravel\json;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request;
use Illuminate\Routing\Controller;

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
    public function index()
    {
        
        $items =  Product::query()
                ->when(Request::input('search'), function($query, $search) {
                    $query->where('title','like',"%{$search}%");
                })
                ->paginate(15)
                ->withQueryString();
        $filters = Request::only(['search']);

        return Inertia::render('Product/Index',['items' => $items, 'filters' => $filters]);
    }
    public function categories()
    {
        
        $categories =  Product::where('category')->get();

        return Inertia::render('Product/Index',['categories' => $categories]);
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
