@extends('layouts.app')

@section('content')
<h2 style="color:#8a8a8a; padding:20px;">CART</h2>
@if (count($cart) > 0)
    <table  border="1">
        <thead>
            <td>Product Name</td>
            <td>Quantity</td>
            <td>Price</td>
            <td></td>
        </thead>
        <tbody>
                @foreach ($cart as $cartItem)
            <tr>
                <td>{{$cartItem->product_name}}</td>
                <td>{{$cartItem->qty}}</td>
                <td>N {{$cartItem->price }}</td>
                <td>
                    {!! Form::open(['action'=>['CartsController@destroy',$cartItem->id],'method'=>'POST']) !!}
                        {!! Form::hidden('_method', 'DELETE') !!}
                        {!! Form::submit('Drop', ['class'=> 'dash_btn danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
    @endforeach
        </tbody>
    </table>
    {!! Form::open(['action'=>'CheckoutsController@index','method'=>'GET', 'class'=>'right']) !!}
    {!! Form::submit('Checkout', ['class'=>'btn btn-primary ']) !!}
    {!! Form::close() !!}

@else
<h2>Cart is empty</h2>
@endif


@endsection
