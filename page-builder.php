<?php
$page_components = glob(lb_path() . 'page-components/**/pc-*.php');

if (have_rows('lb_components')) {
    while (have_rows('lb_components')) {
        the_row();

        foreach ($page_components as $page_component) {
            include $page_component;
        }
    }
}
