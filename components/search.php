<div class="absolute left-0 right-0 hidden w-full max-w-5xl mx-auto site-search-wrapper top-[calc(100%+10px)]">
    <div class="fixed top-0 left-0 right-0 w-full h-full search-overlay bg-black/25"></div>
    <form role="search" method="get" class="relative p-3 bg-white rounded-lg search-form" action="/">
        <div class="flex items-center w-full">
            <button type="submit" class="w-8 h-8 search-submit">
                <span class="material-icons-round">search</span>
            </button>
            <label class="w-full">
                <span class="screen-reader-text"><?php echo __('Sök efter:', 'lightning'); ?></span>
                <input type="search" class="!text-base !mb-0.5 font-normal !border-0 search-field main-search-input lg:!text-lg" placeholder="<?php echo __('Sök...', 'lightning'); ?>" name="s" data-rlvlive="true" data-rlvparentel="#rlvlive" data-rlvconfig="default">
            </label>
            <div class="flex items-center justify-center h-8 px-2 text-xs duration-300 rounded cursor-pointer close-search ring-1 ring-gray-200 hover:bg-gray-200" aria-label="<?php echo __('Stäng sökrutan', 'lightning'); ?>">
                <span class="mr-1 text-xs material-icons-round">close</span>
                <?php echo __('Stäng', 'lightning'); ?>
            </div>
        </div>
        <div id="rlvlive"></div>
    </form>
</div>