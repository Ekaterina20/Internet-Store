<?php

namespace App\Http\Controllers\Site;
use App\Product;
use Illuminate\Support\Str;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CategoriesSiteController extends Controller
{
    public function index ()
    {
        $categories = Category::latest()->get(); /* забирает данные из БД таблицы*/
        return view('site.categories.index', compact('categories'));
    }

}
