<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>?v=3" type="text/css" media="screen" />
<script type='text/javascript' src='<?php echo get_template_directory_uri();?>/js/html5shiv.js?ver=1.0.0'></script>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-43491251-1', 'auto');
  ga('send', 'pageview');

</script>
<!-- **** START THEME HEADER ******************************** -->
<header class="primary">
	<div class="banner-wrapper content-wrap">
    	<form class="header-search" method="get" id="searchform" action="http://hardwoodbiofuels.org/">
        	<input type="text" class="search-box" value="search" name="s" id="s" />
            <input type="submit" id="searchsubmit" value=">" class="btn">
			<!--<div class="submit-button"></div> -->
        </form>
    	<img class="logo" src="<?php echo get_template_directory_uri();?>/images/banner-logo.png" />
    </div>
    <nav class="more">
    	<?php
			$mArgs = array('menu' => 'Primary Navigation', 'menu_class' => 'more-nav-wrapper', 'container' => false );
			wp_nav_menu( $mArgs );?>
    </nav>
    <div class="nav-wrapper">
    	<nav class="primary content-wrap">
        	<div class="sub-logo">
            	<img class="logo" src="<?php echo get_template_directory_uri();?>/images/logo-bottom.png" />
            </div><?php
				$mArgs = array('menu' => 'Primary Navigation', 'menu_class' => 'primary-nav', 'container' => false );
				wp_nav_menu( $mArgs );?><ul class="more-nav">
            	<li class="more-item"><img src="<?php echo get_template_directory_uri();?>/images/menu.png" /><span class="more">Menu</span><span class="menu">Menu</span></li>
            </ul>
        </nav>
    </div> 
</header>
<!-- **** END THEME HEADER ******************************** -->
<?php
$cat_list = '';
//if( is_single() ){ 
//$cat_list = 'post-'.$post_id.'';
$categories = (array) \get_the_category();
    foreach($categories as $category) {    // concate
        $cat_list .= ' ' . $category->category_nicename;
   // };
}?>
<section id="primary-content" class="content-wrap <?php echo $cat_list;?>">
<!-- **** END GET_HEADER() ******************************-->