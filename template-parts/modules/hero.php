<?php
$hero_heading = get_sub_field('hero_heading') ?? null;
$hero_large_text = get_sub_field('hero_large_text') ?? null;
$hero_button_link = get_sub_field('hero_button_link') ?? null;
$hero_image = get_sub_field('hero_image') ?? null;
?>

<?php if( !empty($hero_heading) || !empty($hero_large_text) || !empty($hero_button_link) || !empty($hero_image) ):?>
	<header class="entry-header home-hero relative bg-dark-green">
		<div class="grid-container">
			<div class="grid-x grid-padding-x align-middle">
				<?php if( !empty($hero_heading) || !empty($hero_large_text) ):?>
					<div class="left cell small-12 medium-6 tablet-5">
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
								<a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
							</div>
						<?php endif; ?>
					</div>
				<?php endif;?>
				<?php if( !empty( $hero_image ) ) {
					$imgID = $hero_image['ID'];
					$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
					$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );?>
					<div class="img-wrap cell small-12 medium-6 tablet-7">
						<div class="relative">
							<?=$img;?>
							<img class="mask" src="<?php echo get_template_directory_uri(); ?>/assets/images/hero-mask.svg" alt="ES Graphic Overlay">
						</div>
					</div>
				<?php }?>
			</div>
		</div>
	</header><!-- .entry-header -->
<?php endif;?>