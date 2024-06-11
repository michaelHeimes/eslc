<?php
$has_bg_img = false;
$newsletter_background_image = get_sub_field('newsletter_background_image') ?? null;
 if( !empty($newsletter_background_image) ) {
	 $has_bg_img = true;
 }
$newsletter_heading = get_sub_field('newsletter_heading') ?? null;
$newsletter_form_code = get_sub_field('newsletter_form_code') ?? null;
?>

<?php if( !empty($newsletter_background_image) || !empty($newsletter_heading) || !empty($newsletter_form_code)  ):?>
	<section class="newsletter_signup module relative<?php if($has_bg_img == true) { echo ' has-bg-img relative';};?>" style="background-image: url(<?=esc_url( $newsletter_background_image['url']);?>)">
		<div class="grid-container relative">
			<div class="grid-x grid-padding-x align-center">
				<div class="cell small-11 medium-10 tablet-8">
					<div class="inner bg-white">
						<?php if( !empty($newsletter_heading) ):?>
							<h2 class="text-center color-green"><?=esc_html( $newsletter_heading );?></h2>
						<?php endif;?>
						<?php if( !empty($newsletter_form_code) ):?>
							<?=$newsletter_form_code;?>
						<?php endif;?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif;?>
