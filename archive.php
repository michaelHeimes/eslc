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
		<?php echo get_the_post_thumbnail( $posts_page_id, 'full' );?>
		<div class="grid-container">
			<div class="grid-x grid-padding-x align-center">
				<div class="cell small-12 tablet-10 large-8">
			
						<header class="page-header">
							<h1 class="color-dark-green"><?=$queried_object->name;?></h1>
							
							<?php if ( have_posts() ) : 
								
								if( is_post_type_archive('event-cpt') || is_tax('event-category') ) {
									$categories = get_terms( array(
										'taxonomy' => 'event-category',
										'exclude' => 1,
										'hide_empty' => 1,
									) );
								} else {
									$categories = get_categories( array(
										'exclude' => 1, // Assuming the ID of the Uncategorized category is 1
										'hide_empty' => 1,
									) );
								}
								

								
								// Check if categories exist
								if ( !empty( $categories ) ) {
									echo '<ul class="cat-links no-bullet grid-x grid-padding-x">';
									foreach ( $categories as $category ):?>
										<li class="cell shrink"><a<?php if( $queried_object->term_id == $category->term_id ):?> class="active"<?php endif;?> href="<?= esc_url( get_category_link( $category->term_id ) );?>"><?=esc_html( $category->name );?></a></li>
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
