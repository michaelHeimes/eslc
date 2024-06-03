<?php
/**
 * Template name: Home Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trailhead
 */

get_header();
$fields = get_fields();

// Hero
$hero_heading = $fields['hero_heading'] ?? null;
$hero_large_text = $fields['hero_large_text'] ?? null;

// Announcement 
$show_announcement = $fields['show_announcement'] ?? null;
if($show_announcement) {
	$announcement_image = $fields['announcement_image'] ?? null;
	$announcement_heading = $fields['announcement_heading'] ?? null;
	$announcement_text = $fields['announcement_text'] ?? null;
	$announcement_button_link = $fields['announcement_button_link'] ?? null;
}

// Mission & Vision
$mission_vision_heading = $fields['mission_vision_heading'] ?? null;
$mission_vision_copy = $fields['mission_vision_copy'] ?? null;
$mission_vision_button_link = $fields['mission_vision_button_link'] ?? null;

// What We Do 
$what_we_do_heading = $fields['what_we_do_heading'] ?? null;
$what_we_do_cards = $fields['what_we_do_cards'] ?? null;

// Our Impact
$our_impact_heading = $fields['our_impact_heading'] ?? null;
$our_impact_stats = $fields['our_impact_stats'] ?? null;

// Newsletter
$newsletter_background_image = $fields['newsletter_background_image'] ?? null;
$newsletter_heading = $fields['newsletter_heading'] ?? null;
$gravity_form = $fields['gravity_form'] ?? null;

// Get Involved
$get_involved_image = $fields['get_involved_image'] ?? null;
$get_involved_heading = $fields['get_involved_heading'] ?? null;
$get_involved_text = $fields['get_involved_text'] ?? null;
$get_involved_button_link = $fields['get_involved_button_link'] ?? null;

?>
	<div class="content">
		<div class="inner-content">

			<main id="primary" class="site-main">
		
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
					<?php if( !empty($hero_heading) || !empty($hero_large_text) ):?>
						<header class="entry-header home-banner">
							<div class="grid-container">
								<div class="grid-x grid-padding-x align-middle">
									<?php if( !empty($hero_heading) || !empty($hero_large_text) ):?>
										<div class="cell small-12 medium-r tablet-5">
											<?php if( !empty($hero_heading) ):?>
												<h1>
													<?=esc_html( $hero_heading );?>
													<?php if( !empty($hero_large_text) ):?>
														<br><span><?=esc_html( $hero_large_text );?></span>
													<?php endif;?>
												</h1>
											<?php endif;?>
										</div>
									<?php endif;?>
								</div>
							</div>
						</header><!-- .entry-header -->
					<?php endif;?>
				
					<section class="entry-content" itemprop="text">
						<?php the_content(); ?>
					</section> <!-- end article section -->
							
					<footer class="article-footer">
						 <?php wp_link_pages(); ?>
					</footer> <!-- end article footer -->
						
				</article><!-- #post-<?php the_ID(); ?> -->
		
			</main><!-- #main -->
				
		</div>
	</div>

<?php
get_footer();