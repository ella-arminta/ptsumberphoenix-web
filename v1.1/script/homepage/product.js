
let products = document.querySelectorAll('.product');

for (let product of products) {
    product.addEventListener('click', () => {
        window.location.href = './product.php'
    })
}