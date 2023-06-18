document.querySelector('#search-form').addEventListener('submit', function(event) {
    event.preventDefault();
    searchProduct();
});

function searchProduct() {
    let barcode = document.querySelector('#barcode').value;

    // Send the Ajax request
    fetch('/search-product', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ barcode: barcode })
    })
    .then(response => response.json())
    .then(product => {
        if (product) {
            // Display the product details
            document.querySelector('#product-name').textContent = product.name;
            document.querySelector('#product-id').textContent = product.productid;
            document.querySelector('#product-stock').textContent = product.stock;
            document.querySelector('#product-price').textContent = product.price;
        } else {
            // Display an error message
            document.querySelector('#product-details').textContent = 'Sorry, product not found.';
        }
    })
    .catch(error => {
        console.error(error);
        document.querySelector('#product-details').textContent = 'An error occurred while searching for the product.';
    });
}


