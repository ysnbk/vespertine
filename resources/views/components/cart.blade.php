@auth
    

<div class="modal fade" id="cart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">
            {{ Auth::user()->name }}'s cart</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
<div class="cart-container">
  @php
    $cartItems = auth()->user()->cart()->with('product')->latest()->get();
  @endphp
  @if($cartItems->count() > 0)
    

  @foreach ($cartItems as $item)
  <div class="cart-item">
    <img src={{ $item->product->image }} alt={{ $item->product->slug }} />
    <div class="item-details">
      <h4>{{ $item->product->name}}</h4>
      <p>50ml Eau de Parfum</p>
    </div>
    <div class="item-quantity">
      <label for="qty1">Qty:</label>
      <input type="number" id="qty1" name="quantity" min="1" value={{ $item->quantity }} />
    </div>
    <div class="item-price">{{ $item->product->price }}</div>
    <form action={{ route('deleteFromCart',$item->id) }} method="post">
      @csrf
      <button class="remove-btn">X</button>
    </form>
  </div>

  @endforeach
  @else
  <p class="text-center">Your cart is empty.</p>
  @endif
  <div class="cart-summary">
    <p>Total: <strong id="cartTotal">$</strong></p>
    <button class="checkout-btn">Proceed to Checkout</button>
  </div>
</div>
  </div>
  </div>
  </div>
  </div>
  @endauth