<?php
	$fields = get_sub_field('image_slider');
	$copy = $fields['copy'];
	$images = $fields['images'];
?>
<section class="module image-slider">
	<div class="grid-container">
		<div class="grid-x grid-padding-x align-center">
			<?php if( !empty( $copy ) ):?>
			<div class="header cell small-12 medium-11 tablet-8">
				<?= $copy;?>
			</div>
			<?php endif;?>
			<?php if( !empty( $images ) ):?>
			<div class="cell small-12 medium-11 tablet-8">
				<div class="image-slider-swiper overflow-hidden">
					<div class="swiper-container relative">
						<div class="swiper-nav swiper-button-prev">
							
						</div>
						<div class="swiper-wrapper align-middle small-up-1 medium-up-2 tablet-up-4">
							<?php foreach($images as $image):?>
								<?php if( !empty( $image ) ) {
									$imgID = $image['ID'];
									$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
									$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
									echo '<div class="swiper-slide cell text-center">';
									echo $img;
									echo '</div>';
								}?>
							<?php endforeach;?>
						</div>
						<div class="swiper-nav swiper-button-next"></div>
					</div>
					<div class="swiper-pagination"></div>
				</div>
			</div>
			<?php endif;?>
		</div>
	</div>
</section>