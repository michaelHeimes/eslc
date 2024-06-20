<?php
$remove_top_padding = get_sub_field('remove_top_padding') ?? null; 
$remove_bottom_padding = get_sub_field('remove_bottom_padding') ?? null; 
$intro_heading_copy = get_sub_field('people_cards_intro_heading_copy') ?? null;
$cards = get_sub_field('people_cards_cards') ?? null;
?>
<section class="people_cards module<?php if($remove_top_padding == true) { echo ' no-top-padding';} if ($remove_bottom_padding == true) { echo ' no-bottom-padding';}?>">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell small-12 tablet-10 tablet-offset-1 xlarge-8">
				<div class="grid-x grid-padding-x">
					<div class="intro cell small-12 medium-10 tablet-offset-1">
						<?=wp_kses_post( $intro_heading_copy );?>
					</div>
				</div>
				<div class="cards-wrap grid-x grid-padding-x">
					<?php foreach($cards as $card):
						$photo = $card['photo'] ?? null;
						$name = $card['name'] ?? null;
						$title = $card['title'] ?? null;
						$company_name = $card['company_name'] ?? null;
					?>
						<div class="cell small-12 medium-4 medium-offset-1">
							<?php if( !empty( $photo ) ) {
								$imgID = $photo['ID'];
								$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
								$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
								echo '<div class="grid-x grid-padding-x">';
								echo '<div class="img-wrap cell small-12 medium-8 tablet-7">';
								echo $img;
								echo '</div>';
								echo '</div>';
							}?>
							<?php if( !empty($name) ):?>
								<h3 class="color-brown"><?=$name;?></h3>
							<?php endif;?>
							<?php if( !empty($name) ):?>
								<div><?=esc_html( $name );?></div>	
							<?php endif;?>
							<?php if( !empty($company_name) ):?>
								<div><i><?=esc_html( $company_name );?></i></div>	
							<?php endif;?>
						</div>
					<?php endforeach;?>
				</div>
			</div>
		</div>
	</div>
</section>