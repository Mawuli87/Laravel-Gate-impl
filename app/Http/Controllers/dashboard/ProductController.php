<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
         function __construct() {
            $this->middleware('auth');
        }

    public function index()
    {
        $products = Product::all();
        return view('dashboard.products.index',compact(['products']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('can-create');
        return view('dashboard.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('can-create');
        $request->validate([
            'name' => ['required'],
            'price'=> ['required'],
            'quantity'=>['required'],

        ]);

       // try {
        $product = Product::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'quantity' =>$request->input('quantity'),
            'user_id' => Auth::id()
         ]);

         return redirect()->route('product.index')->with('msg','Product has been created successfully');
       // }catch(Exception $e){
        // return redirect()->back()->with('msg','Product has not been created');
        //}
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
