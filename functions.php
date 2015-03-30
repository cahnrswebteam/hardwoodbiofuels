<?php
class ahb_site_settings{
	
	public function init(){ 
	
		\date_default_timezone_set('America/Los_Angeles');
		
		$this->url = \get_stylesheet_directory_uri();
		add_action( 'wp_enqueue_scripts', array( $this , 'init_theme_scripts' ) );
		add_action( 'widgets_init', array( $this , 'add_sidebars' ) );
		add_action( 'init' , array( $this , 'ahbwp_init' ) );
		
		add_filter( 'tribe_events_event_schedule_details' , array( $this , 'ahb_filter_date' ) );
		
		if ( !is_admin() ){
			\add_action( 'template_redirect', array( $this , 'ahb_redirect' ) );
		}
		if ( is_admin() ) {
    		\add_action( 'load-post.php', array( $this , 'add_metabox' ) );
    		\add_action( 'load-post-new.php', array( $this , 'add_metabox' ) );
		}
	}
	
	public function ahb_filter_date( $the_date ) {
		
		
		
		return $the_date . ' ' . date( 'T' );
		
	} // end ahb_filter_date 
	
	public function ahbwp_init(){
		
		\add_post_type_support( 'page', 'excerpt' );
		
	}
	
	public function add_metabox( $post ){
		$redirect_screens = array( 'post', 'page' , 'feature_slides' );

		foreach ( $redirect_screens as $screen ) {
			add_meta_box(
				'ahb_redirect'
				,'Redirect To:'
				,array( $this, 'render_redirect_meta_box' )
				, $screen
				,'normal'
				,'high'
			);
		}
	}
	
	public function render_redirect_meta_box( $post ){
		$redirect_meta = get_post_meta( $post->ID , '_redirect_to', true );
		 echo '<input type="text" style="width: 80%;" name="_redirect_to" value="'.$redirect_meta.'" />';
	}
	
	public function init_theme_scripts(){
		
		wp_enqueue_script('jquery');
		
		wp_enqueue_script( 'hardwoodbiofuels_js',  get_template_directory_uri() . '/js/hardwoodbiofuels.js', array(), '2.0.0', true );
		
		wp_enqueue_script( 'hardwoodbiofuels_ajax_js',  get_template_directory_uri() . '/js/ajax.js', array(), '2.0.0', true );
		                 
		wp_register_style( 'ahb_css_header', $this->url.'/css/header.css', array(), '2.1.1' );
		wp_enqueue_style( 'ahb_css_header' );
		
		wp_register_style( 'ahb_css_footer', $this->url.'/css/footer.css', array(), '2.1.1' );
		wp_enqueue_style( 'ahb_css_footer' );
		
		wp_register_style( 'ahb_css_content', $this->url.'/css/content.css', array(), '2.1.1' );
		wp_enqueue_style( 'ahb_css_content' );
		
		/**************************** 
		** ADD CUSTOM IMAGE SIZES **
		*****************************/
		
		add_action('init' , array( $this , 'add_image_sizes' ) );
		add_filter( 'image_size_names_choose', array( $this , 'add_custom_image_sizes' ) );
		
		//add_action( 'admin_init', array( $this ,'add_taxes') );
	}
	
	public function add_taxes() {  
		// Add tag metabox to page
		register_taxonomy_for_object_type('post_tag', 'page'); 
		// Add category metabox to page
		register_taxonomy_for_object_type('category', 'page'); 
		// Add tag metabox to page
		register_taxonomy_for_object_type('post_tag', 'video'); 
		// Add category metabox to page
		register_taxonomy_for_object_type('category', 'video'); 
	}
	
	public function add_image_sizes(){
		 add_image_size( '4x3-medium', 400, 300, true );
		 add_image_size( '3x4-medium', 300, 400, true );
		 add_image_size( '16x9-medium', 400, 225, true );
		 add_image_size( '16x9-large', 800, 450, true );
	 }
	 
	 public function add_custom_image_sizes( $sizes ){
		 return array_merge( $sizes, array(
        	'4x3-medium' => '4x3-medium',
			'3x4-medium' => '3x4-medium',
			'16x9-medium' => '16x9-medium',
			'16x9-large' => '16x9-large',
    		) );
	 }
	 
	 public function add_sidebars(){
		$sideArray = array();
		$sideArray[] = array(
			'name'	=> __( 'Footer Menu - Right' ),
			'id' => 'footer-menu-right',
			'description' => 'Right Footer Menu Area',
        	'class' => '',
			'before_widget' => '<li class="widget %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '',
			'after_title'   => '' 
		);
		$sideArray[] = array(
			'name'	=> __( 'Footer Menu - Middle' ),
			'id' => 'footer-menu-middle',
			'description' => 'Middle Footer Menu Area',
        	'class' => '',
			'before_widget' => '<li class="widget %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '',
			'after_title'   => '' 
		);
		$sideArray[] = array(
			'name'	=> __( 'Footer Menu - Left' ),
			'id' => 'footer-menu-left',
			'description' => 'Left Footer Menu Area',
        	'class' => '',
			'before_widget' => '<li class="widget %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '',
			'after_title'   => '' 
		);
		$sideArray[] = array(
			'name'	=> __( 'Footer Menu - Footer Bottom' ),
			'id' => 'footer-menu-bottom',
			'description' => 'Bottom Footer Menu Area',
        	'class' => '',
			'before_widget' => '<li class="widget %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '',
			'after_title'   => '' 
		);
		$sideArray[] = array(
			'name'	=> __( 'Events Sidebar' ),
			'id' => 'events-sidebar',
			'description' => 'Sidebar for Events',
        	'class' => '',
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '' 
		);
		foreach( $sideArray as $sidebar ){
			register_sidebar( $sidebar );
		}
	}
	
	public function ahb_redirect(){
		 global $post; // GET GLOBAL POST OBJ
		 $redirect_types = array( 'page' , 'post' , 'feature_slides' ); // TYPES TO REDIRECT
		 if( in_array( $post->post_type , $redirect_types ) ) { // CHECK IF TYPE
		 	if( is_singular() && is_main_query() ){ // CHECK IF SINGULAR
				$meta = \get_post_meta( $post->ID , '_redirect_to' , true ); // GET META
			 	if( $meta ){ // IF META EXISTS
				 	\wp_redirect( $meta , 302 ); // DO REDIRECT
			 	} // END IF
			} // END IF
		 } // END IF
	 }
	
}
$init_ahb = new ahb_site_settings();
$init_ahb->init();?>