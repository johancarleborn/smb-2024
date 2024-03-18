
export const setupFormInputs = () => {
    // Target all input containers from all Gravity Forms
    const inputContainers = document.getElementsByClassName('ginput_container')
        
    if( inputContainers.length ) {

        // Setup focus and blur events for each field
        for( const inputContainer of inputContainers) {
            
            // Target input element in container, whether it's an input or a textarea
            const inputElement = inputContainer.querySelectorAll(":scope > *")[0]

            // Label element is always the previous sibling of the input container
            const labelElement = inputContainer.previousElementSibling
            
            // Activate label if input has value - this moves the label above the input
            inputElement.addEventListener('focus', (event) => {
                labelElement.classList.add('active')
            })

            // Deactivate label if input is empty on blur - this moves the label back to its original position
            inputElement.addEventListener('blur', (event) => {
                if( inputElement.value === '' ) {
                    labelElement.classList.remove('active')
                }
            })

            // If the input has a value on page load (when user submit fails) then activate the label
            // Also prevent animation to avoid flicker
            if( inputElement.value !== '' ) {
                labelElement.classList.add('no-animation')
                labelElement.classList.add('active')
                
                setTimeout( () => {
                    labelElement.classList.remove('no-animation')
                }, 200)
            }

        }
    }
}


document.addEventListener('DOMContentLoaded', function() {

    // Have to use jQuery here because the gform_post_render event is triggered by Gravity Forms
    // This fires on page load and on submit.
    jQuery(document).on('gform_post_render', function(event, form_id, current_page) {
        // Move validation error message to bottom of form
        jQuery(`#gform_wrapper_${form_id} div.gform_validation_errors`).appendTo(`#gform_${form_id} div.gform_body`)

        setupFormInputs()
    })

}, false)
