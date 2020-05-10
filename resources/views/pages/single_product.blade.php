@extends('layouts.app')

@section('content')
<main id="single">
    {!! Form::open(['action'=>['CartsController@store',$product->id],'method'=>'POST']) !!}
    <div class="single_product">

        <img src="/storage/product_images/{{ $product->product_img }}" alt="">
        <div class="features">
            <div> {!! Form::text('product_name', $product->product_name, ['disabled', 'style'=>'width:auto;border:none;font-size:17px;']) !!}</div>
            <div>Qty: {!! Form::number('qty', 1,['min'=>1]) !!} </div>
            {!! Form::hidden('product_id', $product->id) !!}
            <div>Price: {!! Form::text('price', 'N '.$product->price, ['disabled']) !!} </div>
            <div>{!! Form::submit('Add to cart', ['class'=>'add']) !!}</div>

        </div>

    </div>
    {!! Form::close() !!}
    <div class="description">
        <h1>Description</h1>
        <p>{{$product->description}}</p>
    </div>
</main>




@endsection
