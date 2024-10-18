window.onload = () => {
    const cartSidebar = document.getElementById('cart-sidebar');
    const closeCartButton = document.querySelector('.close-cart');
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    const cartItemsContainer = document.querySelector('.cart-items');
    const totalPriceElement = document.getElementById('total-price');
    const botonSVG = document.querySelector('.carrito');
    let cartItems = [];
    let totalPrice = 0;

    // Función para actualizar la UI del carrito
    function updateCartUI() {
        cartItemsContainer.innerHTML = ''; // Limpiar el contenido previo

        cartItems.forEach(item => {
            const cartItemElement = document.createElement('div');
            cartItemElement.classList.add('cart-item');
            cartItemElement.innerHTML = `<p>${item.name} - $${item.price.toFixed(2)}</p>`;
            cartItemsContainer.appendChild(cartItemElement);
        });

        // Actualizar el total del precio
        totalPrice = cartItems.reduce((sum, item) => sum + item.price, 0);
        totalPriceElement.textContent = `$${totalPrice.toFixed(2)}`;
    }

    // Función para cargar el carrito desde localStorage
    function loadCartFromLocalStorage() {
        const savedCart = localStorage.getItem('cartItems');
        if (savedCart) {
            cartItems = JSON.parse(savedCart);
            updateCartUI();
        }
    }

    // Función para abrir el carrito
    function openCart() {
        cartSidebar.classList.add('open');
    }

    // Función para cerrar el carrito
    function closeCart() {
        cartSidebar.classList.remove('open');
    }

    // Función para añadir productos al carrito y guardarlos en localStorage
    function addToCart(e) {
        const productName = e.target.getAttribute('data-product');
        const productPrice = parseFloat(e.target.getAttribute('data-price'));

        // Crear objeto de producto
        const cartItem = {
            name: productName,
            price: productPrice
        };

        // Añadir el producto al carrito (array)
        cartItems.push(cartItem);

        // Guardar el carrito actualizado en localStorage
         localStorage.setItem('cartItems', JSON.stringify(cartItems));

        // Actualizar la interfaz del carrito
        updateCartUI();

        // Abrir el carrito
        openCart();
    }

    // Añadir eventos a los botones para añadir al carrito
    addToCartButtons.forEach(button => {
        button.addEventListener('click', addToCart);
    });

    // Eventos para abrir y cerrar el carrito
    botonSVG.addEventListener('click', openCart);
    closeCartButton.addEventListener('click', closeCart);

    // Cargar el carrito desde localStorage al cargar la página
     loadCartFromLocalStorage();
};
