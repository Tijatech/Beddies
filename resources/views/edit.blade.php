@extends('layouts.app')

@section('content')
{!! Form::open(['action'=>['ProductsController@update',$product->id],'method'=>'POST', 'class'=>'edit-form']) !!}
{!! Form::hidden('_method', 'PUT') !!}
<h3 style="color:#8a8a8a; text-align:center;padding:10px 0;">EDIT PRODUCT</h3>
<div>{!! Form::label('product_name','Product Name') !!}{!! Form::text('product_name',$product->product_name) !!}</div>
<div>{!! Form::label('price','Price (N)') !!}{!! Form::text('price',$product->price) !!}</div>
<div>{!! Form::label('category','Category') !!}
    <select name="category" id="">
        <option value="{{$product->category}}">{{$product->category}}</option>
       <option value="@if ($product->category == 'comfort beds') great emperor beds @else comfort beds @endif">@if ($product->category == 'comfort beds') great emperor beds @else comfort beds @endif</option>
    </select>
</div>
{!! Form::submit('Update Product',['class'=>'btn']) !!}
{!! Form::close() !!}
@endsection
