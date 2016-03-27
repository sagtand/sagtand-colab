<div class="ffda-menus" role="navigation">
    <nav class="ffda-menus_element">
        <div class="ffda-menus_logo">
            <h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
        </div>
        <span role="button" aria-label="Meny" aria-pressed="false" id="ffda-menus_toggle" class="icon-menu"></span>
        <div class="ffda-menus_container" id="ffda-menus_container">
        	<div class="ffda-menu_wrapper ffda-menu_wrapper-primary">
	            <?php foundationPress_top_bar_l(); ?>
	        </div>
        	<div class="ffda-menu_wrapper ffda-menu_wrapper-secondary">
	            <?php foundationPress_top_bar_r(); ?>
	        </div>
        </div>
    </nav>
</div>