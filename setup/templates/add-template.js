function createPage() {
    const pageName = document.getElementById('page-name')
    const templateName = document.getElementById('template-name')
    const templateNameText = templateName.options[templateName.selectedIndex]
    const templateSuccess = document.getElementById('template-success')
    const templateError = document.getElementById('template-error')

    const fd = new FormData()
    fd.append('action', 'add_page')
    fd.append('security', liAdminGlobal.addPage)
    fd.append('page_name', pageName.value)
    fd.append('template_slug', templateName.value)
    fd.append('template_name', templateNameText.textContent)

    if (pageName.value === '') {
        templateError.style.display = 'block'
        templateError.innerHTML = 'Ange en rubrik för sidan.'
        return
    }

    if (templateName.value === '0') {
        templateError.style.display = 'block'
        templateError.innerHTML = 'Välj template.'
        return
    }

    fetch(liAdminGlobal.adminAjax, {
        method: 'POST',
        body: fd,
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.status === 'success') {
                templateSuccess.style.display = 'block'
                templateSuccess.innerHTML = `<a style="color: #ffffff !important;" href="${data.new_page_admin_link}">${data.message}</a>`
                templateError.style.display = 'none'
            } else {
                templateError.style.display = 'block'
                templateError.innerHTML = data.message
                templateSuccess.style.display = 'none'
            }
        })
        .catch((error) => {
            console.error(error)
        })
        .finally(() => {
            setTimeout(() => {
                templateName.selectedIndex = 0
                pageName.value = ''
            }, 3000)
        })
}

document.addEventListener('click', function (e) {
    if (e.target.matches('#create-template')) {
        createPage()
    }
})

function addTemplate(pageId) {
    const templateName = document.getElementById('template-name')
    const templateNameText = templateName.options[templateName.selectedIndex]

    const fd = new FormData()
    fd.append('action', 'add_page')
    fd.append('security', liAdminGlobal.addPage)
    fd.append('page_id', pageId)
    fd.append('template_slug', templateName.value)
    fd.append('template_name', templateNameText.textContent)

    if (pageId === '') {
        alert('Du har inte sparat sidan.')
        return
    }

    fetch(liAdminGlobal.adminAjax, {
        method: 'POST',
        body: fd,
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.status === 'success') {
                location.reload()
            }
        })
        .catch((error) => {
            console.error(error)
        })
        .finally(() => {
            setTimeout(() => {
                templateName.selectedIndex = 0
            }, 3000)
        })
}

document.addEventListener('click', function (e) {
    if (e.target.matches('#add-template')) {
        e.preventDefault()
        let userConfirm = confirm('Är du säker? Du kommer att förlora alla tidigare ändringar på sidan.')
        const pageId = e.target.getAttribute('data-post-id')

        if (userConfirm) {
            addTemplate(pageId)
        } else {
            return
        }
    }
})
