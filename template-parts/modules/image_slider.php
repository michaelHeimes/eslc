<?php
	$images = get_sub_field('images') ?? null;
	$caption = get_sub_field('caption') ?? null;
?>
<section class="module image-slider">
	<div class="grid-container">
		<div class="grid-x grid-padding-x align-center">

			<?php if( !empty( $images ) ):?>
			<div class="cell small-12 medium-11 tablet-10 large-8">
				<div class="image-slider-swiper overflow-hidden">
					<div class="swiper-container relative">
						<div class="swiper-btn swiper-button-prev">
							<svg width="28" height="49" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 24.83c0-.542.09-1.046.268-1.512.205-.506.52-.96.92-1.332L22.09 1.796c.644-.622 1.454-.94 2.428-.956.976-.014 1.8.304 2.474.956.674.65 1.01 1.44 1.01 2.366 0 .928-.336 1.716-1.01 2.368l-18.94 18.3 18.94 18.3a3.2 3.2 0 0 1 .988 2.344 3.12 3.12 0 0 1-.988 2.39 3.396 3.396 0 0 1-2.452.976c-.96 0-1.778-.326-2.452-.976l-20.9-20.192a3.72 3.72 0 0 1-.92-1.33A4.188 4.188 0 0 1 0 24.83Z" fill="#9E4541"/></svg>
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
						<div class="swiper-btn  swiper-button-next">
							<svg width="28" height="49" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M28 24.85c0 .542-.09 1.046-.268 1.512-.205.507-.519.961-.92 1.333L5.91 47.885c-.644.622-1.454.94-2.428.956-.976.014-1.8-.305-2.474-.956A3.17 3.17 0 0 1 0 45.52c0-.928.336-1.717 1.01-2.368l18.94-18.3-18.94-18.3a3.2 3.2 0 0 1-.988-2.345 3.12 3.12 0 0 1 .988-2.392A3.396 3.396 0 0 1 3.46.842c.96 0 1.778.326 2.452.976l20.9 20.192c.434.42.74.863.92 1.33.18.468.268.972.268 1.512Z" fill="#9E4541"/></svg>
						</div>
					</div>
					<div class="swiper-pagination"></div>
				</div>
				<?php if( !empty($caption) ):?>
					<p><?=esc_html( $caption );?></p>
				<?php endif;?>
			</div>
			<?php endif;?>
		</div>
	</div>
</section>