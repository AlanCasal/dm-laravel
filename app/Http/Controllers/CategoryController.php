<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public static function showCategories()
    {
        $categories = Category::where('active', 1)
                                ->orderBy('name')
                                ->pluck('name');

        return $categories;
    }
}
