<?php
$hero_heading = get_sub_field('hero_heading') ?? null;
$hero_large_text = get_sub_field('hero_large_text') ?? null;
$hero_button_link = get_sub_field('hero_button_link') ?? null;
$hero_image = get_sub_field('hero_image') ?? null;
?>

<?php if( !empty($hero_heading) || !empty($hero_large_text) || !empty($hero_button_link) || !empty($hero_image) ):?>
	<header class="entry-header home-hero relative bg-dark-green">
		<div class="grid-container">
			<div class="grid-x grid-padding-x">
				<?php if( !empty($hero_heading) || !empty($hero_large_text) ):?>
					<div class="left cell small-12 tablet-5 large-4 grid-x align-middle">
						<div>
							<?php if( !empty($hero_heading) ):?>
								<h1 class="color-tan">
									<?=esc_html( $hero_heading );?>
									<?php if( !empty($hero_large_text) ):?>
										<br><span class="font-body color-white"><?=esc_html( $hero_large_text );?></span>
									<?php endif;?>
								</h1>
							<?php endif;?>
							<?php 
							$link = $hero_button_link;
							if( $link ): 
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
								?>
								<div class="btn-wrap">
									<a class="button large" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
								</div>
							<?php endif; ?>
						</div>
					</div>
				<?php endif;?>
				<?php if( !empty( $hero_image ) ) {
					$imgID = $hero_image['ID'];
					$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
					$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );?>
					<div class="img-wrap cell small-12 tablet-7 large-8 grid-x align-bottom">
						<div class="relative">
							<?=$img;?>
							<img class="mask" src="<?php echo get_template_directory_uri(); ?>/assets/images/hero-mask.svg" alt="ES Graphic Overlay">
						</div>
					</div>
				<?php }?>
			</div>
		</div>
		<div data-smooth-scroll data-animation-duration="400" data-animation-easing="swing">
			<a id="first-link" class="down-arrow" href="#first">
				<svg width="48" height="48" fill="none" xmlns="http://www.w3.org/2000/svg"><circle opacity=".501" cx="24" cy="24" r="24" fill="#483627"/><path d="M23.995 31c-.27 0-.523-.045-.756-.134a1.86 1.86 0 0 1-.666-.46L12.478 19.955c-.31-.321-.47-.726-.478-1.213-.007-.488.152-.9.478-1.237.325-.337.72-.505 1.182-.505.464 0 .858.168 1.184.505l9.15 9.47 9.15-9.47a1.6 1.6 0 0 1 1.172-.494 1.56 1.56 0 0 1 1.195.494A1.7 1.7 0 0 1 36 18.73c0 .48-.163.889-.488 1.226l-10.096 10.45a1.86 1.86 0 0 1-.665.46c-.234.09-.486.134-.756.134h.001Z" fill="#fff"/></svg>
			</a>
		</div>
	</header><!-- .entry-header -->
<?php endif;?>