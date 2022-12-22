
let nav_item = document.querySelectorAll('.nav-item')
let nav_item_active = document.querySelector('.nav-item.active')

for(let item of nav_item) {
    item.addEventListener('click', () => {
        if (item.classList.contains('active') == false) {
            item.classList.add('active')
            nav_item_active.classList.remove('active')
            nav_item_active = item
        }
    })
}