function checkCardBodies() {
    const cardBodies = document.querySelectorAll('.testimonial .card-body')
    cardBodies.forEach((cardBody) => {
        if (cardBody.classList.contains('!line-clamp-none')) {
            return
        }

        if (cardBody.scrollHeight > cardBody.clientHeight) {
            cardBody.classList.add('cursor-pointer')
        } else {
            cardBody.classList.remove('cursor-pointer')
        }
    })
}

document.addEventListener('DOMContentLoaded', checkCardBodies)
window.addEventListener('resize', checkCardBodies)

document.addEventListener('click', (e) => {
    if (e.target.classList.contains('card-body')) {
        const cardBody = e.target
        cardBody.classList.toggle('!line-clamp-none')
    }
})
