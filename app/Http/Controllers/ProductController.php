<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.products.index')
		    ->with(['data' => request()->query()])
		    ->with(['products' => Product::
	        orderBy('category_id')
		    ->orderBy('id', 'asc')
		    ->paginate(30)
		    ->where('active', true)
		    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param \App\Models\Product $product
	 * @return \Illuminate\Http\Response
	 */
    public function edit(Product $product)
    {
    	//dd(Category::all()->first());

        return view('auth.products.edit')
	        ->with(['product' => $product])
	        ->with(['categories' => Category::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param \App\Models\Product $product
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws \Exception
	 */
    public function destroy(Product $product)
    {
        $data['destroy'] = $product->description;
        $product->delete();

        return redirect()->route('products.index', $data);
    }
}
