<?php
$remove_top_padding = get_sub_field('remove_top_padding') ?? null; 
$remove_bottom_padding = get_sub_field('remove_bottom_padding') ?? null; 
$wysiwyg_background_color = get_sub_field('background_color') ?? null;
$wysiwyg_buttons_copy = get_sub_field('wysiwyg_buttons_copy') ?? null;
$wysiwyg_buttons_button_link = get_sub_field('wysiwyg_buttons_button_link') ?? null;
$wysiwyg_buttons_button_links = get_sub_field('wysiwyg_buttons_button_links') ?? null; 
?>
<?php if( !empty($wysiwyg_buttons_copy) || !empty($wysiwyg_buttons_copy) ):?>
<section class="wysiwyg_button module 
	bg-<?=esc_attr( $wysiwyg_background_color );?><?php if($remove_top_padding == true) { echo ' no-top-padding';} if ($remove_bottom_padding == true) { echo ' no-bottom-padding';}?>">
	<div class="grid-container">
		<div class="grid-x grid-padding-x align-center">
			<div class="cell small-12 medium-11 tablet-10 large-8">
				<?php if( !empty($wysiwyg_buttons_copy) ):?>
					<div class="copy-wrap entry-content">
						<?=wp_kses_post($wysiwyg_buttons_copy);?>
					</div>	
				<?php endif;?>
				<?php if( !empty($wysiwyg_buttons_button_links) ):?>
					<div class="grid-x grid-padding-x button-group">
						<?php foreach($wysiwyg_buttons_button_links as $button_link):
							$link = $button_link['button_link'] ?? null;
							if( $link ): 
							$link_url = $link['url'];
							$link_title = $link['title'];
							$link_target = $link['target'] ? $link['target'] : '_self';
						?>
							<div class="btn-wrap cell shrink">
								<a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
							</div>
						<?php endif; endforeach;?>
					</div>	
				<?php endif;?>
			</div>
		</div>
	</div>
</section>
<?php endif;?>