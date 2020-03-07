<?php

namespace App\Http\Controllers\Admin;
use App\Product;
use Illuminate\Support\Str;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    protected $categories;

    public function __construct()
    {
        $this->categories = Category::pluck('name', 'id');
    }

    public function index ()
    {
       $products=Product::latest()->get(); /* забирает данные из БД таблицы*/
        return view('admin.products.index', compact('products'));
    }
    public function create ()
    {
        $categories = $this->categories;
        return view('admin.products.create', compact('categories'));
    }
    public function store (Request $request)
    {
        $messages =[

            'unique' => 'Такой продукт уже существует'
        ];

        /*проверка валидация*/
        $this->validate($request, [

                'name'=> 'required|unique:products', /*имя обязательно и уникально*/
                'category_id'=>'required',
                'image'=>'required|image',/*картинка обязательна, типа image*/
                'short_des'=>'required',
                'price'=>'required|numeric',

            ], $messages);

        /*сохранение картинки в папку на сервере*/

        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $imagePath = $image->storeAs('products', $imageName);

        Product::create([

            'name'=>$request['name'],
            'category_id'=>$request['category_id'],
            'short_des'=> $request['short_des'],
            'image'=> $imagePath, /*путь к картинке сохраняем в БД*/
            'price'=>$request['price'],

            ]);
        return redirect('admin/products')->with('status','Продукт создан успешно');
    }

    public function edit (Product $product)
    {
        $categories = $this -> categories;
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update (Product $product, Request $request)
    {
        $messages =[

            'unique' => 'Такой продукт уже существует'
        ];

        /*проверка валидация*/
        $this->validate($request, [

            'name'=> 'required|unique:products', /*имя обязательно и уникально*/
            'category_id'=>'required',
            'image'=>'required|image',/*картинка обязательна, типа image*/
            'short_des'=>'required',
            'price'=>'required|numeric',

        ], $messages);

        /*сохранение картинки в папку на сервере*/

        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $imagePath = $image->storeAs('products', $imageName);

        $product->update([

            'name'=>$request['name'],
            'category_id'=>$request['category_id'],
            'slug'=>Str::slug($request['name']),
            'image'=> $imagePath, /*путь к картинке сохраняем в БД*/
            'price'=>$request['price'],
            'short_des'=>$request['short_des'],

        ]);
        return redirect('admin/products')->with('status','Продукт изменен успешно');
    }

    public function delete (Product $product)
    {
        /*удаляем картинку из папки*/
       /* Storage::delete ($category->image);*/
        /*удаляем саму категорию*/
        $product->delete();
        return redirect('admin/products')->with('status','Продукт удален успешно');
    }

}

