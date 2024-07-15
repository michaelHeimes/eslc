<?php	

	$event_args = array(  
		'post_type' => 'event-cpt',
		'post_status' => 'publish',
		'posts_per_page' => 2,
		'meta_key' => 'event_date',
		'orderby' => 'meta_value',
		'order' => 'ASC'
	);
	
	$event_loop = new WP_Query( $event_args ); 
	
	if ( post_type_exists('event-cpt') ) {
		$event_archive_url = get_post_type_archive_link('event-cpt'); 
	}
		
	$post_args = array(  
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => 2,
	);
	
	$post_loop = new WP_Query( $post_args ); 
	
	if ( post_type_exists('post') ) {
		$post_archive_url = get_post_type_archive_link('post') ?? null; 
	}


?>

<section class="recent-posts module bg-green color-white">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<?php if ( $event_loop->have_posts() ) : ?>
				<div class="left cell small-12 tablet-6">
					<h2 class="color-white">Upcoming Events</h2>
					<?php while ( $event_loop->have_posts() ) : $event_loop->the_post();
						get_template_part( 'template-parts/content');
					endwhile;?>
					<?php if ( $event_archive_url ) :?>
						<div class="all-link-wrap arrow-link">
							<a class="grid-x align-middle color-white p" href="<?=esc_url($event_archive_url);?>">
								<span>See all events</span>
								<svg width="16" height="12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.252 6.845H.822a.783.783 0 0 1-.586-.242.828.828 0 0 1-.236-.6c0-.24.08-.44.236-.603a.783.783 0 0 1 .584-.24h12.431l-3.6-3.705a.804.804 0 0 1-.242-.587.877.877 0 0 1 .24-.598.826.826 0 0 1 .586-.27.764.764 0 0 1 .585.252l4.9 5.038c.096.094.17.208.217.333.042.117.063.243.063.38 0 .134-.02.261-.063.377a.935.935 0 0 1-.217.333l-4.9 5.038a.77.77 0 0 1-.58.248.812.812 0 0 1-.59-.265.894.894 0 0 1-.247-.593.797.797 0 0 1 .247-.592l3.602-3.704Z" fill="#ffffff"></path></svg>
							</a>
						</div>
					<?php endif;?>
				</div>
			<?php endif; wp_reset_postdata()?>
			<?php if ( $post_loop->have_posts() ) : ?>
				<div class="right cell small-12 tablet-6">
					<h2 class="color-white">Recent News</h2>
					<?php while ( $post_loop->have_posts() ) : $post_loop->the_post();
						get_template_part( 'template-parts/content');
					endwhile;?>
					<?php if ( $post_archive_url ) :?>
						<div class="all-link-wrap arrow-link">
							<a class="grid-x align-middle color-white p" href="<?=esc_url($post_archive_url);?>">
								<span>Read all news</span>
								<svg width="16" height="12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.252 6.845H.822a.783.783 0 0 1-.586-.242.828.828 0 0 1-.236-.6c0-.24.08-.44.236-.603a.783.783 0 0 1 .584-.24h12.431l-3.6-3.705a.804.804 0 0 1-.242-.587.877.877 0 0 1 .24-.598.826.826 0 0 1 .586-.27.764.764 0 0 1 .585.252l4.9 5.038c.096.094.17.208.217.333.042.117.063.243.063.38 0 .134-.02.261-.063.377a.935.935 0 0 1-.217.333l-4.9 5.038a.77.77 0 0 1-.58.248.812.812 0 0 1-.59-.265.894.894 0 0 1-.247-.593.797.797 0 0 1 .247-.592l3.602-3.704Z" fill="#ffffff"></path></svg>
							</a>
						</div>
					<?php endif;?>
				</div>
			<?php endif; wp_reset_postdata()?>
		</div>
	</div>
</section>