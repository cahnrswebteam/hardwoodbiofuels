<?php 
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post(); 
			//the_content();
			global $cahnrs_pagebuilder;
			if( $cahnrs_pagebuilder && method_exists( $cahnrs_pagebuilder, 'render_site' ) ):?>
				<?php echo $cahnrs_pagebuilder->render_site();?>
			<?php else:?>
                <?php if( !is_front_page() ):?>
                	<h1 class="basic"><?php echo the_title();?></h1>
                <?php endif;?>
            	<?php the_content();?>
            <?php endif;
		} // end while
	} // end if
?>