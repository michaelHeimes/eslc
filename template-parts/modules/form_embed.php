<?php

$has_bg_img = false;
$form_embed_background_image = get_sub_field('form_embed_background_image') ?? null;
$form_embed_background_image_url = $form_embed_background_image['url'] ?? null;
if( !empty($form_embed_background_image) ) {
	 $has_bg_img = true;
}
$form_embed_heading = get_sub_field('form_embed_heading') ?? null;
$form_embed_form_code = get_sub_field('form_embed_form_code') ?? null;
$form_embed_add_drop_shadow_to_form = get_sub_field('form_embed_add_drop_shadow_to_form') ?? null;
?>

<?php if( !empty($form_embed_background_image) || !empty($form_embed_heading) || !empty($form_embed_form_code)  ):?>
	<section class="form_embed module relative<?php if($has_bg_img == true) { echo ' has-bg-img relative';}; if( $form_embed_add_drop_shadow_to_form ) { echo ' drop-shadow'; };?>" style="background-image: url(<?=esc_url( $form_embed_background_image_url );?>)">
		<div class="grid-container relative">
			<div class="grid-x grid-padding-x align-center">
				<div class="cell small-11 medium-10 tablet-8">
					<div class="inner bg-white">
						<?php if( !empty($form_embed_heading) ):?>
							<h2 class="text-center color-green"><?=esc_html( $form_embed_heading );?></h2>
						<?php endif;?>
						<?php if( !empty($form_embed_form_code) ):?>
							<?=$form_embed_form_code;?>
						<?php endif;?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif;?>
