<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package trailhead
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="grid-container">
			<div class="grid-x grid-padding-x align-center module">
				<div class="cell small-12 tablet-10 large-8">

					<?php if ( have_posts() ) : ?>
			
						<header class="page-header">
							<h1 class="page-title">
								<?php
								/* translators: %s: search query. */
								printf( esc_html__( 'Search Results for: %s', 'trailhead' ), '<span>' . get_search_query() . '</span>' );
								?>
							</h1>
						</header><!-- .page-header -->
			
						<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();
			
							/**
				 			* Run the loop for the search to output the results.
				 			* If you want to overload this in a child theme then include a file
				 			* called content-search.php and that will be used instead.
				 			*/
							get_template_part( 'template-parts/content', get_post_type() );
			
						endwhile;
			
						trailhead_page_navi();
			
					else :
			
						get_template_part( 'template-parts/content', 'none' );
			
					endif;
					?>
					
				</div>
			</div>
		</div>
	</main><!-- #main -->

<?php
get_footer();
