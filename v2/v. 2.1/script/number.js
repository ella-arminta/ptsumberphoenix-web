
// Code by : https://github.com/emetdas/Youtube-code/blob/master/web%20components/scroll-to-animate-counter/README.md
let section = document.querySelector('.update-section')
let number = document.querySelectorAll('.statistic-data-number')

const counter_observer = new IntersectionObserver((entries, observer) => {
    let [entry] = entries
    let speed = 70

    if (!entry.isIntersecting)
        return

    number.forEach((counter, index) => {
        const update = () => {
            const target = +counter.dataset.target
            const init = +counter.innerText
            const inc = target / speed

            if (init < target) {
                counter.innerText = Math.ceil(init + inc)
                setTimeout(update, 40)
            } else {
                counter.innerText = target
            }
        }

        update()
    }) 

    observer.unobserve(section)
}, {
    root: null,
    threshold: window.innerWidth > 768 ? 0.4 : 0.3
})

counter_observer.observe(section)
// ----------------------------------