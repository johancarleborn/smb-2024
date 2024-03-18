<nav id="site-navigation" class="flex items-center py-2 sm:py-3 lg:py-0 main-navigation">
    <div class="flex items-center nav-left">
        <a class="flex flex-col items-start site-logo" href="<?= home_url(); ?>">

            <?php if (globalACF()['site_logo']) : ?>
                <div class="max-w-[120px] sm:max-w-[160px] xl:max-w-[220]">
                    <?= image(globalACF()['site_logo'], 'full', 'logo'); ?>
                </div>
            <?php endif; ?>
        </a>

        <?php
        $walker = new Menu_content;
        wp_nav_menu(
            array(
                'theme_location'  => 'menu-1',
                'container_id'    => 'main-menu', // wrapping the ul element
                'container_class' => 'max-lg:absolute left-0 lg:px-4 py-6 lg:p-0 mx-auto min-w-full bg-white lg:min-w-[320px] top-full bg-slate-100 hidden lg:block h-[calc(100vh-74px)] lg:h-auto', // wrapping the ul element
                'menu_id'         => 'primary-menu', // ul element
                'menu_class'      => 'flex flex-col w-full lg:flex-row lg:items-center lg:ml-6 max-lg:overflow-auto h-full lg:h-auto', // ul element
                'walker'          => $walker,
            )
        );
        ?>
    </div>




    <div class="flex items-center ml-auto gap-x-3 md:gap-x-4 nav-right">

        <?php btn_l_primary(globalACF()['menu_btn'], 'py-2 px-3 md:px-4 lg:px-6 text-xs sm:text-sm md:text-base'); ?>

        <button class="flex items-center search-toggle nav-btn" aria-label="<?= __('Toggla sök', 'lightning'); ?>" title="<?= __('Sök', 'lightning'); ?>">
            <span class="text-black material-icons-round">search</span>
        </button>
        <?php get_template_part('components/search'); ?>

        <button id="main-menu-toggle" class="flex items-center nav-btn group main-menu-toggle-btn lg:hidden" aria-label="<?= __('Toggla menyn', 'lightning'); ?>" title="<?= __('Toggla menyn', 'lightning'); ?>">
            <span class="material-icons-round menu-toggle-icon group-[.menu-toggled]:hidden">menu</span>
            <span class="material-icons-round menu-toggle-icon hidden group-[.menu-toggled]:block text-black">close</span>
        </button>
    </div>
</nav><!-- #site-navigation -->