
let value = window.innerWidth
let arrow = document.querySelector('.arrow-container')

window.addEventListener('scroll', function() {
    if (scrollY > value) {
        arrow.style.opacity = 1
    } else {
        arrow.style.opacity = 0
    }
});