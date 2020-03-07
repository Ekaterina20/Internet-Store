@extends('site.layout')

@section ('title', 'Продукты')

@section('content')
    @if(session('status'))
        <p class="alert alert-success"> {{session('status')}} </p>
        @endif
    {{--кнопка--}}
    {{--<a class="btn btn-primary admin-btn-create" href="{{url('site/products/create')}}">Добавить продукт</a>--}}
    <div class="card">
        @if ($products->first())
            <table class="table">
                <thead>
                <tr>
                    <th>Название</th>
                    <th>Категория</th>
                    <th>Цена</th>
                    <th>Описание</th>
                    <th>Изображение</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->name}}</td>
                        <td>{{$product->category->name}}</td>
                        <td>{{$product->price}} сом</td>
                        <td>{{$product->short_des}}</td>
                        {{--чтобы отобразилась картинка, а не путь к ней--}}
                        <td>
                            <img src="{{url("files/storage/app/{$product->image}")}}"
                                 class="img-fluid admin-img" width="100" height="100">
                        </td>
                        {{--редактирование--}}
                       {{-- <td>
                            <a href="{{url("admin/products/{$product->slug}/edit")}}">
                                 <i class=" fa fa-pencil" aria-hidden="true"></i>
                            </a>

                            --}}{{--чтобы нельзя было удалить категорию с адресной строки
                            только с админки, делаем форму--}}{{--

                            {!! Form::open(['url'=>"admin/products/{$product->slug}/delete", 'method'=> 'delete', 'class'=> 'd-inline-block']) !!}
                                <button type="submit" class="ml-3 form-button" href="{{url("admin/products/{$product->slug}/delete")}}">
                                     <i class=" fa fa-trash" aria-hidden="true"></i>
                                 </button>
                            {!! Form::close() !!}


                        </td>
                    </tr>--}}
                    @endforeach
                </tbody>
           {{-- </table>
            {{$products->links('vendor.pagination.bootstrap-4')}}--}}
           {{-- @else
        <p class="alert alert-info"> Продукта пока не существует </p>--}}
            @endif
        </div>


    @endsection