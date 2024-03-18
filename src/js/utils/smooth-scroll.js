document.addEventListener('click', (e) => {
    if (e.target.matches('a')) {
        let href = e.target.getAttribute('href')

        if (!href.startsWith('#') || (href.startsWith('#') && href.length < 2)) {
            return
        }

        e.preventDefault()
        let target = document.querySelector(href)
        if (!target) {
            return
        }

        let headerOffset = 130
        let elementPosition = target.offsetTop
        let offsetPosition = elementPosition - headerOffset

        window.scrollTo({
            top: offsetPosition,
            behavior: 'smooth',
        })
    }
})
