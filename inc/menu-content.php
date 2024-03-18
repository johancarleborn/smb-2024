<?php

class Menu_content extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $icon = get_field('icon', $item);
        $is_parent = in_array('menu-item-has-children', $item->classes);
        $class_names = $value = '';
        $li_classes = empty($item->classes) ? array() : (array) $item->classes;
        $a_classes = 'block w-full font-sans py-2 font-semibold text-lg lg:text-base text-black menu-item-link gap-x-2 hover:text-primary-green transition-colors duration-200';
        $has_icon = !empty($icon) && $icon != 'None';

        if ($has_icon) {
            $li_classes[] .= 'has-icon';
        }

        // Menu item depths
        //      -- // Top level menu item (depth 0)
        //       |
        //       -- // Sub menu item (depth 1)
        //         |
        //         -- // Sub menu item (depth 2)


        if ($depth === 1) { // Sub menu item (depth 1)
            $li_classes[] = 'sub-menu-item group-hover:block';
            $a_classes .= ' w-full lg:px-6';
        } else if ($depth > 1) { // Sub menu item (depth 2) 
            $a_classes .= ' lg:px-6';
        } else {
            // Top level menu item (depth 0)
            $li_classes[] .= 'parent-item group lg:rounded-none px-6 lg:px-0';
            $a_classes .= ' transition-none lg:py-6 lg:px-3 xl:px-4 lg:w-auto';
            if ($is_parent) {
                $a_classes .= ' lg:!pr-0';
            }
        }

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($li_classes), $item));
        $class_names = ' class="' . esc_attr($class_names) . '"';

        $output .= '<li id="menu-item-' . $item->ID . '"' . $value . $class_names . '>';

        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
        $attributes .= 'class="' . $a_classes . '"';

        if ($is_parent) {
            $item_output = '<span class="flex items-center justify-between w-full lg:pr-4 lg:p-0 lg:bg-none">';

            if ($item->url === '#') {
                $item_output .= "
                    <button class='" . $a_classes . " text-left sub-menu-toggle-button main-item-button'>";
            } else {
                $item_output .= '<a' . $attributes . '>';
                if ($has_icon) {
                    $item_output .= '<div class="flex items-center w-full gap-x-2">';
                }
            }
        } else {
            $item_output = '<a' . $attributes . '>';
            if ($has_icon) {
                $item_output .= '<div class="flex items-center w-full gap-x-2">';
            }
        }

        if ($has_icon) {
            $item_output .= str_replace('36px', '16px', $icon);
        }

        if (!empty($args->link_before)) {
            $item_output .= $args->link_before;
        }

        $item_output .= '<span class="pointer-events-none menu-item-title">';
        $item_output .= apply_filters('the_title', $item->title, $item->ID);
        $item_output .= '</span>';

        if ($has_icon) {
            $item_output .= '</div>';
        }

        if (!empty($item->description)) {
            $item_output .= '<div class="text-xs font-normal menu-item-description">' . $item->description . '</div>';
        }

        if (!empty($args->link_after)) {
            $item_output .= $args->link_after;
        }

        if ($is_parent && $item->url === '#') {
            $item_output .= '</button>';
        } else {
            $item_output .= '</a>';
        }

        if ($is_parent) {
            $btn_classes = 'flex items-center justify-center flex-shrink-0 w-10 h-6 p-0 ml-auto lg:w-4 lg:h-4 lg:ml-1 sub-menu-toggle-button main-item-button';

            if ($depth === 0) {
                $btn_classes .= ' lg:pointer-events-none';
            }

            $item_output .= "
            <button class='{$btn_classes}'>
                <span class='text-2xl material-icons-round'>expand_more</span>
            </button>";
            $item_output .= '</span>';
        }

        if (!empty($args->after)) {
            $item_output .= $args->after;
        }

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    /**
     * Open sub menu wrapper
     */
    function start_lvl(&$output, $depth = 0, $args = array()) {
        $output .= '<ul class="sub-menu sub-menu-' . $depth . '">';
    }

    /**
     * Close sub menu wrapper
     */
    function end_lvl(&$output, $depth = 0, $args = array()) {
        $output .= '</ul>';
    }
}

/**
 * Add a CTA button to the start of the main menu (menu-1) on mobile.
 */

// add_filter(
//     'wp_nav_menu_items',
//     function ($items, $args) {
//         if ($args->theme_location == 'menu-1') {
//             $items = '<a class="mb-4 btn btn-primary lg:hidden" href="' . globalACF()['menu_btn']['url'] . '" title="' . globalACF()['menu_btn']['title'] . '">' . globalACF()['menu_btn']['title'] . '</a>' . $items;
//         }
//         return $items;
//     },
//     10,
//     2
// );
