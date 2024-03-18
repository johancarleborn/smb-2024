document.addEventListener('DOMContentLoaded', function () {
    setTimeout(() => {
        const allColors = document.querySelectorAll('.colors-group .acf-input div.acf-button-group label')
        allColors &&
            allColors.forEach((color) => {
                let colorValue = color.textContent
                colorValue = colorValue
                    .toLowerCase()
                    .replace(' ', '')
                    .replace(/ /g, '-')
                    .replace(/[^\w-]+/g, '')

                const label = color.closest('label')
                label.classList.add(colorValue)

                label.insertAdjacentHTML('beforeend', `<span class="color-name">${colorValue}</span>`)
            })
    }, 100)

    const wpseoTaxonomyMetaboxPostbox = document.querySelector('#wpseo_meta.postbox')

    // YOAST shut yo mouth
    if (wpseoTaxonomyMetaboxPostbox) {
        const postBoxTitle = wpseoTaxonomyMetaboxPostbox.querySelector('h2')
        const postBoxContent = wpseoTaxonomyMetaboxPostbox.querySelector('.inside')
        postBoxTitle.style.cursor = 'pointer'
        postBoxContent.style.display = 'none'

        postBoxTitle.addEventListener('click', () => {
            if (postBoxContent.style.display === 'none') {
                postBoxContent.style.display = 'block'
            } else {
                postBoxContent.style.display = 'none'
            }
        })
    }

    // ACF: Lägg till layouter
    document.querySelectorAll('.li-layouts a').forEach(function (link) {
        link.addEventListener('click', function (e) {
            e.preventDefault()

            // Hitta och öppna ACF:s "Lägg till layout"-popup
            var addButton = document.querySelector('.acf-button[data-name="add-layout"]')
            if (addButton) {
                addButton.click()
                const tooltip = document.querySelector('.acf-tooltip.acf-fc-popup')
                tooltip.style.display = 'none'
                var layoutName = e.target.getAttribute('data-layout')

                e.target.classList.add('added')

                // Vänta tills popupen är synlig i DOM
                setTimeout(function () {
                    var layoutButton = document.querySelector('.acf-fc-popup a[data-layout="' + layoutName + '"]')

                    if (layoutButton) {
                        layoutButton.click()
                    }
                }, 100)

                setTimeout(() => {
                    e.target.classList.remove('added')
                }, 2000)
            }
        })
    })
})
