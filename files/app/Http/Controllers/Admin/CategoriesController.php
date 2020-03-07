<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Str;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function index ()
    {
       $categories=Category::latest()->get(); /* забирает данные из БД таблицы*/
        return view('admin.categories.index', compact('categories'));
    }
    public function create ()
    {
        return view('admin.categories.create');
    }
    public function store (Request $request)
    {
        $messages =[

            'unique' => 'Такая категория уже существует'
        ];

        /*проверка валидация*/
        $this->validate($request, [

                'name'=> 'required|unique:categories', /*имя обязательно и уникально*/
                'image'=>'required|image' /*картинка обязательна, типа image*/

            ], $messages);

        /*сохранение картинки в папку на сервере*/

        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $imagePath = $image->storeAs('categories', $imageName);

        Category::create([

            'name'=>$request['name'],
            'slug'=>Str::slug($request['name']),
            'image'=> $imagePath /*путь к картинке сохраняем в БД*/

            ]);
        return redirect('admin/categories')->with('status','Категория создана успешно');
    }

    public function edit (Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update (Category $category, Request $request)
    {
        $messages =[

            'unique' => 'Такая категория уже существует'
        ];

        /*проверка валидация*/
        $this->validate($request, [

            'name'=> 'required|unique:categories', /*имя обязательно и уникально*/
            'image'=>'required|image' /*картинка обязательна, типа image*/

        ], $messages);

        /*сохранение картинки в папку на сервере*/

        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $imagePath = $image->storeAs('categories', $imageName);

        $category->update([

            'name'=>$request['name'],
            'slug'=>Str::slug($request['name']),
            'image'=> $imagePath /*путь к картинке сохраняем в БД*/

        ]);
        return redirect('admin/categories')->with('status','Категория изменена успешно');
    }

    public function delete (Category $category)
    {
        /*удаляем картинку из папки*/
       /* Storage::delete ($category->image);*/
        /*удаляем саму категорию*/
        $category->delete();
        return redirect('admin/categories')->with('status','Категория удалена успешно');
    }

}

