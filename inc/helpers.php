<?php

/**
 * @param Int $image_id
 * @param String $size
 * @param String $class
 */
function image($image_id, $size = 'full', string $class = null, $id = null) {
    // Pass in image id and size
    if (!$image_id) {
        return;
    }
    $alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
    $attributes = [];
    if ($class) {
        $attributes['class'] = $class;
    }
    if ($id) {
        $attributes['id'] = $id;
    }
    if ($alt) {
        $attributes['alt'] = $alt;
    }
    echo wp_get_attachment_image($image_id, $size, false, $attributes);
}

/**
 * Hydration function for advanced custom fields
 */
function acf_fields($fields) {
    $hydrated_fields = [];

    foreach ($fields as $field) {
        $value = get_field($field);
        $hydrated_fields[$field] = $value;
    }

    return $hydrated_fields;
}

function acf_sub_fields($fields) {
    $hydrated_fields = [];

    foreach ($fields as $field) {
        $value = get_sub_field($field);
        $hydrated_fields[$field] = $value;
    }

    return $hydrated_fields;
}

/**
 *
 * Get fields from clone fields
 * s stands for settings, just wanted to keep it short
 * Useage example: s($prefix)['title']
 */
function s($prefix, bool $sub = true) {
    if ($sub) {
        $top_title = get_sub_field($prefix . '_top_title');
        $title = get_sub_field($prefix . '_title');
        $title_tag = get_sub_field($prefix . '_title_tag');
        $title_type = get_sub_field($prefix . '_title_type');
        $text_align = get_sub_field($prefix . '_text_align');
        $text = get_sub_field($prefix . '_text', false, false);
        $link = get_sub_field($prefix . '_component_link');
        $link_type = get_sub_field($prefix . '_component_link_type');
        $bg_color = get_sub_field($prefix . '_bg_colors');
        $hide_component = get_sub_field($prefix . '_hide_component');
        $text_color = get_sub_field($prefix . '_text_colors');
        $accent_color = get_sub_field($prefix . '_accent_colors');
        $component_id = get_sub_field('component_id');
    } else {
        $top_title = get_field($prefix . '_top_title');
        $title = get_field($prefix . '_title');
        $title_tag = get_field($prefix . '_title_tag');
        $title_type = get_field($prefix . '_title_type');
        $text_align = get_field($prefix . '_text_align');
        $text = get_field($prefix . '_text');
        $link = get_field($prefix . '_component_link');
        $link_type = get_field($prefix . '_component_link_type');
        $bg_color = get_field($prefix . '_bg_colors');
        $hide_component = get_field($prefix . '_hide_component');
        $text_color = get_field($prefix . '_text_colors');
        $accent_color = get_field($prefix . '_accent_colors');
        $component_id = get_field('component_id');
    }

    return [
        'bg_color' => $bg_color,
        'hide_component' => $hide_component,
        'text_color' => $text_color,
        'accent_color' => $accent_color,
        'text' => $text,
        'link' => $link,
        'link_type' => $link_type,
        'top_title' => $top_title,
        'title' => $title,
        'title_tag' => $title_tag,
        'title_type' => $title_type,
        'text_align' => $text_align,
        'component_id' => $component_id,
    ];
}

/**
 * 
 * Get global acf fields
 * Register them here for a single source of truth
 */
function globalACF() {
    return [
        'menu_btn' => get_field('menu_btn', 'option'),
        'menu_btn_2' => get_field('menu_btn_2', 'option'),
        'site_logo' => get_field('site_logo', 'option'),
        'footer_logo' => get_field('footer_logo', 'option'),
        'footer_copyright' => get_field('footer_copyright', 'option'),
        'social_media_text' => get_field('footer_col_social_media_text', 'option'),
        'show_popup' => get_field('show_popup', 'option'),
        'popup_top_title' => get_field('popup_top_title', 'option'),
        'popup_title' => get_field('popup_title', 'option'),
        'popup_text' => get_field('popup_text', 'option'),
        'popup_image' => get_field('popup_image', 'option'),
        'popup_delay' => get_field('popup_delay', 'option'),
        'popup_code_type' => get_field('popup_code_type', 'option'),
        'popup_code' => get_field('popup_code', 'option'),
        'popup_gravityform' => get_field('popup_gravityform', 'option'),
        'popup_form_settings' => get_field('popup_form_settings', 'option'),
        'popup_set_cookie' => get_field('popup_set_cookie', 'option'),
        'popup_bg_color' => get_field('popup_bg_color', 'option'),
        'popup_text_color' => get_field('popup_text_color', 'option'),
        'popup_accent_color' => get_field('popup_accent_color', 'option'),
        'head_script' => get_field('head_script', 'option'),
        'footer_script' => get_field('footer_script', 'option'),
    ];
}



/**
 *
 * Output component id if set
 *
 */

function component_id($prefix) {
    if (s($prefix)['component_id']) {
        echo 'id="' . s($prefix)['component_id'] . '"';
    } else {
        if (s($prefix)['title']) {
            echo 'id="' . sanitize_title(s($prefix)['title']) . '"';
        }
    }
}

function compensate_padding(string $text_placement) {
    $is_left_aligned = $text_placement === '1';
    echo $is_left_aligned ? ' pr-4 md:pr-6 lg:pr-12 ' : ' pl-4 md:pl-6 lg:pl-12 ';
}


/**
 *
 * Get location by user ip
 *
 */

// function getLocationInfoByIp() {
//     $client  = @$_SERVER['HTTP_CLIENT_IP'];
//     $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
//     $remote  = @$_SERVER['REMOTE_ADDR'];

//     if(filter_var($client, FILTER_VALIDATE_IP)){
//         $ip = $client;
//     }elseif(filter_var($forward, FILTER_VALIDATE_IP)){
//         $ip = $forward;
//     }else{
//         $ip = $remote;
//     }
//     $ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));
//     if($ip_data && $ip_data->geoplugin_countryName != null){
//         $result = $ip_data->geoplugin_countryCode;
//     }
//     return $result;
// }


/**
 *
 * Hide component for specific countries
 *
 */
// function hide_country($prefix) {
//     $country_codes = get_sub_field($prefix . '_country_codes');
//     if (!$country_codes) {
//         return;
//     }

//     $countries = [];
//     foreach ($country_codes as $code) {
//         $code = preg_replace('/ :.*/', '', $code);
//         $countries[] = $code;
//     }
//     return in_array(getLocationInfoByIp(), $countries);
// }


/**
 *
 * Get categories as tags for post
 *
 */
function get_post_terms($post_id, string $taxonomy, $class = null, $term_class = null) {
    $taxonomy = get_the_terms($post_id, $taxonomy);

    if (!$taxonomy) {
        return;
    } ?>

    <div class="flex flex-wrap gap-1 <?= $class; ?>">
        <?php foreach ($taxonomy as $tax) : ?>
            <div class="px-2 py-1 mr-1 text-xs font-semibold text-primary-700 bg-primary-100 rounded <?= $term_class; ?>">
                <?= $tax->name; ?>
            </div>
        <?php endforeach; ?>
    </div>

<?php }


/**
 *
 * Get a page url by template name
 * Call it like this: get_page_url_by_template('the-template-name');
 */
function url_by_template($template_name) {
    $pages = get_posts(array(
        'post_type' => 'page',
        'meta_key' => '_wp_page_template',
        'meta_value' => $template_name . '.php'
    ));
    if (!empty($pages)) {
        return get_permalink($pages[0]->ID);
    } else {
        return false;
    }
}


/**
 * Get the path to the lightning builder.
 * @return "get_template_directory() . '/inc/acf/lightning-builder/'"
 */
function lb_path() {
    return get_template_directory() . '/inc/acf/lightning-builder/';
}


/**
 * Get the path to the acf folder in inc.
 * @return "get_template_directory() . '/inc/acf/'"
 */
function acf_path() {
    return get_template_directory() . '/inc/acf/';
}


/**
 * Get the page id of the current page if it's a parent page.
 * If it's a child page, get the id of the parent page.
 * @return int
 */
function ancestor_id($post_id = null) {
    if (wp_get_post_parent_id($post_id) == 0) {
        $page_id = get_the_ID();
    } else {
        $page_id = get_post_ancestors(get_the_ID());
        // get last value in array
        $page_id = end($page_id);
    }
    return $page_id;
}


/**
 * Get custom amount of words from the exerpt.
 * @return int
 */
function excerpt(int $limit, $post_id = null) {
    $excerpt = explode(' ', get_the_excerpt($post_id), $limit);
    if (count($excerpt) >= $limit) {
        array_pop($excerpt);
        $excerpt = implode(" ", $excerpt) . '...';
    } else {
        $excerpt = implode(" ", $excerpt);
    }
    return $excerpt;
}


/**
 * Get custom amount of words from custom field.
 *
 * @param int $limit The maximum number of words in the excerpt.
 * @param string $field The name of the custom field to retrieve.
 * @param int|null $post_id Optional. The ID of the post to retrieve the custom field from.
 * @return string The custom excerpt.
 */
function custom_excerpt(int $limit, string $field, ?int $post_id = null): string {
    $excerpt = get_field($field, $post_id, false, false);

    if (!$excerpt) {
        return '';
    }

    $excerpt = wp_trim_words($excerpt, $limit, '...');

    return $excerpt;
}


/**
 *
 * Get the spacing for sections
 *
 */
function section_spacing() {
    echo 'py-12 md:py-16 lg:py-18 xl:py-24 xxl:py-28';
}


/**
 * 
 * Global overlay
 * 
 */
function overlay($class = null, $strength = null, $revert = false) {
    if ($strength == 0) {
        return;
    } elseif ($strength == 1) {
        $strength = ' via-black/40 to-black/10';
    } else {
        $strength = ' via-black/60 to-black/30';
    }
    if ($revert) {
        $strength .= ' bg-gradient-to-t';
    } else {
        $strength .= ' bg-gradient-to-b';
    }
    echo "<div class='overlay absolute inset-0 pointer-events-none from-black/70 {$strength} -z-10 {$class}'></div>";
}


/**
 *
 * Link
 *
 */
function custom_link($link, string $class = null, string $icon_class = null, string $icon_name = null) {
    if ($link) {
        $icon_name = $icon_name ? $icon_name : 'arrow_forward';
        $link_color = get_sub_field('link_colors');
        echo "<a class='inline-block font-semibold group md:text-lg {$link_color} {$class}' href='{$link['url']}' target='{$link['target']}'>{$link['title']}<span class='ml-3 -mt-1 font-semibold align-middle transition-transform duration-300 md:ml-4 text-inherit material-icons-round group-hover:translate-x-1 {$icon_class}'>{$icon_name}</span></a>";
    }
}


/**
 *
 * Get related posts by category.
 *
 */
function get_related_posts($post_id, $limit = 3) {
    $categories = get_the_category($post_id);
    $category_ids = [];
    foreach ($categories as $individual_category) $category_ids[] = $individual_category->term_id;
    $args = [
        'category__in' => $category_ids,
        'post__not_in' => [$post_id],
        'posts_per_page' => $limit,
        'ignore_sticky_posts' => 1
    ];
    $related_posts = new WP_Query($args);
    return $related_posts;
}

/**
 *
 * Get posts by ids from acf field.
 *
 */
function get_related_posts_by_field($post_id, $field, $limit = 3) {
    $args = [
        'post__in' => get_field($field, $post_id),
        'posts_per_page' => $limit,
        'ignore_sticky_posts' => 1
    ];
    $posts = new WP_Query($args);
    return $posts;
}


/**
 *
 * Require all partials (including subfolders)
 *
 */

$partials = glob(get_template_directory() . '/partials/*.php');
foreach ($partials as $file) {
    require $file;
}

$sub_partials = glob(get_template_directory() . '/partials/**/*.php');
foreach ($sub_partials as $file) {
    require $file;
}
