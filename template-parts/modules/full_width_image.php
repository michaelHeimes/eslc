<?php
$full_width_image = get_sub_field('full_width_image') ?? null;
?>
<section class="full_width_image module">
	<?php if( !empty( $full_width_image ) ) {
		$imgID = $full_width_image['ID'];
		$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
		$img_caption = wp_get_attachment_caption( $imgID ); // Get the caption
		$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );?>
		<div class="img-wrap">
			<?=$img;?>
		</div>
		<?php if( $img_caption ):?>
			<div class="grid-container">
				<div class="grid-x grid-padding-x align-center">
					<div class="cell small-12 medium-11 tablet-10 large-8">
						<?=esc_html(  $img_caption );?>
					</div>
				</div>
			</div>
		<?php endif;?>
	<?php };?>
</section>