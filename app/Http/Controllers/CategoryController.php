<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('admin.categories.index')
			->with(['storeOrDestroy' => str_replace('_', ' ', request()->query())])
			->with(['categories' => Category::
				orderBy('name')
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
		return view('admin.categories.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$request->validate([
			'name' => ['required', Rule::unique('categories')],
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
	 * @param  int $id
	 * @return void
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return void
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 * @return void
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Category $category
	 * @return \Illuminate\Http\Response
	 * @throws \Exception
	 */
	public function destroy(Category $category)
	{
		$category->delete();

		$data['destroy'] = $category['name'];
		return redirect()->route('categories.index', $data);
	}
}
