<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trailhead
 */

get_header();
$posts_page_id = get_option('page_for_posts');
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

					<?php
					if ( have_posts() ) :?>
						<header>
							<h1 class="page-title color-dark-green"><?php single_post_title(); ?></h1>
							<?php
							// Fetch all categories except for Uncategorized and hide empty ones
							$categories = get_categories( array(
								'exclude' => 1, // Assuming the ID of the Uncategorized category is 1
								'hide_empty' => 1,
							) );
							
							// Check if categories exist
							if ( !empty( $categories ) ) {
								echo '<ul class="cat-links no-bullet grid-x grid-padding-x">';
								foreach ( $categories as $category ) {
									echo '<li class="cell shrink"><a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a></li>';
								}
								echo '</ul>';
							}?>
	

						</header>
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
