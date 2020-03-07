<?php

namespace App\Http\Controllers\Admin;
use App\Product;
use Illuminate\Support\Str;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index () {
        $categoriesCount = Category::count();
        $productsCount = Product::count();

        $products = Product::take(5)->latest()->get();
        return view('admin.index', compact('categoriesCount', 'productsCount','products'));
    }
}
