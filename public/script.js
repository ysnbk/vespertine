function updateTotal() {
  const items = document.querySelectorAll('.cart-item');
  let total = 0;
  items.forEach(item => {
  const input = item.querySelector('input[type="number"]');
  const price = parseFloat(item.querySelector('.item-price').textContent);
  const qty = parseInt(input.value) || 1;
  const itemTotal = price * qty;
  console.log('itemTotal',itemTotal)
  // item.querySelector('.item-price').textContent = `$${itemTotal}`;
  total += itemTotal;
  });
  document.getElementById('cartTotal').textContent = `$${total}`;
  }
  
  
  document.querySelectorAll('.cart-item input').forEach(input => {
  input.addEventListener('change', updateTotal);
  });
updateTotal()