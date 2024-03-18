document.addEventListener('click', (e) => {
    // Add class ac-body and hidden to dropdowns
    const accordionBodies = document.querySelectorAll('.ac-body')
    accordionBodies.forEach(function (accordionBody) {
        const accordionHeader = accordionBody.previousElementSibling

        if (e.target !== accordionBody && e.target !== accordionHeader && !accordionBody.contains(e.target)) {
            accordionHeader.classList.toggle('active')
            accordionBody.classList.toggle('!block')
        }
    })

    // Add class ac-header to the button that opens the dropdown
    if (e.target.classList.contains('ac-header')) {
        const accordionBody = e.target.nextElementSibling
        const accordionHeader = e.target
        accordionHeader.classList.toggle('active')
        accordionBody.classList.toggle('!block')
    }
    if (e.target.classList.contains('ac-footer')) {
        const accordionBody = e.target.previousElementSibling
        const accordionHeader = e.target
        accordionHeader.classList.toggle('active')
        accordionBody.classList.toggle('!block')
    }

    if (e.target.classList.contains('ac-open-top')) {
        const accordionBody = e.target.nextElementSibling
        const accordionHeader = e.target
        accordionHeader.classList.toggle('active')

        if (!accordionBody.classList.contains('!flex')) {
            accordionBody.classList.add('!flex', 'gap-3', 'bottom-full', 'p-1', 'bg-white', 'rounded')
        } else {
            accordionBody.classList.remove('!flex', 'gap-3', 'bottom-full', 'p-1', 'bg-white', 'rounded')
        }
    }

    if (e.target.classList.contains('ac-open-bottom')) {
        const accordionBody = e.target.nextElementSibling
        const accordionHeader = e.target
        accordionHeader.classList.toggle('active')

        if (!accordionBody.classList.contains('!flex')) {
            accordionBody.classList.add('!flex', 'gap-3', 'top-full', 'p-1', 'bg-white', 'rounded')
        } else {
            accordionBody.classList.remove('!flex', 'gap-3', 'top-full', 'p-1', 'bg-white', 'rounded')
        }
    }

    if (e.target.classList.contains('overlay')) {
        const overlay = e.target
        overlay.classList.remove('visible')
    }
})
