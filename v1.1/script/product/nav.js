
let nav = document.querySelector('.navbar')

window.onscroll = () => {
    nav.classList.add('active')

    if ($(window).scrollTop() == 0) {
        nav.classList.remove('active')
    }
}