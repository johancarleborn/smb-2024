// Funktion för att sätta en cookie
const setCookie = (name, value, days) => {
    const expires = new Date(Date.now() + days * 24 * 60 * 60 * 1000).toUTCString()
    document.cookie = `${name}=${value};expires=${expires};path=/`
}

// Funktion för att hämta en cookie
const getCookie = (name) => {
    const value = `; ${document.cookie}`
    const parts = value.split(`; ${name}=`)
    if (parts.length === 2) return parts.pop().split(';').shift()
}

// Sätter en cookie om användaren redan sett popupen och stängt den
const setPopupCookie = () => {
    setCookie('li_popup', 'closed', document.querySelector('.li-popup').getAttribute('data-popup_setcookie'))
}

// Kollar om användaren redan sett och stängt popupen
const checkPopupCookie = () => {
    return getCookie('li_popup') !== 'closed'
}

// Stänger popupen
const closePopup = () => {
    const popup = document.querySelector('.li-popup')
    popup.classList.remove('active')
    setPopupCookie()
}

// Öppnar popupen om användaren inte redan sett den efter 5 sekunder
const openPopup = () => {
    const popup = document.querySelector('.li-popup')
    if (!popup) return
    const delay = popup.dataset.popup_delay * 1000
    setTimeout(() => {
        if (checkPopupCookie()) {
            popup.classList.add('active')
        }
    }, delay)
}

// Stänger popupen på stängknappen
const closePopupBtn = () => {
    const closeBtn = document.querySelector('.close-li-popup')
    if (!closeBtn) return
    closeBtn.addEventListener('click', closePopup)
}

// Stänger popupen om användaren klickar utanför
const closePopupOutside = () => {
    const popup = document.querySelector('.li-popup')
    if (!popup) return
    popup.addEventListener('click', (e) => {
        if (e.target.classList.contains('li-popup')) {
            closePopup()
        }
    })
}

// Initialize the popup
const initPopup = () => {
    openPopup()
    closePopupBtn()
    closePopupOutside()
}

document.addEventListener('DOMContentLoaded', initPopup)
