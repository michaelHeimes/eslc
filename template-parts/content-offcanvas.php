<?php
/**
 * The template part for displaying offcanvas content
 *
 * For more info: https://jointswp.com/docs/off-canvas-menu/
 */
?>

<div class="off-canvas position-right" id="off-canvas" data-off-canvas aria-hidden="true">

	<div class="inner">
		<form role="search" method="get" id="searchform"
			class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<div class="grid-x">
				<label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label' ); ?></label>
				<div class="cell auto">
					<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Search..."/>
				</div>
				<div class="cell shrink">
					<div class="submit-wrap">
						<input type="submit" id="searchsubmit"
					value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" />
					</div>
				</div>
			</div>
		</form>
		<?php trailhead_off_canvas_nav(); ?>
		<div class="mobile-nav-bottom">
			<?php 
			$link = get_field('donate_link', 'option');
			if( $link ): 
				$link_url = $link['url'];
				$link_title = $link['title'];
				$link_target = $link['target'] ? $link['target'] : '_self';
				?>
				<div class="cell shrink">
					<a class="button btn-tan small" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
				</div>
			<?php endif; ?>
			<?php trailhead_utility_nav();?>
		</div>
	</div>

	<?php if ( is_active_sidebar( 'offcanvas' ) ) : ?>

		<?php dynamic_sidebar( 'offcanvas' ); ?>

	<?php endif; ?>

</div>
