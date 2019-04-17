<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class CategoryController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return Factory|View
	 */
	public function index()
	{
		return view('auth.categories.index')->with(['data' => str_replace('_', ' ', request()->query())])->with([
			'categories' => Category::
			orderBy('id')->paginate(30)->where('active', true),
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
	 * @return View
	 */
	public function edit(Category $category)
	{
		return view('auth.categories.edit')->with(['category' => $category]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param $value
	 * @return void
	 */
	public function update($value)
	{
		return response(['message' => request()->category_active]);
		$category = Category::find(request()->category_id);
		$oldName = $category->name;
		$newName = strtoupper($value);

		/*$value->validate([
			'name' => [Rule::unique('categories')->ignore($category->id)],
		], [
			'name.unique' => "La categoría ya existe",
		]);*/

		/*$data['update'] = [
			$category->name, //old
			$newName['name'] //new
		];*/

		$category->update(['name' => $newName]);
		if (request()->ajax())
			return response(['message' => "La categoría {$oldName} ahora se llama {$newName}."]);

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Category $category
	 * @return void
	 * @throws \Exception
	 */
	public function destroy(Category $category)
	{
		$products = Product::where('category_id', $category->id)->get();
		$sinCategoria = Category::where('name', 'SIN CATEGORIA')->first();

		foreach ($products as $product)
			$product->update(['category_id' => $sinCategoria->id]);

		//$data['destroy'] = $category->name;

		$category->delete();

		if (request()->ajax())
			return response()->json(['message' => 'La categoría '.$category->name.' ha sido eliminada.']);

		//return redirect()->route('categories.index', $data);
	}
}