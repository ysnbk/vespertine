function updateTotal() {
  const items = document.querySelectorAll('.cart-item');
  let total = 0;
  items.forEach(item => {
    const input = item.querySelector('input[type="number"]');
    const price = parseFloat(item.querySelector('.item-price').textContent);
    const qty = parseInt(input.value) || 1;
    input.value = qty < 1 ? 1 : qty;
    const itemTotal = price * qty;
    total += itemTotal;
  });
  document.getElementById('cartTotal').textContent = `$${total.toFixed(2)}`;
}

document.querySelectorAll('.cart-item input').forEach(input => {
  input.addEventListener('change', updateTotal);
});
updateTotal()



