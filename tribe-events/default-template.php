<?php get_header();?>
<?php get_template_part('parts/column','left');?>
<main id="page-template" class="has_left_nav">
	<div class="main-inner-wrapper">
<div id="page-builder" class="layout-builder-wrap">
	 <section class="row column-layout-1 single">
    	<div class="column one">
        
        <div id="tribe-events-pg-template">
	<?php tribe_events_before_html(); ?>
	<?php tribe_get_view(); ?>
	<?php tribe_events_after_html(); ?>
</div> <!-- #tribe-events-pg-template -->
        
        
        </div>
	</section>
</div>
</div>


<?php //get_template_part('parts/loop','basic');?>
</main>
<?php get_footer();?>