@extends('layouts.app')
<script>
window.onload = function() {
    var total = document.getElementById('total');
    var tot = document.getElementById('tot');
    var each_price = document.getElementsByClassName('each-price');
    var price = 0;
   for (let i = 0; i < each_price.length; i++) {
       const element = each_price[i];
        price += parseInt(element.innerHTML);
   }
   tot.innerHTML = 'N '+price;
   total.value = price;
}
</script>
@section('content')
<div class="checkout flex">
<div class="checkout-left">
<div class="inside">
    <h3>Order Summary</h3>
    @foreach ($carts as $cart)
    <div class="each">
        <div class="each-top">
                <img src="/storage/product_images/1.jpeg" alt="" width="80">
                <div class="each-right">
                    <h4>{{$cart->product_name}}</h4>
                    <p>N {{$cart->price / $cart->qty}}</p>
                </div>
                <div class="big-price">
                    <h3>N <span class="each-price">{{$cart->price}}</span></h3>
                </div>
        </div>
    <div class="qty">
        Quantity <input type="number" disabled value="{{$cart->qty}}" style="border:none; width:30px">
    </div>
</div>
@endforeach

<div class="total flex">
        <h4>Order Total</h4>
        <h2 id="tot" style="font-weight:800;"></h2>



</div>
</div>
</div>
<div class="checkout-right">
<div class="right-top">
    <h1>Billing Info</h1>
</div>
<div class="right-split flex">
    <div class="split flex">
        <h3>1. Billing Address</h3>
        {!! Form::open(['action'=>'CheckoutsController@store']) !!}
        <input type="hidden" name="total" id="total">
        <div class="checkout-form-group flex">
            {!! Form::label('name', 'FULL NAME ') !!}
            {!! Form::text('name') !!}
            {!! Form::label('address', 'ADDRESS') !!}
            {!! Form::text('address') !!}
            {!! Form::label('city', 'CITY') !!}
            {!! Form::text('city') !!}
            <div class="flex">
                <div class="side">
                        {!! Form::label('state', 'STATE') !!}
                        {!! Form::text('state') !!}

                </div>
                <div class="side">
                        {!! Form::label('zip', 'ZIP CODE') !!}
                        {!! Form::text('zip') !!}

                </div>
            </div>

        </div>
    </div>
    <div class="split">
            <h3>2. Credit Card Info</h3>
            <div class="checkout-form-group flex">
                {!! Form::label('name_on_card', 'NAME ON CARD') !!}
                {!! Form::text('name_on_card') !!}
                {!! Form::label('card_no', 'CARD NUMBER') !!}
                {!! Form::number('card_no') !!}
                <div class="flex">
                    <div class="side">
                            {!! Form::label('cvv', 'CVV NUMBER') !!}
                            {!! Form::text('cvv') !!}

                    </div>
                    <div class="side">
                            {!! Form::label('exp_month', 'EXP MONTH') !!}
                            {!! Form::text('exp_month') !!}

                    </div>
                    <div class="side">
                            {!! Form::label('exp_day', 'EXP DAY') !!}
                            {!! Form::text('exp_day') !!}

                    </div>
                </div>

            </div>
           <div class="btn-group">
                {!! Form::submit('CHECKOUT',['class'=>'checkout-btn btn-primary']) !!}
            </div>
        </div>
{!! Form::close() !!}
</div>
</div>
</div>




@endsection
