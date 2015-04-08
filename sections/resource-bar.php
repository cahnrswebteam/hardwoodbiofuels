<section id="resource-bar">
	<div class="content-wrapper">
    	<div class="resource-title">
        	Resources
        </div>
        <a href="#" id="prev" class="slideshow-prev slideshow-nav"><span></span>
        
        </a><div class="resource-slider-wrapper">
        	
            
            <div class="resource-slider cycle-slideshow" data-cycle-fx="scrollHorz" 
        data-cycle-slides="> div" data-cycle-timeout=4000 data-cycle-prev="#prev"
            data-cycle-next="#next" >
            <?php
                $query = new WP_Query( 
                    array( 
                        'post__in'       => array( 2803,1313,1643,1273,2323,3815,2761 ),
                        'posts_per_page' => 7, 
                        'post_type'      => 'page',
                        'orderby'       => 'post__in',
                        'order'          => 'ASC',
                    ) );
                
                $display = '';
                
                if ( $query->have_posts() ) {
                    
                    while ( $query->have_posts() ){
                        
                        $query->the_post();
                        
                        echo '<div class="slider-slide" ' . $display . '>';
                                
                                echo '<figure>';
                                    
                                    echo '<div class="slider-image">';
                                        
                                        the_post_thumbnail();
                                    
                                    echo '</div>';
                                    
                                    echo '<figcaption>';
                                        
                                        
                                        echo '<div class="caption-text">' . $query->post->post_excerpt;
										
										echo '<br /><a style="text-transform:uppercase; font-size: 0.7rem" href="' . get_permalink() . '">Read More > </a></div>';
                                    
                                    echo '</figcaption>';
                                
                                echo '</figure>';
                        
                        echo '</div>';
                        
                        $display = ' style="display: none;" ';
                        
                    } // end while
                    
                } // end if
                
                ?>
            </div>
        </div><a href="#" id="next" class="slideshow-next slideshow-nav"><span></span></a>
    </div>
</section>