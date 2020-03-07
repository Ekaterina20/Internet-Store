<?php

namespace App\Http\Controllers\Site;
use App\Product;
use Illuminate\Support\Str;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function index () {
        $categoriesCount = Category::count();
        $productsCount = Product::count();

        $products = Product::take(5)->latest()->get();
        return view('site.index', compact('categoriesCount', 'productsCount','products'));
    }

}
