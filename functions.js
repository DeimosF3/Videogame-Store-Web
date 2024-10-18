
window.onload = () => {

    const cartSidebar = document.getElementById('cart-sidebar');
    const closeCartButton = document.querySelector('.close-cart');
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    const cartItemsContainer = document.querySelector('.cart-items');
    const totalPriceElement = document.getElementById('total-price');
    const botonSVG = document.querySelector('.carrito');
    let cartItems = [];
    let totalPrice = 0;


    function openCart() {
        cartSidebar.classList.add('open');
    }


    function closeCart() {
        cartSidebar.classList.remove('open');
    }


    function addToCart(e) {
        const productName = e.target.getAttribute('data-product');
        const productPrice = parseFloat(e.target.getAttribute('data-price'));

        const cartItem = document.createElement('div');
        cartItem.classList.add('cart-item');
        cartItem.innerHTML = `<p>${productName} - $${productPrice.toFixed(2)}</p>`;
        cartItemsContainer.appendChild(cartItem);


        totalPrice += productPrice;
        totalPriceElement.textContent = `$${totalPrice.toFixed(2)}`;

        openCart();
    }


    addToCartButtons.forEach(button => {
        button.addEventListener('click', addToCart);
    });
    botonSVG.addEventListener('click', openCart);
    closeCartButton.addEventListener('click', closeCart);
};

