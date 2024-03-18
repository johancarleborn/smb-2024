function darkMode() {
    const dark = document.querySelector('.dark-mode')
    if (
        localStorage.theme === 'dark' ||
        (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)
    ) {
        document.documentElement.classList.add('dark')
        dark.innerHTML = 'light_mode'
    } else {
        dark.innerHTML = 'dark_mode'
        document.documentElement.classList.remove('dark')
    }
}

darkMode()

function toggleDarkMode() {
    if (localStorage.theme === 'dark') {
        localStorage.theme = 'light'
    } else {
        localStorage.theme = 'dark'
    }
    darkMode()
}

document.addEventListener('click', (e) => {
    if (e.target && e.target.classList.contains('toggle-dark-mode')) {
        toggleDarkMode()
    }
})

// Whenever the user explicitly chooses to respect the OS preference
// localStorage.removeItem('theme')
