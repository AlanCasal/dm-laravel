<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\Factory;
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
	 * @return Factory|View
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
	 * @return Response
	 */
	public function create()
	{
		return view('auth.categories.create');
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
			'name' => ['required', Rule::unique('categories')],
		], [
			'name.required' => 'Ingresá un nombre',
			'name.unique'   => "La categoría {$request->name} ya existe",
		]);

		Category::create([
			'name' => strtoupper($request['name']),
		]);

		$data['store'] = strtoupper($request['name']);

		return redirect()->route('categories.index', $data);
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
	 * @param $id
	 * @return void
	 */
	public function update(Request $request, $id)
	{
		$validator = Validator::make($request->all(), [
			'name' => ['required', Rule::unique('categories')/*->ignore($id)*/],
		], [
			'name.required' => 'Por favor ingresá un nombre.',
			'name.unique' => 'La categoría ya existe.'
		]);

		$category = Category::find($id);
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
	 * @param $id
	 * @return void
	 */
	public function destroy($id)
	{
		$category = Category::find($id);
		$sinCategoria = Category::where('name', 'SIN CATEGORIA')->first();
		$products = Product::where('category_id', $id)->get();
		$name = $category->name;

		foreach ($products as $product) // los productos pasan a estar sin categoría
			$product->update(['category_id' => $sinCategoria->id]);

		$category->delete();

		return response(['success' => $name]);
	}
}