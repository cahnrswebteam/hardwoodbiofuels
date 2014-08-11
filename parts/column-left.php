<section id="site-column-left">
	<div class="inner-wrapper">
    	 <?php 
		 if( has_nav_menu( 'secondary-navigation-menu' ) ){
			 $menuArgs = array(
			 	'theme_location'  => 'secondary-navigation-menu',
				'menu_id' => 'secondary-navigation-menu',
			 	);
			 wp_nav_menu( $menuArgs );
			 }
		 ;?>
    </div>
</section>