<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
	
	public function homeShowProducts()
	{
        $navbarItems = Category::where('active', '=', true)->orderBy('name')->pluck('name');
        
        return view('guests.home')
				->with(['navbarItems' => $navbarItems])
				->with(['pcs'         => Product ::all()->where('category_id', '=', 7)->random(4)])
				->with(['products'    => Product ::all()->where('category_id','!=', 7)->random(6)]);
	}
	
	public function adminMenu() {
	    //...
    }
}
