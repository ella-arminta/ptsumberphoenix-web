
let items = document.querySelectorAll('.update-item')

for (let item of items) {
    item.addEventListener('click', () => {
        window.location.href = '../../PT-SUMBER-PHOENIX-MAKMUR/templates/single/update.html'
    })
}