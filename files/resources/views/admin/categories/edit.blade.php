@extends('admin.layout')

@section ('title', 'Изменение категории')

@section('content')

    <div class="card">
        <div class="card-body">

            {!! Form::model($category, ['url'=>"admin/categories/{$category->slug}/edit", 'method'=>'post', 'class'=>'form-horizontal', 'files'=>true]) !!}
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

            <img src="{{url("files/storage/app/{$category->image}")}}" class="img-fluid my-4">

            <div class="form-group row">
                {!!Form::label('image', 'Изображение', ['class' => 'col-sm-10 form-control-label'])!!}
                {{--@if($errors->has('name'))
                    <div class="invalid-feedback">{{$errors->first('image')}}</div>
                @endif--}}
                <div class="col-sm-10">
                    {!!Form::file('image', ['class'=> 'form-control'] )!!}
                </div>
            </div>

            {!!Form::submit('Изменить', ['class'=> 'btn btn-primary'])!!}

            {!!Form::close()!!}
        </div>
    </div>

@endsection