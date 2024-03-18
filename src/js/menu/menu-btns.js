const mainMenu = document.querySelector('#main-menu')
const menuToggleBtn = document.querySelector('.main-menu-toggle-btn')
const searchWrapper = document.querySelector('.site-search-wrapper')
const searchInput = searchWrapper.querySelector('.main-search-input')

function toggleMenu() {
    closeSearch()

    mainMenu.classList.toggle('!flex')

    menuToggleBtn.classList.contains('menu-toggled')
        ? menuToggleBtn.classList.remove('menu-toggled')
        : menuToggleBtn.classList.add('menu-toggled')
}

let dropdownBtn, dropdown

document.addEventListener('click', function (e) {
    if (e.target.closest('.main-menu-toggle-btn')) {
        toggleMenu()
    }

    // if clicking outside of dropdown menu and dropdown menu is open then close it
    if (dropdown && e.target !== dropdown && !dropdown.contains(e.target)) {
        dropdownBtn.classList.remove('pointer-events-none')
        dropdown.classList.remove('!block')
    }

    if (e.target.classList.contains('dropdown-btn')) {
        dropdownBtn = e.target
        mainMenu.classList.remove('!flex')
        menuToggleBtn.classList.remove('menu-toggled')
        dropdown = e.target.closest('.dropdown-btn').nextElementSibling
        if (dropdown.classList.contains('!block')) {
            dropdown.classList.remove('!block')
        } else {
            dropdownBtn.classList.add('pointer-events-none')
            dropdown.classList.add('!block')
        }
    }

    if (e.target.classList.contains('sub-menu-toggle-button')) {
        const parent = e.target.closest('.menu-item-has-children')
        const submenu = parent.querySelector('.sub-menu')

        if (submenu.classList.contains('active')) {
            submenu.classList.remove('active')
            parent.classList.remove('active')
        } else {
            submenu.classList.add('active')
            parent.classList.add('active')
        }
    }

    // Search toggle

    if (e.target.classList.contains('search-toggle')) {
        searchWrapper.classList.toggle('!block')
        mainMenu.classList.remove('!flex')
        menuToggleBtn.classList.remove('menu-toggled')

        searchInput.focus()
    }

    if (e.target.classList.contains('search-overlay') || e.target.classList.contains('close-search')) {
        closeSearch()
    }
})

// remove submenu_classes from submenu when window is resized, only once
const submenus = document.querySelectorAll('.sub-menu')
let resized = false
window.addEventListener('resize', function () {
    if (window.innerWidth > 1024) {
        if (resized) return
        submenus.forEach((submenu) => submenu.classList.remove('active'))
        resized = true
    } else {
        if (!resized) return
        submenus.forEach((submenu) => submenu.classList.remove('active'))
        resized = false
    }
})

function closeSearch() {
    searchInput.value = ''
    searchWrapper.classList.remove('!block')
    return
}

document.addEventListener('keyup', function (e) {
    if (e.target.classList.contains('main-search-input')) {
        if (e.key === 'Escape') {
            closeSearch()
        }
    }
})
