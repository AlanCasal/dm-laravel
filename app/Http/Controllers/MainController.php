<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
	
	public function mainPage()
	{
        $navbarItems = Category::orderBy('name')->pluck('name');

        function up_to_four_random_pcs() {
	        $pcsArmadas = Product ::all()->where('category_id', '=', 8);
	        return $pcsArmadas->count() > 4 ?
	        	$pcsArmadas->random(4):
		        $pcsArmadas;
        };

        return view('guest.home')
				->with(['navbarItems' => $navbarItems])
				->with(['pcs'         => up_to_four_random_pcs()])
				->with(['products'    => Product ::all()->where('category_id','!=', 7)->random(6)]);
	}
}
