
let cat_item_active, subcat, cat
const cat_items = document.querySelectorAll('.category-item')
const title = document.querySelector('.product-category-title')

for (let item of cat_items) {
    item.addEventListener('click', () => {
        item.classList.add('active')
        if (cat_item_active)
            cat_item_active.classList.remove('active')

        cat_item_active = item
        subcat = cat_item_active.innerHTML.trim()
        if (subcat != 'All') {
            cat = cat_item_active.parentElement.parentElement.previousElementSibling.childNodes[1].innerHTML
            title.innerHTML = `${cat} - ${subcat}`
        } else {
            title.innerHTML = 'Our Products'
        }
    })
}