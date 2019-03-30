<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
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
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param Product $product
	 * @return Response
	 */
    public function edit(Product $product)
    {
    	//dd(product::all()->first());

        return view('auth.products.edit')
	        ->with(['product' => $product])
	        ->with(['products' => product::all()]);
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param Product $product
	 * @return Response
	 */
    public function update(Product $product)
    {
	    dd(request(['name']));
    	$updates = request()->validate([
		    'name' => [Rule::unique('products')->ignore($product->name)],
	        ] // , ['first_name.required' => 'Por favor ingresá un nombre']
	    );
	    $updates['name'] = strtoupper($updates['name']);

	    $data['update'] = array(
	        $product->name, //old
		    $updates['name'] //new
	    );
		
	    $product->update($updates);
		
	    return redirect()->route('products.index', $data);
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Product $product
	 * @return RedirectResponse
	 * @throws Exception
	 */
    public function destroy(Product $product)
    {
        $data['destroy'] = $product->name;
        $product->delete();

        return redirect()->route('products.index', $data);
    }
}