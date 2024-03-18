document.addEventListener('click', (e) => {
    if (e.target.classList.contains('tab')) {
        const tab = e.target
        const tabs = document.querySelectorAll('.tab')
        const tabContents = document.querySelectorAll('.tab-content')

        tabs.forEach((tab) => {
            tab.classList.remove('active')
        })
        tab.classList.add('active')

        tabContents.forEach((tabContent) => {
            tabContent.classList.remove('active')

            if (tabContent.dataset.tab === tab.dataset.tab) {
                tabContent.classList.add('active')
            }
        })
    }
})
