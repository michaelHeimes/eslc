<?php	
	$event_args = array(  
		'post_type' => 'event-cpt',
		'post_status' => 'publish',
		'posts_per_page' => 2,
	);
	
	$event_loop = new WP_Query( $event_args ); 
		
	$post_args = array(  
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => 2,
	);
	
	$post_loop = new WP_Query( $post_args ); 

?>

<section class="recent-posts module bg-green color-white">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<?php if ( $event_loop->have_posts() ) : ?>
				<div class="cell small-12 tablet-6">
					<h2 class="color-white">Upcoming Events</h2>
					<?php while ( $event_loop->have_posts() ) : $event_loop->the_post();
						get_template_part( 'template-parts/content', get_post_type() );
					endwhile;?>
				</div>
			<?php endif; wp_reset_postdata()?>
			<?php if ( $post_loop->have_posts() ) : ?>
				<div class="cell small-12 tablet-6">
					<h2 class="color-white">Recent News</h2>
					<?php while ( $post_loop->have_posts() ) : $post_loop->the_post();
						get_template_part( 'template-parts/content', get_post_type() );
					endwhile;?>
				</div>
			<?php endif; wp_reset_postdata()?>
		</div>
	</div>
</section>