@extends('layouts.app')

@section('content')
{!! Form::open(['action'=>['DashboardController@store'],'method'=>'POST', 'class'=>'edit-form', 'enctype'=> 'multipart/form-data']) !!}
<h3 style="color:#8a8a8a; text-align:center;padding:10px 0;">CREATE PRODUCT</h3>
<div>{!! Form::label('product_name','Product Name') !!}{!! Form::text('product_name','') !!}</div>
<div>{!! Form::label('price','Price (N)') !!}{!! Form::number('price','') !!}</div>
<div>{!! Form::label('category','Category') !!}
    <select name="category" id="">
        <option value="great emperor beds">great emperor beds</option>
       <option value="comfort beds">comfort beds</option>
    </select>
</div>
<div>
    {!! Form::label('description','Description') !!}
    {!! Form::textarea('description') !!}
</div>
<div>
    {!! Form::label('product_img','Product Image') !!}
    {!! Form::file('product_img') !!}
</div>
{!! Form::submit('Upload Product',['class'=>'btn']) !!}
{!! Form::close() !!}
@endsection
