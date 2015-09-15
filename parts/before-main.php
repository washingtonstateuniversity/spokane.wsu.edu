<?php

switch_to_blog( 29 );

	$mega_menu_args = array(
		'theme_location'  => 'mega-menu',
		'menu'            => 'mega-menu',
		'container'       => 'div',
		'container_class' => 'mega-menu-wrapper',
		'container_id'    => 'mega-menu',
		'menu_class'      => null,
		'menu_id'         => null,
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 5,
	);

	$header_mega_menu_args = array(
		'theme_location'  => 'mega-menu',
		'menu'            => 'mega-menu',
		'container'       => 'div',
		'container_class' => 'mega-menu-labels-wrapper',
		'container_id'    => 'mega-menu-labels',
		'menu_class'      => null,
		'menu_id'         => null,
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 1,
	);

	$signature_menu_args = array(
		'theme_location'  => 'signature-menu',
		'menu'            => 'signature-menu',
		'container'       => 'div',
		'container_class' => 'signature-menu-wrapper',
		'container_id'    => 'signature-menu',
		'menu_class'      => null,
		'menu_id'         => null,
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 1,
	);

	$wsu_search_args = array(
		'theme_location'  => 'quick-links',
		'menu'            => 'quick-links',
		'container'       => 'div',
		'container_class' => false,
		'container_id'    => 'quick-links',
		'menu_class'      => null,
		'menu_id'         => null,
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 2,
	);
	?>
	<header class="main-header wsu-home-navigation">

		<div class="header-shelf-wrapper">
			<section class="single triptych row header-shelf">
				<div class="column one">
					<div class="wsu-logo">
						<!-- logo will go here -->
					</div>
				</div>
				<div class="column two wsu-mega-nav-labels">
					<?php wp_nav_menu( $header_mega_menu_args ); ?>
				</div>
				<div class="column three wsu-other-nav-placeholder">
					<div class="search-label">Search</div>
				</div>
			</section>
		</div>
		<div class="header-drawer-wrapper">
			<section class="single triptych row header-drawer">
				<div class="column one wsu-signature-nav-container">
					<?php wp_nav_menu( $signature_menu_args ); ?>
				</div>
				<div class="column two wsu-mega-nav-container">
					<?php wp_nav_menu( $mega_menu_args ); ?>
				</div>
				<div class="column three">
					<!-- Empty with purpose. -->
				</div>
			</section>
			<div class="close-header-drawer">x</div>
		</div>
		<!-- Search interface, hidden by default until interaction in header -->
		<div class="header-search-wrapper header-search-wrapper-hide">
			<section class="side-right row" id="search-modal">
				<div class="column one">
					<div class="header-search-input-wrapper">
						<form method="get" action="https://search.wsu.edu/Default.aspx">
							<input name="cx" value="002970099942160159670:yqxxz06m1b0" type="hidden">
							<input name="cof" value="FORID:11" type="hidden">
							<input name="sa" value="Search" type="hidden">
							<label for="header-search">Search</label>
							<input type="text" value="" name="q" placeholder="Search" class="header-search-input" />
						</form>
					</div>
					<div class="header-search-a-z-wrapper">
						<span class="search-a-z"><a href="http://index.wsu.edu/">A-Z Index</a></span>
					</div>
				</div>
				<div class="column two">
					<div class="quick-links-label">Common Searches</div>
					<?php wp_nav_menu( $wsu_search_args); ?>
				</div>
			</section>
			<div class="close-header-search">x</div>
		</div>
	</header>
<?php restore_current_blog();