<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if (request()->keys() != null) {
            $newCategory = str_replace('_', ' ', request()->keys());
            $newCategory = $newCategory[0];
        } else {
            $newCategory = null;
            $newCategoryMessage = null;
        };
        
        return view('admin.categories.index')
            ->with(['newCategory' => $newCategory])
            ->with(['categories' => Category::
                where('active', true)
	            ->orderBy('name')
	            ->pluck('name', 'id')]);
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
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
	    $data = request()->validate([
			    'name' => ['required', Rule::unique('categories')],
		    ]
	    );

	    $newCategory = strtoupper($data['name']);
	    
//	    dd($newCategory);
	    Category::create([
		    'name' => $newCategory,
	    ]);

	    return redirect()->route('categories.index', $newCategory);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
     * @param Category $category
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        $category->delete();
    
        return redirect()->route('categories.index');
    }
}
