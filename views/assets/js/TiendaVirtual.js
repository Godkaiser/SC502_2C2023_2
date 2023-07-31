// JavaScript para el carrito de compras
let cartItems = [];
let cartTotal = 0;

function addToCart(itemName, itemPrice) {
  let existingItem = cartItems.find(item => item.name === itemName);

  if (existingItem) {
    // El producto ya existe en el carrito, se suma el precio y la cantidad
    existingItem.price += itemPrice;
    existingItem.quantity++;
  } else {
    // El producto no existe en el carrito, se agrega como un nuevo elemento
    const newItem = {
      name: itemName,
      price: itemPrice,
      quantity: 1
    };
    cartItems.push(newItem);
  }

  cartTotal += itemPrice;
  updateCart();

}


function updateCart() {
  const cartItemsList = document.getElementById('cart-items');
  const cartTotalElement = document.getElementById('cart-total');
  const cartCountElement = document.getElementById('cart-count');


  cartItemsList.innerHTML = '';
  cartItems.forEach(item => {
    const listItem = document.createElement('li');
    listItem.textContent = `${item.name} (${item.quantity}) - &#8353;${item.price}`;
    cartItemsList.appendChild(listItem);
  });

  cartTotalElement.textContent = cartTotal;
  cartCountElement.textContent = cartItems.length;
}

function realizarCompra() {
  window.location.href = "compra.html";
}


function Abrir_Carrito() {
  const carrito = document.getElementById('carrito');
  carrito.style.display = 'block';
}

function Cerrar_Carrito() {
  const carrito = document.getElementById('carrito');
  carrito.style.display = 'none';
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
