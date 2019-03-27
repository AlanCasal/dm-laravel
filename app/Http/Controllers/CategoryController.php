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
			->with(['data' => str_replace('_', ' ', request()->query())])
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
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
	public function edit(Category $category)
	{
        return view('admin.categories.edit')
            ->with(['category' => $category]);
	}
    
    /**
     * Update the specified resource in storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
	public function update(Category $category)
	{
        $newName = request()->validate([
            'name' => [Rule::unique('categories')->ignore($category->name)],
            ] // , ['first_name.required' => 'Por favor ingresá tu nombre']
        );
		$newName['name'] = strtoupper($newName['name']);

		$data['update'] = array(
			$category->name, //old
			$newName['name'] //new
		);

        $category->update($newName);

        return redirect()->route('categories.index', $data);
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
		$data['destroy'] = $category->name;
		$category->delete();

		return redirect()->route('categories.index', $data);
	}
}
