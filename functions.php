<?php
class ahb_site_settings{
	
	public function init(){ 
		$this->url = \get_stylesheet_directory_uri();
		add_action( 'wp_enqueue_scripts', array( $this , 'init_theme_scripts' ) );
		add_action( 'widgets_init', array( $this , 'add_sidebars' ) );
	}
	
	public function init_theme_scripts(){
		
		wp_enqueue_script('jquery');
		
		wp_enqueue_script( 'hardwoodbiofuels_js',  get_template_directory_uri() . '/js/hardwoodbiofuels.js', array(), '2.0.0', true );
		
		wp_enqueue_script( 'hardwoodbiofuels_ajax_js',  get_template_directory_uri() . '/js/ajax.js', array(), '2.0.0', true );
		                 
		wp_register_style( 'ahb_css_header', $this->url.'/css/header.css' );
		wp_enqueue_style( 'ahb_css_header' );
		
		wp_register_style( 'ahb_css_footer', $this->url.'/css/footer.css' );
		wp_enqueue_style( 'ahb_css_footer' );
		
		wp_register_style( 'ahb_css_content', $this->url.'/css/content.css?v=5');
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
		foreach( $sideArray as $sidebar ){
			register_sidebar( $sidebar );
		}
	}
}
$init_ahb = new ahb_site_settings();
$init_ahb->init();?>