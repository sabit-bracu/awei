<?php
	wp_nav_menu( array(
		'menu'              => '',
		'theme_location'    => 'primary',
		'depth'             => 2,
		'container'         => '',
		'container_class'   => '',
		'menu_class'        => 'nav navbar-nav navbar-right',
		'menu_id'           => 'main-menu',
		'echo'              => true,
		'fallback_cb'       => 'Nt_Advent_Wp_Bootstrap_Navwalker::fallback',
		'walker'            => new Nt_Advent_Wp_Bootstrap_Navwalker()
	));
?>
