let cart = [];
let total = 0;

function addToCart(itemName, itemPrice) {
    cart.push({ name: itemName, price: itemPrice });
    total += itemPrice;
    updateCart();
}

function updateCart() {
    const cartItemsList = document.getElementById("cart-items");
    const cartTotal = document.getElementById("cart-total");
    cartItemsList.innerHTML = "";
    cart.forEach(item => {
        const li = document.createElement("li");
        li.textContent = `${item.name} - Rs.${item.price}`;
        cartItemsList.appendChild(li);
    });
    cartTotal.textContent = `Rs.${total}`;
}

