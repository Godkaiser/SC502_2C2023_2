let cartItems = [];
let cartTotal = 0;

function addToCart(productName, price) {
  cartItems.push({ name: productName, price: price });
  cartTotal += price;
  
  updateCart();
}

function updateCart() {
  const cartItemsElement = document.getElementById('cart-items');
  const cartTotalElement = document.getElementById('cart-total');

  cartItemsElement.innerHTML = '';
  cartItems.forEach(item => {
    const li = document.createElement('li');
    li.textContent = `${item.name} ${item.price}`;
    cartItemsElement.appendChild(li);
  });

  cartTotalElement.textContent = cartTotal;
}

function Abrir_Nav() {
    document.getElementById("main").style.marginLeft = "10%";
    document.getElementById("miSidebar").style.width = "10%";
    document.getElementById("miSidebar").style.display = "block";
    document.getElementById("AbrirNav").style.display = 'none';
}
function Cerrar_Nav() {
    document.getElementById("main").style.marginLeft = "0%";
    document.getElementById("miSidebar").style.display = "none";
    document.getElementById("AbrirNav").style.display = "inline-block";
}
