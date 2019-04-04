<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use function Composer\Autoload\includeFile;
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
        return view('auth.products.create')
	        ->with(['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
    	//dd(request()->category_id);
	    $request->validate([
		    'name' => [Rule::unique('products')],
		    'price' => [/*Rule::unique('products')->ignore($product->id), 'regex:/\b\d{1,3}(?:,?\d{3})*(?:\.\d{2})?\b/'*/],
		    //'category_id' => [],
		    //'stock' => [],
		    //'active' => [],
	    ]);

	    Product::create([
		    'name' => strtoupper($request['name']),
		    'price' => $request['price'],
		    'category_id' => $request['category_id'],
	    ]);

	    $data['store'] = strtoupper($request['name']);
	    return redirect()->route('products.index', $data);
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
	        ->with(['product'    => $product])
	        ->with(['products'   => Product::all()])
	        ->with(['categories' => Category::all()]);
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param Product $product
	 * @return Response
	 */
    public function update(Product $product)
    {
    	$updates = request()->validate([
		    'name' => [Rule::unique('products')->ignore($product->id)],
		    'price' => [/*Rule::unique('products')->ignore($product->id), 'regex:/\b\d{1,3}(?:,?\d{3})*(?:\.\d{2})?\b/'*/],
		    'category_id' => [],
		    'stock' => [],
		    'active' => [],
        ]);

	    $updates['name'] = strtoupper($updates['name']);

	    $data['update'] = array(
	        $product->name, //old
		    $updates['name'], //new

	        $product->price,
	        $updates['price'],

	        $product->category->name,
	        Category::where('id', $updates['category_id'])->first()->name,

	        $product->stock,
	        $updates['stock'],

	        $product->active,
	        $updates['active'],
	    );
		//dd($data['update'][9]);

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