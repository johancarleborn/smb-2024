jQuery('#acf-field_lb_import_flex_layout_page').on('select2:select', function (e) {
    getComponentName(e)
})

const componentSelect = document.getElementById('acf-field_lb_import_flex_layout')

function getComponentName(e) {
    const selectedPageID = e.params.data.id
    const fd = new FormData()

    fd.append('action', 'get_component_name')
    fd.append('security', liAdminGlobal.getComponentName)
    fd.append('page_id', selectedPageID)

    fetch(liAdminGlobal.adminAjax, {
        method: 'POST',
        body: fd,
    })
        .then((response) => response.json())
        .then((data) => {
            componentSelect.innerHTML = ''
            addOption(0, data.message)
            let number = 1

            if (data.status === 'success') {
                const layoutNames = data.layout_names
                layoutNames.map((layoutName) => {
                    addOption(layoutName, layoutName)
                    number++
                })
            }
        })
        .catch((error) => {
            console.error(error)
        })
}

function addOption(number, layoutName) {
    const option = document.createElement('option')
    option.text = layoutName
    option.value = number
    componentSelect.add(option)
}

function importComponent() {
    const selectedPageID = document.getElementById('acf-field_lb_import_flex_layout_page').value
    const selectedComponent = document.getElementById('acf-field_lb_import_flex_layout').value
    const post_ID = document.getElementById('post_ID').value
    const fd = new FormData()

    fd.append('action', 'import_component')
    fd.append('security', liAdminGlobal.importComponent)
    fd.append('page_id', selectedPageID)
    fd.append('component', selectedComponent)
    fd.append('current_page_id', post_ID)
    let userConfirm = confirm('Har du sparat dina ändringar?')

    fetch(liAdminGlobal.adminAjax, {
        method: 'POST',
        body: fd,
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.status === 'success') {
                if (userConfirm) {
                    window.location.reload()
                } else {
                    return
                }
            }
        })
        .catch((error) => {
            console.error(error)
        })
}

document.addEventListener('click', function (e) {
    if (e.target.closest('.import-flex-layout-btn')) {
        importComponent()
    }
})
