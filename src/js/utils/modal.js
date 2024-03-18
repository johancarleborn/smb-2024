/**
 *  Add data-toggle_modal="my-modal-id" to a button
 *  Add data-modal_id="my-modal-id" to an element
 *  An inner div is required in the modal element, see example below
 **/
let modal, overlay, modalId, closeBtn
document.addEventListener('click', (e) => {
    if (e.target.dataset.toggle_modal) {
        if (modal && modal.classList.contains('active')) {
            modal.classList.remove('active')
            modal.querySelector('.overlay').remove()
            modal.querySelector('.close-btn').remove()
        } else {
            modalId = e.target.dataset.toggle_modal
            modal = document.querySelector([`[data-modal_id="${modalId}"]`])
            const modalBody = modal.querySelector('div:last-child')

            overlay = /*html*/ `<div class="overlay fixed inset-0 bg-black/25" data-toggle_modal="${modalId}"></div>`

            closeBtn = /*html*/ `<button class="close-btn absolute flex items-center justify-center w-10 h-10 duration-150 rounded-full right-3 hover:bg-black/5 active:bg-black/10 top-3" data-toggle_modal="${modalId}">
                <ion-icon name="close-outline" class="w-6 h-6"></ion-icon>
            </button>`

            modalBody.insertAdjacentHTML('afterbegin', closeBtn)
            modal.insertAdjacentHTML('afterbegin', overlay)
            modal.classList.toggle('active')
        }
    }
})

/**
 * 
 * Example:
 * 
<button data-toggle_modal="login">Logga in</button>

<div class="flex items-center justify-center" data-modal_id="login">
    <div class="relative z-10 w-full max-w-lg p-4 bg-white rounded-lg md:p-6 lg:p-8">

    </div>
</div>
*/
