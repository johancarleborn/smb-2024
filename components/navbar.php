<nav id="site-navigation" class="flex items-center py-2 sm:py-3 lg:py-0 main-navigation">
    <div class="flex items-center nav-left">
        <a class="site-logo" href="<?= home_url(); ?>" aria-label="Till startsidan">
            <?php if (globalACF()['site_logo']) : ?>
                <?= image(globalACF()['site_logo'], 'full', 'logo h-8 lg:h-14 hidden whitenav:block whitenav:group-[.scrolled]/header:hidden'); ?>
                <?= image(globalACF()['site_logo_dark'], 'full', 'logo h-8 lg:h-14 whitenav:hidden whitenav:group-[.scrolled]/header:block'); ?>
            <?php endif; ?>
        </a>

        <?php
        $walker = new Menu_content;
        wp_nav_menu(
            array(
                'theme_location'  => 'menu-1',
                'container_id'    => 'main-menu', // wrapping the ul element
                'container_class' => 'max-lg:absolute left-0 lg:px-4 py-6 lg:p-0 mx-auto min-w-full lg:min-w-[320px] top-full hidden lg:block h-[calc(100vh-74px)] lg:h-auto', // wrapping the ul element
                'menu_id'         => 'primary-menu', // ul element
                'menu_class'      => 'flex flex-col w-full lg:flex-row lg:items-center lg:ml-6 max-lg:overflow-auto h-full lg:h-auto', // ul element
                'walker'          => $walker,
            )
        );
        ?>
    </div>




    <div class="flex items-center ml-auto gap-x-4 md:gap-x-4 nav-right">

        <?php button_link(globalACF()['menu_btn'], 'btn-outlined hidden lg:flex bg-white py-2 px-3 md:px-4 lg:px-6 text-xs sm:text-sm md:text-base'); ?>

        <button class="flex items-center search-toggle icon-inherit lg:hover:text-primary-500 whitenav:group-[.scrolled]/header:text-primary-600 text-primary-600 whitenav:text-white size-6" aria-label="<?= __('Toggla sök', 'lightning'); ?>" aria-label="<?= __('Sök', 'lightning'); ?>">
            <ion-icon name="search-outline"></ion-icon>
        </button>
        <?php get_template_part('components/search'); ?>

        <button class="hidden lg:flex items-center pr-3 border-r icon-inherit whitenav:group-[.scrolled]/header:text-primary-600 text-white bookmark-toggle border-r-white whitenav:group-[.scrolled]/header:border-primary-600/50 lg:hover:text-primary-500 w-9 h-6" aria-label="<?= __('Toggla bokmärken', 'lightning'); ?>" aria-label="<?= __('Bokmärken', 'lightning'); ?>">
            <ion-icon name="bookmark-outline"></ion-icon>
        </button>

        <?php if (have_rows('footer_col_social_media', 'options')) : ?>
            <?php while (have_rows('footer_col_social_media', 'options')) : the_row();
                extract(acf_sub_fields(['footer_col_link', 'footer_col_icon']));
            ?>
                <?php if ($footer_col_link && $footer_col_icon) : ?>
                    <a class="hidden lg:flex items-center justify-start size-6 whitenav:group-[.scrolled]/header:text-primary-600/50 text-white lg:hover:!text-primary-500 icon-inherit" href="<?= $footer_col_link['url']; ?>" target="<?= $footer_col_link['target']; ?>" title="<?= $footer_col_link['title']; ?>">
                        <?= $footer_col_icon ?>
                    </a>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>

        <button id="main-menu-toggle" class="flex items-center text-primary-600 whitenav:text-white whitenav:group-[.scrolled]/header:text-primary-600 group main-menu-toggle-btn icon-inherit size-6 lg:hidden" aria-label="<?= __('Toggla menyn', 'lightning'); ?>" title="<?= __('Toggla menyn', 'lightning'); ?>">
            <ion-icon name="menu-outline" class="menu-toggle-icon group-[.menu-toggled]:hidden"></ion-icon>
            <ion-icon name="close-outline" class="menu-toggle-icon hidden group-[.menu-toggled]:block text-black"></ion-icon>
        </button>
    </div>
</nav><!-- #site-navigation -->