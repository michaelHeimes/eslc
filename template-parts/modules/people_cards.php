<?php
$remove_top_padding = get_sub_field('remove_top_padding') ?? null; 
$remove_bottom_padding = get_sub_field('remove_bottom_padding') ?? null; 
$intro_heading_copy = get_sub_field('people_cards_intro_heading_copy') ?? null;
$people_type = get_sub_field('people_type') ?? null;
$cards = '';
if( $people_type == 'board-members' ) {
	$cards = get_sub_field('board_members') ?? null;
}
if( $people_type == 'staff-members' ) {
	$cards = get_sub_field('staff_members') ?? null;
}
?>
<section class="people_cards module<?php if($remove_top_padding == true) { echo ' no-top-padding';} if ($remove_bottom_padding == true) { echo ' no-bottom-padding';}?>">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell small-12 tablet-10 tablet-offset-1 xlarge-8">
				<div class="grid-x grid-padding-x">
					<div class="intro cell small-12 medium-offset-1">
						<?=wp_kses_post( $intro_heading_copy );?>
					</div>
				</div>
				<?php if( !empty($cards) ):?>
					<div class="cards-wrap grid-x grid-padding-x">
						<?php foreach($cards as $post):
							setup_postdata($post);
							
							$photo = get_the_post_thumbnail() ?? null;
							$name = get_the_title() ?? null;
							$title = get_field('title') ?? null;
							$company_name = get_field('company_name') ?? null;
						?>
							<div class="cell small-12 medium-4 medium-offset-1">
								<a class="person-link" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
									<?php if( !empty( $photo ) ) :?>
										<div class="grid-x grid-padding-x">
											<div class="img-wrap cell small-12 medium-9 tablet-7">
												<?php the_post_thumbnail('large'); ?>
											</div>
										</div>
									<?php endif;?>
									<?php if( !empty($name) ):?>
										<h3 class="color-brown"><?=$name;?></h3>
									<?php endif;?>
									<?php if( !empty($title) ):?>
										<h4><?=esc_html( $title );?></h4>	
									<?php endif;?>
									<?php if( !empty($company_name) ):?>
										<div><i><?=esc_html( $company_name );?></i></div>	
									<?php endif;?>
								</a>
							</div>
						<?php endforeach; wp_reset_postdata();?>
					</div>
				<?php endif;?>
			</div>
		</div>
	</div>
</section>