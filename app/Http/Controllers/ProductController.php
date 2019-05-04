<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Validator;

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
			->with(['categories' => Category::all()])
			->with(['products' => Product::paginate(30)]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		/*return view('auth.products.create')
			->with(['categories' => Category::all()]);*/
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$request->validate([
			'name'        => ['required', Rule::unique('products')],
			'price'       => ['required', 'numeric', 'regex:/\b\d{1,3}(?:,?\d{3})*(?:\.\d{2})?\b/'],
			'category_id' => ['required'],
			'stock'       => ['required'],
			'active'      => ['required'],
		], [
			'name.required'        => 'Ingresá un nombre',
			'name.unique'          => 'El producto ya existe',
			'price.required'       => 'Ingresá un precio',
			'price.numeric'        => 'El precio solo puede contener números',
			'category_id.required' => 'Seleccioná una categoría',
			'stock.required'       => 'Ingresá la cantidad',
			'active.required'      => 'Indicá si el producto está activo',
		]);

		Product::create([
			'name'        => strtoupper($request['name']),
			'price'       => $request['price'],
			'category_id' => $request['category_id'],
			'stock'       => $request['stock'],
		]);

		$data['store'] = strtoupper($request['name']);

		return redirect()->route('products.index', $data);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param $id
	 * @return void
	 */
	public function show($id)
	{
		//...
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param Product $product
	 * @return Response
	 */
	public function edit(Product $product)
	{
		/*return view('auth.products.edit')
			->with(['product' => $product])
			->with(['products' => Product::all()])
			->with(['categories' => Category::all()]);*/
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param Product $product
	 * @return Response
	 */
	public function update(Request $request, Product $product)
	{
		$validator = Validator::make($request->all(), [
			'name'        => ['required', Rule::unique('products')->ignore($product->id)],
			'price'       => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
			'category_id' => ['required'],
			'stock'       => ['required', 'numeric', 'regex:/^[1-9][0-9]{0,2}$/'],
		], [
			'name.required'        => 'Por favor ingresá un nombre',
			'name.unique'          => 'El producto ya existe',
			'price.required'       => 'Por favor ingresá un precio',
			'price.numeric'        => 'El precio solo puede contener números',
			'regex'                => 'El valor ingresado no es un formato válido',
			'category_id.required' => 'Por favor seleccioná una categoría',
			'stock.required'       => 'Por favor ingresá la cantidad',
			'stock.numeric'        => 'La cantidad solo puede contener números',
		]);

		if ($validator->passes()) {
			$product->update($request->all());
			return response(['success' => 'Los cambios han sido guardados.']);
		}

		return response(['error' => $validator->errors()], 422);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Product $product
	 * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
	 * @throws Exception
	 */
	public function destroy(Product $product)
	{
		$product->delete();
		return response(['success' => $product->name]);
	}
}