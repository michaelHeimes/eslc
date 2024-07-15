<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trailhead
 */
$post_type = get_post_type();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if( is_singular('board-member-cpt') || is_singular('staff-member-cpt') ):
		$title = get_field('title') ?? null;
		$company_name = get_field('company_name') ?? null;
	?>
		<div class="person-header module grid-container">
			<div class="grid-x align-center">
				<div class="cell small-12 medium-11 tablet-10 large-8">
					<div class="grid-x grid-padding-x">
						<?php if( get_the_post_thumbnail() ):?>
							<div class="cell small-12 medium-3">
								<div class="img-wrap">
									<?php the_post_thumbnail('large'); ?>
								</div>
							</div>
						<?php endif;?>
						<div class="cell small-12 tablet-9">
							<h1><?php the_title();?></h1>
							<?php if( !empty($title) ):?>
								<h3><?=esc_html($title);?></h3>
							<?php endif;?>
							<?php if( !empty($company_name) ):?>
								<h4><?=esc_html($company_name);?></h4>
							<?php endif;?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif;?>
	<?php if( is_singular('event-cpt') ):
		$event_date_string = get_field('event_date') ?? null;
		$event_date = DateTime::createFromFormat( 'Ymd', $event_date_string );

	?>
		<div class="person-header module grid-container">
			<div class="grid-x align-center">
				<div class="cell small-12 medium-11 tablet-10 large-8">
					<h1><?php the_title();?></h1>
					<?php if( $event_date_string ):?>
						<h3><?=$event_date->format( 'F j, Y' );?></h3>
					<?php endif;?>
				</div>
			</div>
		</div>
	<?php endif;?>
	<?php get_template_part( 'template-parts/modules' );?>
</article>