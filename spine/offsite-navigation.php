<nav id="spine-offsitenav" class="spine-offsitenav">
	<?php

	if ( ! defined( 'WSU_LOCAL_CONFIG' ) || ! WSU_LOCAL_CONFIG ) {
		switch_to_blog( 29 );
	}

	$offsite_mega_menu_args = array(
		'theme_location'  => 'mega-menu',
		'menu'            => 'mega-menu',
		'container'       => 'div',
		'container_class' => 'offsite-mega-menu-wrapper',
		'container_id'    => 'offsite-mega-menu',
		'menu_class'      => null,
		'menu_id'         => null,
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 1,
	);
	wp_nav_menu( $offsite_mega_menu_args );

	if ( is_multisite() && ms_is_switched() ) {
		restore_current_blog();
	}
	?>
</nav>