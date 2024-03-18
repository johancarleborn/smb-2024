<?php

add_action('wp_ajax_load_more', 'load_more_callback');
add_action('wp_ajax_nopriv_load_more', 'load_more_callback');

function load_more_callback() {
    check_ajax_referer('load_more', 'security');
    // error_log(print_r($_POST, true));
    $paged = $_POST['paged'];
    !empty($_POST['cat_id']) ? $cat_id = $_POST['cat_id'] : '';
    !empty($_POST['search_query']) ? $search = $_POST['search_query'] : '';
    $post_type = $_POST['post_type'];
    $exclude = [$_POST['exclude']];
    $exclude = explode(',', $exclude[0]);
    $exclude = array_filter($exclude);
    $card_type = $post_type . '_card';
    $card_class = $_POST['card_class'];
    $body_class = $_POST['card_body'];

    $args = [
        'post_type'         => $post_type,
        'post_status'       => 'publish',
        'order'             => 'DESC',
        'orderby'           => 'date',
        'posts_per_page'    => 12,
        'post__not_in'      => $exclude,
    ];


    // IF ON SEARCH PAGE
    if (isset($search) && $search !== '') {
        $args['s'] = $search;
        $args['orderby'] = $search;
    } else {
        $args['orderby'] = 'date';
    }

    // IF ON ARCHIVE PAGE
    if (isset($cat_id) && $cat_id !== '') {
        if ($post_type == 'post') {
            $args['cat'] = $cat_id;
        }
    }

    $lb_posts = new WP_Query($args);

    if ($lb_posts->have_posts()) {
        while ($lb_posts->have_posts()) {
            $lb_posts->the_post();
            ob_start();
            if (isset($search) && $search !== '') {
                small_card(get_the_ID());
            } else {
                if (function_exists($card_type)) {
                    $card_type(get_the_ID(), $card_class, $body_class, 10,);
                }
            }
            $post_array[] = ob_get_clean();
        }
    }
    $total_posts = $lb_posts->found_posts;
    wp_reset_postdata();

    $posts = [
        'posts'                 => $post_array,
        'found_posts'           => $total_posts,
        'paged'                 => $paged,
        'post_type'             => $post_type,
        'exclude'               => $exclude,
        'args'                  => $args,
        'max_num_pages'         => $lb_posts->max_num_pages,
    ];

    if (isset($search) && $search !== '') {
        $posts['search_query'] = $search;
    }

    if ($total_posts <= 12) {
        $posts['load_more_btn_text'] = __('Inga fler inlägg', 'lightning');
    } else {
        $posts['load_more_btn_text'] = __('Ladda fler', 'lightning');
    }

    wp_send_json_success($posts);

    wp_send_json_error(
        array(
            'message' => 'Hittade inga inlägg'
        )
    );
}
