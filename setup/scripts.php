<?php
// Enqueue scripts and styles.

function lightning_scripts() {
    wp_enqueue_style('lightning-style', get_stylesheet_uri(), array(), _S_VERSION);

    // CSS
    wp_enqueue_style('lw-app-css', get_template_directory_uri() . '/dist/app.css', filemtime(get_template_directory() . '/dist/app.css'));

    // JS
    wp_enqueue_script('lw-app-js', get_template_directory_uri() . '/dist/app.js', array('jquery'), filemtime(get_template_directory() . '/dist/app.js'), true);

    wp_localize_script('lw-app-js', 'liGlobal', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'homeUrl' => home_url(),
        'templateDirectory' => get_template_directory_uri(),
        'ABSPATH' => str_replace('/wp-content/themes/lwlightning', '', get_template_directory_uri()),
        'restBase' => get_rest_url() . 'lw',
        'loadMore' => wp_create_nonce('load_more'),
        'isLoggedIn' => is_user_logged_in(),
    ));

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'lightning_scripts');

function admin_scripts() {
    wp_enqueue_style('lightning-style', get_stylesheet_directory_uri() . '/admin/lightning-builder.css');
    wp_enqueue_script('admin-script-js', get_stylesheet_directory_uri() . '/admin/admin.js', null, null, true);

    wp_enqueue_script('import-component-script-js', get_template_directory_uri() . '/setup/import-component/import-component.js', array('jquery'), filemtime(get_template_directory() . '/setup/import-component/import-component.js'), true);

    wp_enqueue_script('create-template-script-js', get_template_directory_uri() . '/setup/templates/add-template.js', array('jquery'), filemtime(get_template_directory() . '/setup/templates/add-template.js'), true);

    wp_localize_script('create-template-script-js', 'liAdminGlobal', array(
        'adminAjax' => admin_url('admin-ajax.php'),
        'adminUrl' => admin_url(),
        'addPage' => wp_create_nonce('add_page'),
        'getComponentName' => wp_create_nonce('get_component_name'),
        'importComponent' => wp_create_nonce('import_component'),
    ));
}
add_action('admin_enqueue_scripts', 'admin_scripts', 999);

// enqueue scripts to admin footer
function admin_footer_scripts() { ?>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<?php
}
add_action('admin_footer', 'admin_footer_scripts');

function remove_wp_block_library_css() {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-blocks-style'); // Remove WooCommerce block CSS
    wp_dequeue_style('global-styles');
}
add_action('wp_enqueue_scripts', 'remove_wp_block_library_css', 100);


// Setting the Google Maps API key for ACF
function my_acf_google_map_api($api) {
    $api['key'] = 'AIzaSyBBkPNiE5cDrWQbyvMtDOJ7BdZhXitVxe0';
    return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');


// Add head_script to wp_head
function add_head_script() {
    if (globalACF()['head_script']) {
        echo globalACF()['head_script'];
    }
}
add_action('wp_head', 'add_head_script');


// Add footer_script to wp_footer
function add_footer_script() {
    if (globalACF()['footer_script']) {
        echo globalACF()['footer_script'];
    }
}
add_action('wp_footer', 'add_footer_script');


// Add class to html tag
function add_class_to_html_tag($output) {

    $site_header_classes = '';
    if (have_rows('lb_components')) :
        $i = 0;
        while (have_rows('lb_components')) : the_row();
            if ($i === 0) {

                if (get_row_layout() == 'post_hero') {
                    $site_header_classes = 'whitenav';
                } else {
                    $site_header_classes = '';
                }
            }
            $i++;
        endwhile;
    endif;

    $output .= ' class="' . $site_header_classes . '"';
    return $output;
}
add_filter('language_attributes', 'add_class_to_html_tag');
