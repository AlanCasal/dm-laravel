<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class MainController extends Controller
{
	public function homeShowProducts()
	{
		return view('/home')
				->with(['activeCategories' => Category::all()->where('active','=', true)])
				->with(['pcs'              => Product ::all()->where('category_id', '=', 7)->random(4)])
				->with(['products'         => Product ::all()->where('category_id','!=', 7)->random(6)]);
	}
}
