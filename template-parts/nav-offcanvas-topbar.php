<?php
/**
 * The off-canvas menu uses the Off-Canvas Component
 *
 * For more info: https://jointswp.com/docs/off-canvas-menu/
 */
?>

<div class="top-bar-wrap grid-container">

	<div class="top-bar grid-x grid-padding-x" id="top-bar-menu">
	
		<div class="cell auto">
			
			<div class="site-branding show-for-sr">
				<?php
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;
				$trailhead_description = get_bloginfo( 'description', 'display' );
				if ( $trailhead_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $trailhead_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->
		
			<ul class="menu">
				<li class="logo"><a href="<?php echo home_url(); ?>">
					<?php 
					$image = get_field('header_logo', 'option');
					if( !empty( $image ) ): ?>
					    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					<?php endif; ?>
				</a></li>
			</ul>
						
		</div>
		<div class="cell shrink show-for-large">
			<div class="grid-x align-right">
				<div class="cell shrink">
					<div class="top grid-x grid-padding-x align-middle align-right">
						<div class="cell shrink">
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
						</div>
						<div class="cell shrink">
							<?php trailhead_utility_nav();?>
						</div>
					</div>
					<div class="bottom grid-x grid-padding-x align-middle align-right">
						<div class="cell auto">
							<?php trailhead_top_nav();?>
						</div>
						<?php 
						$link = get_field('donate_link', 'option');
						if( $link ): 
							$link_url = $link['url'];
							$link_title = $link['title'];
							$link_target = $link['target'] ? $link['target'] : '_self';
							?>
							<div class="cell shrink">
								<a class="button btn-tan" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<div class="cell shrink menu-toggle-wrap top-bar-right float-right hide-for-large">
			<ul class="menu">
				<!-- <li><button class="menu-icon" type="button" data-toggle="off-canvas"></button></li> -->
				<li><a id="menu-toggle" data-toggle="off-canvas" aria-expanded="false" aria-controls="off-canvas"><span></span><span></span><span></span></a></li>
			</ul>
		</div>
	</div>
	
</div>