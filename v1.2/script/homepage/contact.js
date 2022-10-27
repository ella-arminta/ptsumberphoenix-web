
let contacts= document.querySelectorAll('.contact')

for (let contact of contacts) {
    contact.addEventListener('click', () => {
        window.location.href = './templates/contact.html'
    })
}