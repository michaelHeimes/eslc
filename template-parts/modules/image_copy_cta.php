<?php
$remove_top_padding = get_sub_field('remove_top_padding') ?? null; 
$remove_bottom_padding = get_sub_field('remove_bottom_padding') ?? null; 
$img_copy_cta_background_color = get_sub_field('img_copy_cta_background_color') ?? null;
$img_copy_cta_image = get_sub_field('img_copy_cta_image') ?? null;
$img_copy_cta_heading = get_sub_field('img_copy_cta_heading') ?? null;
$img_copy_cta_text = get_sub_field('img_copy_cta_text') ?? null;
$img_copy_cta_button_link = get_sub_field('img_copy_cta_button_link') ?? null;
?>

<?php if( !empty($img_copy_cta_background_color) || !empty($img_copy_cta_image) || !empty($img_copy_cta_heading) || !empty($img_copy_cta_text) || !empty($img_copy_cta_button_link) ):?>
	<section class="img-copy-cta module<?php if($remove_top_padding == true) { echo ' no-top-padding';} if ($remove_bottom_padding == true) { echo ' no-bottom-padding';}?>">
		<div class="grid-container">
			<div class="bg-<?=esc_attr( $img_copy_cta_background_color );?>">
				<div class="grid-x grid-padding-x">
					<?php if( !empty( $img_copy_cta_image ) ) {
						$imgID = $img_copy_cta_image['ID'];
						$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
						$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
						echo '<div class="img-wrap cell small-12 medium-6">';
						echo $img;
						echo '</div>';
					}?>
					<?php if( !empty($img_copy_cta_heading) || !empty($img_copy_cta_text) || !empty($img_copy_cta_button_link) ):?>
						<div class="right cell small-12 medium-6 grid-x align-middle">
							<div>
								<?php if( !empty($img_copy_cta_heading) ):?>
									<h2><?=esc_html( $img_copy_cta_heading );?></h2>
								<?php endif;?>
								<?php if( !empty($img_copy_cta_text) ):?>
									<div class="text-wrap"><?=wp_kses_post( $img_copy_cta_text );?></div>
								<?php endif;?>
								<?php 
								$link = $img_copy_cta_button_link;
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
				</div>
			</div>
		</div>
	</section>
<?php endif;?>