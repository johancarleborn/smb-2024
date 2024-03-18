<?php
require __DIR__ . '/add-template-function.php';

/**
 * Add dashboard widget
 */
add_action('wp_dashboard_setup', 'lw_dashboard_template');

function lw_dashboard_template() {
    global $wp_meta_boxes;

    wp_add_dashboard_widget(
        'add_page_and_template_widget',
        'Lägg till en ny sida med mall',
        'add_page_and_template'
    );
}

function options() { ?>
    <option value="0">Välj template</option>
    <option value="template-text">Textsida</option>
    <option value="template-about">Om-sida</option>
    <option value="template-archive">Arkivsida</option>
<?php }

function add_page_and_template() { ?>
    <style>
        #add_page_and_template_widget {
            background: #0f1b2b;
        }

        #add_page_and_template_widget label,
        #add_page_and_template_widget strong,
        #add_page_and_template_widget p,
        #add_page_and_template_widget .postbox-header h2 {
            color: #fff;
        }

        #add_page_and_template_widget a {
            color: #4364f7;
        }

        #add_page_and_template_widget .postbox-header {
            border-bottom: 1px solid #2e4461;
        }

        #add_page_and_template_widget fieldset {
            width: 100%;
        }

        button#create-template {
            background-color: #4364f7;
            border-color: #4364f7;
        }
    </style>
    <div class="create-template-wrapper" style="display: flex; flex-direction: column; align-items: flex-start;">
        <fieldset>
            <label for="page-name">
                <strong>Sidans titel</strong>
                <input id="page-name" type="text" placeholder="Sidans titel" style="width: 100%; margin-bottom: 8px;">
            </label>
        </fieldset>
        <fieldset>
            <strong style="width: 100%; display: block;">Mall</strong>
            <label for="template-name" style="width: 100%;">
                <select name="template-name" id="template-name" style="width: 100%;">
                    <?php options(); ?>
                </select>
            </label>
        </fieldset>

        <button id="create-template" class="button button-primary" style="margin-top: 12px;">Skapa sida</button>
        <p id="template-success" style="color: #fff; font-weight: bold;"></p>
        <p id="template-error" style="color: red; font-weight: bold;"></p>
    </div>
<?php }


/**
 * Add post metabox on the side of the post edit screen on pages.
 */

function add_post_metabox() {
    add_meta_box(
        'add-template-box',
        __('⚡ Template', 'lightning'),
        'add_template',
        'page',
        'side',
        'low' // alternative: low, default, high
    );
}

function add_template() {
    // Get current post id in admin
    $post_id = isset($_GET['post']) ? $_GET['post'] : false;
?>
    <style>
        #add-template-box {
            background: #0f1b2b;
        }

        #add-template-box label,
        #add-template-box strong,
        #add-template-box p,
        #add-template-box ol,
        #add-template-box .postbox-header h2 {
            color: #fff;
        }

        #add-template-box a {
            color: #4364f7;
        }

        #add-template-box .postbox-header {
            border-bottom: 1px solid #2e4461;
        }

        #add-template-box fieldset {
            width: 100%;
        }

        button#add-template {
            background-color: #4364f7;
            border-color: #4364f7;
        }
    </style>

    <div class="create-template-wrapper" style="display: flex; flex-direction: column; align-items: flex-start;">
        <fieldset style="width: 100%;">
            <strong style="width: 100%; display: block; margin-bottom: 12px;">Steg</strong>
            <ol>
                <li>Ange rubrik</li>
                <li>Välj Lightning builder!</li>
                <li>Spara utkast eller Publicera</li>
                <li>Välj template</li>
            </ol>
            <select name="template-name" id="template-name" style="width: 100%;">
                <?php options(); ?>
            </select>
        </fieldset>

        <button id="add-template" class="button button-primary" style="margin-top: 12px; align-self: flex-end;" data-post-id="<?= $post_id; ?>">⚡ Skapa</button>
    </div>

<?php }

add_action('add_meta_boxes', 'add_post_metabox');
