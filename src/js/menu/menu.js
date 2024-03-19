const siteHeader = document.querySelector('.site-header')

// Check if the site header is sticky
const observer = new IntersectionObserver(
    ([e]) => {
        if (siteHeader) {
            siteHeader.classList.toggle('scrolled', e.intersectionRatio < 1)
        }
    },
    {
        threshold: [1],
    }
)
observer.observe(siteHeader)
