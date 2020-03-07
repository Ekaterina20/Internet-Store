@extends('site.layout')

@section ('title', 'Категории')

@section('content')
    @if(session('status'))
        <p class="alert alert-success"> {{session('status')}} </p>
        @endif

    <div class="card">
        @if ($categories->first())
            <table class="table">
                <thead>
                <tr>
                    <th>Название</th>
                    <th>Изображение</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->name}}</td>
                        {{--чтобы отобразилась картинка, а не путь к ней--}}
                        <td>
                            {{--$results = DB::select('select * from products where id = ?', [1]);--}}
                            {{--<p><a href="{{url("admin/products/{$product->category_id}")}}"><img src="{{url("files/storage/app/{$category->image}")}}"
                                 class="img-fluid admin-img" width="100" height="100"></a></p>--}}

                            <img src="{{url("files/storage/app/{$category->image}")}}"
                                 class="img-fluid admin-img" width="100" height="100">

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>

    @endsection