@extends('layouts.app')

@section('content')
<header>
        <div class="hero">
            <div class="hero-text">
                <h2> Sweet Home </h2>
                <p>Getting the best and comfortable home <br>
                 materials for your FAMILY..</p>
                <div class="getstarted">
                        <a href="/register">Get Started</a>
                </div>
            </div>

        </div>
</header>
<main class="products_cat">
<div class="group">
    <h1>Featured Products</h1>
<div class="products">
    @foreach ($products as $product)
    <div class="product">
       <a href="/product/{{$product->id}}"> <img src="/storage/product_images/{{$product->product_img}}" alt=""></a>
        <div class="price"> {{$product->product_name}}<span class="price">N {{$product->price}} </span></div>
    </div>


    @endforeach
</div>
</div>
<div class="group">
    <h1>Comfortable Beds</h1>
<div class="products">
        @foreach ($products as $product)
        @if ($product->category== 'comfort beds')
        <div class="product">
            <a href="/product/{{$product->id}}"> <img src="/storage/product_images/{{$product->product_img}}" alt=""></a>
            <div class="price"> {{$product->product_name}}<span class="price">N {{$product->price}} </span></div>
        </div>
    @endif
    @endforeach
</div>
</div>
<div class="group">
    <h1>Great Emperor Beds</h1>
    <div class="products">
            @foreach ($products as $product)
            @if ($product->category== 'great emperor beds')
            <div class="product">
                <a href="/product/{{$product->id}}"> <img src="/storage/product_images/{{$product->product_img}}" alt=""></a>
                <div class="price"> {{$product->product_name}}<span class="price">N {{$product->price}} </span></div>
            </div>
        @endif
        @endforeach
    </div>
</div>
</main>



@endsection
