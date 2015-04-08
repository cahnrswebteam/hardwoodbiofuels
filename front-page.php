<?php get_header();?>
<main id="front-page-template">
<?php get_template_part('parts/slideshow','front-page');?>	
<?php get_template_part('sections/front-page-caption');?>
<?php get_template_part('sections/audience-bar');?>	
<?php get_template_part('sections/resource-bar');?>	
<?php get_template_part('parts/loop','basic');?>
</main>
<?php get_footer();?>  