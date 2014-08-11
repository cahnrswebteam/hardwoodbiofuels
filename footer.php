<!-- **** START GET_FOOTER() ******************************-->
<div style="clear: both;"></div>
</section>
<!-- **** START FOOTER ******************************-->
<footer class="primary">
	<div class="footer-wrapper content-wrap">
    	<div class="footer-item-wrapper">
        	<?php if ( is_active_sidebar( 'footer-menu-left' ) ) : ?>
				<ul class="sidebar-item">
					<?php dynamic_sidebar( 'footer-menu-left' ); ?>
				</ul>
			<?php endif; ?>
        </div><!--
        --><div class="footer-item-wrapper">
        	<?php if ( is_active_sidebar( 'footer-menu-middle' ) ) : ?>
				<ul class="sidebar-item">
					<?php dynamic_sidebar( 'footer-menu-middle' ); ?>
				</ul>
			<?php endif; ?>
        </div><!--
        --><div class="footer-item-wrapper">
        	<?php if ( is_active_sidebar( 'footer-menu-right' ) ) : ?>
				<ul class="sidebar-item">
					<?php dynamic_sidebar( 'footer-menu-right' ); ?>
				</ul>
			<?php endif; ?>
        </div>
    </div>
    <div class="sub-footer-wrapper content-wrap">
    	<?php if ( is_active_sidebar( 'footer-menu-bottom' ) ) : ?>
				<ul class="sidebar-item">
					<?php dynamic_sidebar( 'footer-menu-bottom' ); ?>
				</ul>
			<?php endif; ?>
    </div>
</footer>
<?php wp_footer();?>
<!-- **** END FOOTER ******************************-->
</body>
</html>