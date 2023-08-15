// Add to Cart functionality
const addToCartButtons = document.querySelectorAll('.add-to-cart');
const cartTotalSpan = document.getElementById('cart-total');
let cartTotal = 0;

addToCartButtons.forEach(button => {
  button.addEventListener('click', addToCart);
});

function addToCart(event) {
  const price = parseFloat(event.target.getAttribute('data-price'));
  cartTotal += price;
  updateCartTotal();
}

function updateCartTotal() {
  cartTotalSpan.textContent = `$${cartTotal.toFixed(2)}`;
}

  const cart = [];

  function addToCart(button) {
    const price = parseFloat(button.getAttribute('data-price'));
    const productName = button.getAttribute('data-name');
    
    const existingItem = cart.find(item => item.productName === productName);
    if (existingItem) {
      existingItem.quantity++;
    } else {
      cart.push({ productName, price, quantity: 1 });
    }
    
    localStorage.setItem('cart', JSON.stringify(cart)); // Store in local storage
  }