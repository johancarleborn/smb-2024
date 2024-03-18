<?php
$article_components = glob(acf_path() . 'article-builder/article-components/*.php');


if ( have_rows( 'ab_components' ) ) {
    while ( have_rows('ab_components' ) ) {
        the_row();

        foreach ($article_components as $article_component) {
            include $article_component;
        }

    }
}
