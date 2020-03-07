@extends('admin.layout')

@section ('title', 'Категории')

@section('content')
    @if(session('status'))
        <p class="alert alert-success"> {{session('status')}} </p>
        @endif
    {{--кнопка--}}
    <a class="btn btn-primary admin-btn-create" href="{{url('admin/categories/create')}}">Добавить категорию</a>

    <div class="card">
        @if ($categories->first())
            <table class="table">
                <thead>
                <tr>
                    <th>Название</th>
                    <th>Изображение</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->name}}</td>
                        {{--чтобы отобразилась картинка, а не путь к ней--}}
                        <td>
                            {{--$results = DB::select('select * from users where id = ?', [1]);--}}
                            {{--<p><a href="{{url("admin/products/{$product->category_id}")}}"><img src="{{url("files/storage/app/{$category->image}")}}"
                                 class="img-fluid admin-img" width="100" height="100"></a></p>
--}}
                            <img src="{{url("files/storage/app/{$category->image}")}}"
                                 class="img-fluid admin-img" width="100" height="100">

                        </td>
                        {{--редактирование--}}
                        <td>
                            <a href="{{url("admin/categories/{$category->slug}/edit")}}">
                                 <i class=" fa fa-pencil" aria-hidden="true"></i>
                            </a>

                            {{--чтобы нельзя было удалить категорию с адресной строки
                            только с админки, делаем форму--}}

                            {!! Form::open(['url'=>"admin/categories/{$category->slug}/delete", 'method'=> 'delete', 'class'=> 'd-inline-block']) !!}
                                <button type="submit" class="ml-3 form-button" href="{{url("admin/categories/{$category->slug}/delete")}}">
                                     <i class=" fa fa-trash" aria-hidden="true"></i>
                                 </button>
                            {!! Form::close() !!}


                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
        <p class="alert alert-info"> Категорий не существует </p>
            @endif
        </div>


    @endsection