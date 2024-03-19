function wcagMode() {
    const wcags = document.querySelectorAll('.toggle-wcag-mode')
    if (localStorage.theme === 'wcag') {
        document.documentElement.classList.add('wcag')
        wcags.forEach((wcag) => wcag.classList.add('active'))
    } else {
        wcags.forEach((wcag) => wcag.classList.remove('active'))
        document.documentElement.classList.remove('wcag')
    }
}

wcagMode()

function toggleWcagMode() {
    if (localStorage.theme === 'wcag') {
        localStorage.theme = 'reg'
    } else {
        localStorage.theme = 'wcag'
    }
    wcagMode()
}

document.addEventListener('click', (e) => {
    if (e.target && e.target.classList.contains('toggle-wcag-mode')) {
        toggleWcagMode()
    }
})

// localStorage.removeItem('theme')
