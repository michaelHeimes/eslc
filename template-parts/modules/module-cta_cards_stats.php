<?php
$cta_cards_stats_cards_heading = get_sub_field('cta_cards_stats_cards_heading') ?? null;
$cta_cards_stats_cards = get_sub_field('cta_cards_stats_cards') ?? null;
$cta_cards_stats_stats_heading = get_sub_field('cta_cards_stats_stats_heading') ?? null;
$cta_cards_stats_stats = get_sub_field('cta_cards_stats_stats') ?? null;
?>

<?php if( !empty($cta_cards_stats_cards_heading) || !empty($cta_cards_stats_cards) || !empty($cta_cards_stats_stats_heading) || !empty($cta_cards_stats_stats) ):?>
	<section class="cta_cards_stats module">
		<?php if( !empty($cta_cards_stats_cards_heading) || !empty($cta_cards_stats_cards) ):?>
			<div class="top bg-tan">
				<div class="grid-container">
					<div class="grid-x grid-padding-x">
						<?php if( !empty($cta_cards_stats_cards_heading) ):?>
							<div class="cell small-12 text-center">
								<h2 class="color-dark-brown"><?=esc_html( $cta_cards_stats_cards_heading );?></h2>
							</div>
						<?php endif;?>
						<?php if( !empty($cta_cards_stats_cards) ):
							foreach($cta_cards_stats_cards as $cta_cards_stats_card):
								$image = $cta_cards_stats_card['image'] ?? null;
								$heading = $cta_cards_stats_card['heading'] ?? null;
								$text = $cta_cards_stats_card['text'] ?? null;
								$arrow_link = $cta_cards_stats_card['arrow_link'] ?? null;
								if($arrow_link) {
									$link = $arrow_link;
									$link_url = $link['url'];
									$link_title = $link['title'];
									$link_target = $link['target'] ? $link['target'] : '_self';
								}
						?>
							<div class="cta-card cell small-12 tablet-6">
								<?php if( empty($arrow_link ) ):?>
									<div class="inner bg-white">
								<?php else:?>
									<a class="inner bg-white color-red" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
								<?php endif;?>
									<div class="card-top">
										<?php if( !empty( $image ) ) {
											$imgID = $image['ID'];
											$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
											$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
											echo '<div class="img-wrap">';
											echo $img;
											echo '</div>';
										}?>
										<?php if( !empty($text) ):?>
											<div class="text-wrap">
												<?=esc_html( $text );?>
											</div>
										<?php endif;?>
									</div>
								<?php if( !empty($arrow_link ) ):?>
										<div class="title-wrap arrow-link">
											<span><?php echo esc_html( $link_title ); ?></span>
											<svg width="16" height="12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.252 6.845H.822a.783.783 0 0 1-.586-.242.828.828 0 0 1-.236-.6c0-.24.08-.44.236-.603a.783.783 0 0 1 .584-.24h12.431l-3.6-3.705a.804.804 0 0 1-.242-.587.877.877 0 0 1 .24-.598.826.826 0 0 1 .586-.27.764.764 0 0 1 .585.252l4.9 5.038c.096.094.17.208.217.333.042.117.063.243.063.38 0 .134-.02.261-.063.377a.935.935 0 0 1-.217.333l-4.9 5.038a.77.77 0 0 1-.58.248.812.812 0 0 1-.59-.265.894.894 0 0 1-.247-.593.797.797 0 0 1 .247-.592l3.602-3.704Z" fill="#9E4541"/></svg>
										</div>
									</a>
								<?php else:?>
									</div>
								<?php endif;?>
							</div>
						<?php endforeach; endif;?>
					</div>
				</div>
			</div>
		<?php endif;?>
		<?php if( !empty($cta_cards_stats_stats_heading) || !empty($cta_cards_stats_stats) ):?>
			<div class="bottom">
				<div class="grid-container">
					<div class="grid-x grid-padding-x">
						<?php if( !empty($cta_cards_stats_stats_heading) ):?>
							<div class="cell small-12 text-center">
								<h2><?=esc_html( $cta_cards_stats_stats_heading );?></h2>
							</div>
						<?php endif;?>
						<?php if( !empty($cta_cards_stats_stats) ):
							foreach($cta_cards_stats_stats as $cta_cards_stats_stat):	
								$figure = $cta_cards_stats_stat['figure'] ?? null;
								$label = $cta_cards_stats_stat['label'] ?? null;
						?>
							<div class="cta-card cell small-12 tablet-6 large-4 text-center align-center">
								<?php if( !empty($figure) ):?>
									<div class="font-header color-red"><?=esc_html( $figure );?></div>
								<?php endif;?>
								<?php if( !empty($label) ):?>
									<div class="weight-semibold uppercase"><?=esc_html( $label );?></div>
								<?php endif;?>
							</div>
						<?php endforeach; endif;?>
					</div>
				</div>
			</div>
		<?php endif;?>
	</section>
<?php endif;?>