<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package trailhead
 */

?>

				<footer id="colophon" class="site-footer">
					<div class="site-info">
						<div class="grid-container">
							<div class="grid-x grid-padding-x align-bottom">
								<div class="left cell small-12 tablet-6">
									<div class="top grid-x grid-padding-x">
										<?php if( !empty(  get_field('footer_logo', 'option') ) ) {
											$imgID =  get_field('footer_logo', 'option')['ID'];
											$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
											$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
											echo '<div class="logo-wrap cell small-12 medium-4">';
											echo $img;
											echo '</div>';
										}?>
										<?php if(wp_get_nav_menu_items(get_nav_menu_locations()['footer-links'])): ?>
											<div class="cell small-12 medium-shrink">
												<?php trailhead_footer_links();?>
												<?php if(wp_get_nav_menu_items(get_nav_menu_locations()['utility-nav'])): ?>
													<div class="hide-for-medium">
														<?php trailhead_utility_nav();?>
													</div>
												<?php endif;?>
												<?php 
												$link = get_field('donate_link', 'option');
												if( $link ): 
													$link_url = $link['url'];
													$link_title = $link['title'];
													$link_target = $link['target'] ? $link['target'] : '_self';
													?>
													<div class="donate-link-wrap">
														<a class="button tan" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
													</div>
												<?php endif; ?>
												<?php if(wp_get_nav_menu_items(get_nav_menu_locations()['social-links'])): ?>
													<?php trailhead_social_links();?>
												<?php endif;?>
											</div>
										<?php endif;?>
										<?php if(wp_get_nav_menu_items(get_nav_menu_locations()['utility-nav'])): ?>
											<div class="cell small-12 medium-auto show-for-medium">
												<?php trailhead_utility_nav();?>
											</div>
										<?php endif;?>
									</div>
									<div class="bottom grid-x grid-padding-x">
										<?php $accredidation_logos = get_field('accredidation_logos', 'option') ?? null;
											if( !empty($accredidation_logos) ):?>
											<div class="a-logos cell small-12">
												<div class="grid-x grid-padding-x align-middle">
													<?php 
													$images = $accredidation_logos;
													$size = 'full'; 
													if( $images ): ?>
														<?php foreach( $images as $image ): ?>
															<?php if( !empty( $image  ) ) {
																$imgID = $image ['ID'];
																$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
																$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
																echo '<div class="img-wrap cell shrink">';
																echo $img;
																echo '</div>';
															}?>
														<?php endforeach; ?>
													<?php endif; ?>
												</div>
											</div>
										<?php endif;?>
										<div class="contact cell small-12 small-14">
											<?php if( !empty( get_field('address', 'option') ) ) {
												echo '<div>' . esc_html( get_field('address', 'option') ) . '</div>';
											};?>
											<?php if( !empty( get_field('email', 'option') ) ) {
												echo '<div>Email: <a href="mailto:' . esc_html( get_field('email', 'option') ) . '"><u>' . esc_html( get_field('email', 'option') ) . '</u></a></div>';
											};?>
											<?php if( !empty( get_field('phone_number', 'option') ) ) {
												echo '<div>Phone: ' . esc_html( get_field('phone_number', 'option') ) . '</div>';
											};?>
											<div>
												&copy; Copyright <?php echo date('Y'); ?>
												<?php if( !empty( get_field('copyright_text', 'option') ) ) {
													echo esc_html( get_field('copyright_text', 'option') );
												};?>
											</div>
											<div>
												Made by <a href="https://propragency.com/" target="_blank"><u>Propr</u></a>
											</div>
										</div>
									</div>
								</div>
								<div class="right img-wrap cell small-12 tablet-6">
									<?php if( !empty( get_field('footer_image', 'option') ) ) {
										$imgID = get_field('footer_image', 'option')['ID'];
										$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
										$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );?>
										<div class="relative">
											<?=$img;?>
											<img class="mask" src="<?php echo get_template_directory_uri(); ?>/assets/images/footer-mask.svg" alt="ES Graphic Overlay">
										</div>
									<?php }?>
								</div>
							</div>
						</div>
					</div><!-- .site-info -->
				</footer><!-- #colophon -->
					
			</div><!-- #page -->
			
		</div>  <!-- end .off-canvas-content -->
							
	</div> <!-- end .off-canvas-wrapper -->
					
<?php wp_footer(); ?>

</body>
</html>
