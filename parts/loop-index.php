<?php 
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();?>
            <div class="post-item-wrapper <?php if( has_post_thumbnail() ) echo 'has_image';?>">
            	<?php if( has_post_thumbnail() ):?>
            	<div class="post-image-wrapper">
                	<a href="<?php the_permalink(); ?>">
                	<?php the_post_thumbnail('thumbnail');?> 
                    </a>
                </div>
                <?php endif;?>
                <div class="post-content-wrapper">
                	<h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
                    <div class="post-excerpt">
                    	<a href="<?php the_permalink(); ?>">
                    	<?php the_excerpt();?>
                        </a>
                    </div>
                </div>
                <div style="clear: both;"></div>
            </div>
		<?php } // end while
	} // end if
?>