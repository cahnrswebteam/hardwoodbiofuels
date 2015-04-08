<section id="project-slideshow" class="content-wrapper">
    <div class="slideshow-wrapper">
        <div class="slideshow cycle-slideshow-featured"  data-cycle-timeout=0 data-cycle-fx="scrollHorz" 
    data-cycle-slides="> article">
            <?php 
			
			$nav = array();
			
            $query = new WP_Query( 
                array( 
                    'post__in'       => array( 1457,34,28,128,178,196 ),
                    'posts_per_page' => 6, 
                    'post_type'      => 'page',
                    'orderby'       => 'post__in',
                    'order'          => 'ASC',
                ) );
				
			$display = 'block';
            
            if ( $query->have_posts() ) {
				
				$index = 0;
                
                while ( $query->have_posts() ){
                    
                    $query->the_post();
					
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
					
					$img = get_the_post_thumbnail( $post_id , 'large' , array( 'class' => 'slide-image' ) );
					
					$title = get_the_title();
					
					$link = get_permalink();
					
					
					
					$nav[] = array( 'title' => $title, 'img' => $image[0], 'link' => $link );  
					
					echo '<article class="slide" style="display:' . $display . '">';
					
						echo '<div class="slide-image-wrapper" style="background-image: url(' . $image[0] . ')" >';
							
							echo '<a href="' . $link . '" >' . $img . '</a>';
						
						echo '</div>';
						
						if ( $index == 0 ) {
							
							echo '<div class="title-caption"><div><a href="' . $link . '" ><span>5</span> Research Areas</a></div></div>';
							
						} else {
						
							echo '<section class="slide-caption">';
							
								echo '<h4>' . $title . '</h4>';
								
								
								echo '<div class="caption-text">' . $query->post->post_excerpt . '</div>';
								
								
								echo '<a href="' . $link . '" >Read More ></a>';
							
							echo '</section>';
						}
					
					echo '</article>';
					
					$display = 'none';
					
					$index++;
                    
                } // end while
                
            } // end if
            
            wp_reset_postdata();
            
            ?>
        </div>
        
    </div>
    
    <nav class="slideshow-nav">
		<?php
        
            foreach ( $nav as $nav_index => $nav_item ) {
                
                    
                    echo '<a href="' . $nav_item['link'] . '" style="background-image: ' . $nav_item['img'] . '" >'. $nav_item['title'] . '</a>';
                
                
            } // end foreach
            
        ?>
    </nav>
    
</section>