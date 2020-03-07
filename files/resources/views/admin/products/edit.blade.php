@extends('admin.layout')

@section ('title', 'Изменение продукта')

@section('content')

    <div class="card">
        <div class="card-body">

            {!! Form::model($product, ['url'=>"admin/products/{$product->slug}/edit", 'method'=>'post', 'class'=>'form-horizontal', 'files'=>true]) !!}
            <div class="form-group row">
                {!!Form::label('name', 'Наименование', ['class'=>'col-sm-2 form-control-label'])!!}
                <div class="col-sm-10">
                    {!!Form::text('name', null, ['class'=> $errors->has('name') ? 'form-control is-invalid':'form-control'])!!}
                    @if($errors->has('name'))
                        <div class="invalid-feedback">{{$errors->first('name')}}</div>
                    @endif
                </div>
            </div>

            {{--чтобы отобразить картинку--}}

            <img src="{{url("files/storage/app/{$product->image}")}}" class="img-fluid my-4">

            <div class="form-group row">
                {!!Form::label('image', 'Изображение', ['class' => 'col-sm-10 form-control-label'])!!}
                {{--@if($errors->has('name'))
                    <div class="invalid-feedback">{{$errors->first('image')}}</div>
                @endif--}}
                <div class="col-sm-10">
                    {!!Form::file('image', ['class'=> 'form-control'] )!!}
                </div>
            </div>

            <div class="form-group row">
                {!!Form::label('category_id', 'Категория', ['class'=>'col-sm-2 form-control-label'])!!}
                <div class="col-sm-10">
                    {!!Form::select('category_id',$categories, null, ['class'=> $errors->has('category_id') ? 'form-control is-invalid':'form-control'])!!}
                    @if($errors->has('category_id'))
                        <div class="invalid-feedback">{{$errors->first('category_id')}}</div>
                    @endif
                </div>
            </div>

                    <div class="form-group row">
                        {!!Form::label('price', 'Цена', ['class'=>'col-sm-2 form-control-label'])!!}
                        <div class="col-sm-10">
                            {!!Form::text('price', null, ['class'=> $errors->has('price') ? 'form-control is-invalid':'form-control'])!!}
                            @if($errors->has('price'))
                                <div class="invalid-feedback">{{$errors->first('price')}}</div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        {!!Form::label('short_des', 'Описание', ['class'=>'col-sm-2 form-control-label'])!!}
                        <div class="col-sm-10">
                            {!!Form::textarea('short_des', null, ['class'=> $errors->has('short_des') ? 'form-control is-invalid':'form-control'])!!}
                            @if($errors->has('short_des'))
                                <div class="invalid-feedback">{{$errors->first('short_des')}}</div>
                            @endif
                        </div>
                    </div>

            {!!Form::submit('Изменить', ['class'=> 'btn btn-primary'])!!}

            {!!Form::close()!!}
        </div>
    </div>

@endsection