@extends('layouts.app')

@section('content')
<div class="container">
    <div >
        <div class="">
            <div class="card">
                <div class="card-header"><h2 style="color:grey; padding:10px;">Dashboard</h2></div>
<hr>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (count($users) > 1)
                        <h2 style="color:#8a8a8a; ">Users Table</h2>
                        <table border="1">
                            <thead>
                                <td>Username</td>
                                <td>Email</td>
                                <td>Access</td>
                                <td></td>
                                <td></td>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                @if ($user->id !== auth()->user()->id)
                                <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        {!! Form::open(['action'=>['UsersController@update',$user->id],'method'=>'GET']) !!}
                                        <td><select name="auth" id="">
                                            <option value="{{$user->auth}}">@if ($user->auth == 0) Denied @else Granted @endif</option>
                                            <option value="@if ($user->auth == 0) 1 @else 0 @endif">@if ($user->auth == 0) Grant @else Deny @endif</option>
                                        </select></td>
                                        <td>{!! Form::submit('Update',['class'=>'dash_btn regular']) !!} </td>
                                        {!! Form::close() !!}


                                        <td>
                                            {!! Form::open(['action'=>['UsersController@destroy',$user->id],'method'=>'POST']) !!}
                                            {!! Form::hidden('_method','DELETE') !!}
                                            {!! Form::submit('Delete', ['class'=>'dash_btn danger']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endif

                                @endforeach

                            </tbody>
                        </table>
                        @else
                        <h4 style="color:#8a8a8a; text-align:center;">No Other User Was Registered</h4>
                        @endif
                        <h2 style="color:#8a8a8a; padding:0 10px;">Products Table <span  style="float:right; "><a class="create_btn" href="/dashboard/create">Create New Product</a></span></h2>
                        <table border="1">
                            <thead>
                                <td>Product Name</td>
                                <td>Price</td>
                                <td>Category</td>
                                <td>Created on</td>
                                <td></td>
                                <td></td>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)

                                <tr>
                                    <td>{{$product->product_name}}</td>
                                    <td>N{{$product->price}}</td>
                                    <td>{{$product->category}}</td>
                                    <td>{{$product->created_at}}</td>
                                    <td>
                                            {!! Form::open(['action'=>['DashboardController@edit',$product->id],'method'=>'GET']) !!}
                                            {!! Form::submit('Edit', ['class'=>'dash_btn regular']) !!}
                                            {!! Form::close() !!}

                                    </td>
                                    <td>
                                            {!! Form::open(['action'=>['DashboardController@destroy',$product->id],'method'=>'POST']) !!}
                                            {!! Form::hidden('_method','DELETE') !!}
                                            {!! Form::submit('Delete', ['class'=>'dash_btn danger']) !!}
                                            {!! Form::close() !!}

                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <h2 style="color:#8a8a8a;">Orders Table</h2>
                        <table border="1">
                            <thead>
                                <td>Product Name</td>
                                <td>Price</td>
                                <td>Quantity</td>
                                <td>Created on</td>
                                <td>User</td>
                                <td>User Email</td>
                                <td>Status</td>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)

                                <tr>
                                    <td>{{$order->product_name}}</td>
                                    <td>N{{$order->price}}</td>
                                    <td>{{$order->qty}}</td>
                                    <td>{{$order->created_at}}</td>
                                    <td>{{auth()->user($order->user_id)['name']}}</td>
                                    <td>{{auth()->user($order->user_id)['email']}}</td>

                                    <td><a class="btn dash_btn">Delivered</a>  </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
