@extends('layout')
@section('title',"vespertine perfumes")
@section('content')
<x-header/>
    <x-navbar/>
    <section class="hero">
        <h2>Experience the Essence of the Night</h2>
    </section>
    
    <section class="main-content">
        <h2>Our Bestsellers</h2>
        
        <div class="product ">
            @foreach ($products as $product)
            <div class="product-card {{ $product->category }}">
                <img loading="lazy" class="card-img-top" src={{ url($product->image) }} alt={{ $product->slug }}>
                <h3>{{ $product->name}}</h3>
                <h5>{{ $product->category}}</h5>
                <p>{{ $product->description}}</p>
                <h4>{{ $product->price}} <del style='font-size:10px;color:red;'>   {{ $product->old_price }}</del></h4>
                <a href={{ url('add-to-cart',$product->slug) }} class="add-to-cart">Add To Cart</a>
            </div>
            @endforeach
            @auth
            
            @if (auth()->user()->cart()->count() > 0)
            <button class="btn" id="cart-icon" data-bs-toggle="modal" data-bs-target="#cart">
                <img src="https://cdn-icons-png.flaticon.com/512/1170/1170576.png" alt="Cart" />
                <span class="badge text-bg-danger rounded-circle">{{ auth()->user()->cart()->count() }}</span>
            </button>
            @endif
            @endauth
            
        </div>
    </section>
<x-cart/>
<x-footer/>
@endsection