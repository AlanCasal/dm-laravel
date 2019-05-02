<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Validator;

class CategoryController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return View
	 */
	public function index()
	{
		return view('auth.categories.index')
			->with(['data'       => str_replace('_', ' ', request()->query())])
			->with(['categories' => Category::orderBy('id')->paginate(30)
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return void
	 */
	public function create()
	{
		//return view('auth.categories.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'name' => ['required', Rule::unique('categories')],
		], [
			'name.required' => 'Por favor ingresá un nombre.',
			'name.unique' => 'La categoría ya existe.'
		]);

		$name = strtoupper($request->name);

		if ($validator->passes()) {
			$newCategory = Category::create(['name' => $name]);
			return response([
				'success' => "La categoría {$name} ha sido creada.",
				'id' => $newCategory->id
			]);
		}

		return response(['error' => $validator->errors()->first()], 422);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param int $id
	 * @return void
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param Category $category
	 * @return void
	 */
	public function edit(Category $category)
	{
		//return view('auth.categories.edit')->with(['category' => $category]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \App\Models\Category $category
	 * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
	 */
	public function update(Request $request, Category $category)
	{
		$validator = Validator::make($request->all(), [
			'name' => ['required', Rule::unique('categories')],
		], [
			'name.required' => 'Por favor ingresá un nombre.',
			'name.unique' => 'La categoría ya existe.'
		]);

		$oldName = $category->name;
		$newName = strtoupper($request->name);

		if ($validator->passes()) {
			$category->update(['name' => $newName]);
			return response(['success' => 'Cambios guardados correctamente.']);
		}

		return $oldName == $newName ?
			response(['same' => 'No se registraron cambios.'], 422) :
			response(['error' => $validator->errors()->first()], 422);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param \App\Models\Category $category
	 * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
	 * @throws \Exception
	 */
	public function destroy(Category $category)
	{
		$sinCategoria = Category::where('name', 'SIN CATEGORIA')->first();
		$products = Product::where('category_id', $category->id)->get();
		$name = $category->name;

		foreach ($products as $product) // los productos pasan a estar sin categoría
			$product->update(['category_id' => $sinCategoria->id]);

		$category->delete();

		return response(['success' => $name]);
	}
}