<?php
if (get_row_layout() == 'global_component' && !s(get_row_layout())['hide_component']) :
    $prefix = get_row_layout();
    extract(acf_sub_fields(['global_component']));
?>

        <?php if ($global_component) :

            foreach ($global_component as $component_id) :

                if (have_rows('lb_components', $component_id)) :
                    while (have_rows('lb_components', $component_id)) : the_row();
                        include lb_path() . 'page-components/pc-' . str_replace('_', '-', get_row_layout()) . '/pc-' . str_replace('_', '-', get_row_layout()) . '.php';
                    endwhile;
                endif;
            endforeach;
        endif; ?>


<?php endif; ?>