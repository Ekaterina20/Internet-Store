<?php

namespace App\Http\Controllers\Site;
use App\Product;
use Illuminate\Support\Str;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsSiteController extends Controller
{

    public function index ()
    {
        $products=Product::latest()->get(); /* забирает данные из БД таблицы*/
        return view('site.products.index', compact('products'));
    }
}

