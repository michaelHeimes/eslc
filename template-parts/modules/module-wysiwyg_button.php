<?php
$wysiwyg_buttons_copy = get_sub_field('wysiwyg_buttons_copy') ?? null;
$wysiwyg_buttons_button_link = get_sub_field('wysiwyg_buttons_button_link') ?? null;
?>
<?php if( !empty($wysiwyg_buttons_copy) || !empty($wysiwyg_buttons_copy) ):?>
<section class="wysiwyg_button module">
	<div class="grid-container">
		<div class="grid-x grid-padding-x align-center">
			<div class="cell small-12 medium-11 tablet-8 large-8">
				<?php if( !empty($wysiwyg_buttons_copy) ):?>
					<div class="copy-wrap">
						<?=wp_kses_post($wysiwyg_buttons_copy);?>
					</div>	
				<?php endif;?>
				<?php 
				$link = $wysiwyg_buttons_button_link;
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
		</div>
	</div>
</section>
<?php endif;?>