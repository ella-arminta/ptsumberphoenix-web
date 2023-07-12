
let navs = document.querySelectorAll('.navigation-item')
let panels = document.querySelectorAll('.content-panel')

let nav_active = document.querySelector('.navigation-item.active')
let panel_active = document.querySelector('.content-panel.active')

for (let nav of navs) {
    nav.addEventListener('click', () => {
        if (nav.classList.contains('active') == false) {
            nav.classList.add('active')
            nav_active.classList.remove('active')
            nav_active = nav

            let idx = nav_active.classList.item(1)
            panel_active.classList.remove('active')
            panels[idx].classList.add('active')
            panel_active = panels[idx]
        }
    })
}