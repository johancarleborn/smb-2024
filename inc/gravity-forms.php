<?php

add_filter('gform_required_legend', '__return_empty_string');

// Change Gravity Forms validation error message
add_filter('gform_validation_message', 'lw_gform_validation_message', 10, 2);
function lw_gform_validation_message() {
    return '<h2 class="gform_submission_error hide_summary"><span class="gform-icon gform-icon--close"></span>' . __('Ett problem uppstod när ditt formulär skulle skickas. Granska rödmarkerade fält.', 'lightning') . '</h2>';
}

// Wrappa submit button i en div
add_filter('gform_submit_button', 'wrap_submit_button', 10, 2);
function wrap_submit_button($button, $form) {
    return "<div class='flex items-center justify-end mt-3 md:mt-4'>{$button}</div>";
}
