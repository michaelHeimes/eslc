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

					<?php if ( have_posts() ) : 
						
						$categories = get_categories( array(
							'exclude' => 1, // Assuming the ID of the Uncategorized category is 1
							'hide_empty' => 1,
						) );
						
						// Check if categories exist
						if ( !empty( $categories ) ) {
							echo '<ul class="menu horizontal">';
							foreach ( $categories as $category ) {
								echo '<li><a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a></li>';
							}
							echo '</ul>';
						}
							
					?>
			
						<header class="page-header">
							<h1><?=$queried_object->name;?></h1>
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
			
						the_posts_navigation();
			
					else :
			
						get_template_part( 'template-parts/content', 'none' );
			
					endif;
					?>

				</div>
			</div>
		</div>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
