<?php
$remove_top_padding = get_sub_field('remove_top_padding') ?? null; 
$remove_bottom_padding = get_sub_field('remove_bottom_padding') ?? null; 
$heading = get_sub_field('heading') ?? null;
$image = get_sub_field('image') ?? null;
$text = get_sub_field('text') ?? null;
$link = get_sub_field('link') ?? null;
?>
<section class="heading-image-left-copy-right-cta module<?php if($remove_top_padding == true) { echo ' no-top-padding';} if ($remove_bottom_padding == true) { echo ' no-bottom-padding';}?>">
	<div class="grid-container">
		<div class="grid-x grid-padding-x align-center">
			<div class="cell small-12 medium-11 tablet-10 large-8">
				<?php if( !empty($heading) ):?>
					<div class="grid-x grid-padding-x">
						<div class="cell small-12">
							<h2 class="color-green"><?=esc_html( $heading );?></h2>
						</div>
					</div>
				<?php endif;?>
				<?php if( !empty($image) || !empty($text) || !empty($link) ):?>
					<div class="grid-x grid-padding-x">
						<?php if( !empty($image) ) : ?>
							<div class="img-wrap cell small-12 medium-6">
								<?php
									$size = 'full'; 
									echo wp_get_attachment_image( $image['id'], $size );
								?>
							</div>
						<?php endif;?>
						<?php if( !empty($text) || !empty($link) ) : ?>
							<div class="text-link-wrap cell small-12 medium-6">
								<?php if( !empty($text) ) :?>
									<div class="text-wrap p">
										<?=esc_html( $text );?>
									</div>
								<?php endif;?>
								<?php if( $link ): 
									$link_url = $link['url'];
									$link_title = $link['title'];
									$link_target = $link['target'] ? $link['target'] : '_self';
									?>
								<div class="link-wrap">
									<a class="arrow-link color-red grid-x align-middle p" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
										<span><?php echo esc_html( $link_title ); ?></span>
										<svg width="16" height="12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.252 6.845H.822a.783.783 0 0 1-.586-.242.828.828 0 0 1-.236-.6c0-.24.08-.44.236-.603a.783.783 0 0 1 .584-.24h12.431l-3.6-3.705a.804.804 0 0 1-.242-.587.877.877 0 0 1 .24-.598.826.826 0 0 1 .586-.27.764.764 0 0 1 .585.252l4.9 5.038c.096.094.17.208.217.333.042.117.063.243.063.38 0 .134-.02.261-.063.377a.935.935 0 0 1-.217.333l-4.9 5.038a.77.77 0 0 1-.58.248.812.812 0 0 1-.59-.265.894.894 0 0 1-.247-.593.797.797 0 0 1 .247-.592l3.602-3.704Z" fill="#9E4541"/></svg>
									</a>
								</div>
								<?php endif; ?>
							</div>
						<?php endif;?>
					</div>
				<?php endif;?>
			</div>
		</div>
	</div>
</section>