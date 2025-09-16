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
    <img src={{ url($item->product->image) }} alt={{ $item->product->slug }} />
    <div class="item-details">
      <h4>{{ $item->product->name}}</h4>
      <p>50ml Eau de Parfum</p>
    </div>
    <div class="item-quantity">
      <label for="qty{{ $item->product->id }}">Qty:</label>
      <button class="qty-btn" data-id={{ $item->product->id }} data-action="decrease">-</button>
      <input type="number" disabled id="qty{{ $item->product->id }}" name="quantity" min="1" value={{ $item->quantity }} />
      <button class="qty-btn" data-id={{ $item->product->id }} data-action="increase">+</button>

    </div>
    <div class="item-price">{{ $item->product->price }}</div>
      <button data-id="{{ $item->id }}" class="remove-btn">X</button>
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
  <script src={{ url('script.js') }}></script>
  <script>
    document.querySelectorAll('.qty-btn').forEach(btn => {
  btn.addEventListener('click', () => {

    fetch("{{ route('quantityUpdate') }}",{
      method:"POST",
      headers:{
        "Content-type":"application/json",
        "X-CSRF-TOKEN":"{{ csrf_token() }}"
      },
      body: JSON.stringify({
        action:btn.dataset.action,
        productId:btn.dataset.id
      })
    })
    .then(res => res.json())
    .then(data => {
      if(data.success){
        document.querySelector(`#qty${data.itemId}`).value=data.quantity
        updateTotal()
      }
    })
    
  
  })
})
// remove from cart
const removeBtn = document.querySelectorAll(".remove-btn")
removeBtn.forEach(btn=>{
  btn.addEventListener("click",()=>{
    fetch("deleteFromCart",{
      method:"POST",
      headers:{
        "Content-type":"application/json",
        "X-CSRF-TOKEN":"{{ csrf_token() }}"
      },
      body:JSON.stringify({
        itemId:btn.dataset.id
      })
    }).then(res =>res<json())
  })
})
  </script>
  @endauth