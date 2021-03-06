<?php

class WSU_Spokane {
	/**
	 * Setup the hooks used by the theme.
	 */
	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'register_menus' ), 10 );
		add_action( 'widgets_init', array( $this, 'setup_sidebars' ), 10 );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ), 20 );
		add_filter( 'spine_option', array( $this, 'filter_spine_color' ), 10, 2 );
	}

	/**
	 * Register the menus used by WSU Spokane.
	 */
	public function register_menus() {
		// The primary portion of the Mega Menu at the top of the home page.
		register_nav_menu( 'mega-menu', 'Mega Menu' );

		// A section of the Mega Menu, visible when expanded, highlighting signature links.
		register_nav_menu( 'signature-menu', 'Signature Menu' );

		// Used inside the search area.
		register_nav_menu( 'quick-links', 'Quick Links' );
	}

	/**
	 * Setup a fat footer area in which widgets can be used for navigation, text areas, etc...
	 */
	public function setup_sidebars() {
		$fat_footer_args = array(
			'name'          => 'Fat Footer Area',
			'id'            => 'fat-footer',
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
		);
		register_sidebar( $fat_footer_args );
	}

	public function enqueue_scripts() {
			wp_enqueue_script( 'wsu-spokane-navigation', get_stylesheet_directory_uri() . '/js/navigation.js', array( 'jquery', 'backbone' ), spine_get_script_version(), true );
			wp_enqueue_script( 'wsu-spokane-primary', get_stylesheet_directory_uri() . '/js/primary.js', array( 'wsu-spokane-navigation' ), spine_get_script_version(), true );
	}

	/**
	 * Modify the color used for the Spine on the front page.
	 *
	 * @param string $value  The current Spine color (or other option value).
	 * @param string $option The current Spine option being filtered.
	 *
	 * @return string The modified Spine color.
	 */
	public function filter_spine_color( $value, $option ) {
		if ( 'spine_color' !== $option ) {
			return $value;
		}

		$site = get_site();

		// We don't want to match any sub-sites.
		if ( '/' !== $site->path ) {
			return $value;
		}

		if ( is_front_page() ) {
			return 'crimson';
		}

		return $value;
	}
}
new WSU_Spokane();
