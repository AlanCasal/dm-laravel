<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class MainController extends Controller
{
	public function homeShowProducts()
	{

		// $activeCategories = CategoryController::showCategories();

		$pcs = User::where('category_id', '=', 7)->random(4); // ver controlador en dragonmarket-master controlador

		return view('/home', ['pcs' => $pcs]);
	}
}
