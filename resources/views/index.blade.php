@extends("layout")
    @section('title')
    {{ $category?$category:"vespertine"}} perfumes
    @endsection
    @section("content")
    <x-header/>
    <x-navbar/>
    <section class="main-content">

        <div class="filter-nav">
            <a class="{{ request()->is('shop') ? 'active' : '' }}" href="{{ url("/shop") }}?search={{ request("search") }}">All</a>
            <a class="{{ request()->is('shop/men') ? 'active' : '' }}" href="{{ url("/shop/men")}}?search={{ request("search") }}">Men</a>
            <a class="{{ request()->is('shop/women') ? 'active' : '' }}" href="{{ url("/shop/women")}}?search={{ request("search") }}">women</a>
            <div class="filter-search">
                <form action={{ url()->current() }} method="get">
                    <input type="text" placeholder="search by name" value="{{ request("search") }}" name="search">
                    <button>search</button>
                </form>
            </div>
        </div>
        <div class="product">
            @if ($products->count()>0)
            @foreach ($products as $product)
            
            <div class="product-card {{ $product->category }}" id={{ $product->id }}>
                <img loading="lazy" src={{ url($product->image) }} alt={{ $product->slug }}>
                <h3 data-name={{ $product->name}}>{{ $product->name}}</h3>
                <h5>{{ $product->category}}</h5>
                <p>{{ $product->description}}</p>
                <h4 data-price={{ $product->price}}>{{ $product->price}} <del style='font-size:10px;color:red;'>   {{ $product->old_price }}</del></h4>
            
                <a href={{ url('add-to-cart',$product->slug) }} class="add-to-cart">Add To Cart</a>
            </div>
            @endforeach
            @else
  <p class="text-center">No Products.</p>
  @endif
            @auth
            
        @if (auth()->user()->cart()->count() > 0)
        <button class="btn" id="cart-icon"data-bs-toggle="modal" data-bs-target="#cart">
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