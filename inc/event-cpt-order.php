<?php
function order_event_cpt_by_event_date( $query ) {
	if ( ! is_admin() && $query->is_main_query() && ( is_post_type_archive('event-cpt') || is_tax('event-cpt-category') || is_home() || is_archive() ) ) {
		// Ensure we are only modifying the query for the correct post type
		if ( $query->query_vars['post_type'] === 'event-cpt' ) {
			$query->set('meta_key', 'event_date'); // The custom field key
			$query->set('orderby', 'meta_value');
			$query->set('order', 'ASC'); // Or 'DESC' for descending order
			$query->set('meta_type', 'DATE'); // Ensure this is the correct type
		}
	}
}
add_action( 'pre_get_posts', 'order_event_cpt_by_event_date' );