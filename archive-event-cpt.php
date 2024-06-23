<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trailhead
 */

get_header();
$posts_page_id = get_option('page_for_posts');
$queried_object = get_queried_object();
?>

	<main id="primary" class="site-main">
		<?php if( has_post_thumbnail( $posts_page_id) ):?>
			<div class="banner-img text-center">
				<?php echo get_the_post_thumbnail( $posts_page_id, 'full' );?>
			</div>
		<?php endif;?>
		<div class="grid-container">
			<div class="grid-x grid-padding-x align-center module">
				<div class="cell small-12 tablet-10 large-8">
			
						<header class="page-header">
							<h1 class="color-dark-green"><?=$queried_object->label;?></h1>
							
							<?php if ( have_posts() ) : 
								
								$terms = get_terms( array(
									'taxonomy' => 'event-category',
									'exclude' => 1,
									'hide_empty' => 1,
								) );
								
								if ( !empty( $terms ) ) {
									echo '<ul class="cat-links no-bullet grid-x grid-padding-x">';
									foreach ( $terms as $term ): ?>
										<li class="cell shrink">
											<a <?php if( is_tax('event-category') && $queried_object->term_id == $term->term_id ): ?> class="active"<?php endif; ?> href="<?= esc_url( get_term_link( $term->term_id ) ); ?>">
												<?= esc_html( $term->name ); ?>
											</a>
										</li>
									<?php endforeach;
									echo '</ul>';
								}
									
							?>
							
						</header><!-- .page-header -->
			
						<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();
			
							/*
				 			* Include the Post-Type-specific template for the content.
				 			* If you want to override this in a child theme, then include a file
				 			* called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 			*/
							get_template_part( 'template-parts/content', get_post_type() );
			
						endwhile;
			
					else :
			
						get_template_part( 'template-parts/content', 'none' );
			
					endif;
					?>
					
					<?php trailhead_page_navi();?>

				</div>
			</div>
		</div>
	</main><!-- #main -->

<?php
get_footer();
