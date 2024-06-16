<?php

// Register the [social-media-links] shortcode
function register_social_media_links_shortcode() {
	// The function that outputs the social media links
	function social_media_links_shortcode() {
		// Ensure the function exists before calling it
		if (function_exists('trailhead_social_links')) {
			// Start output buffering
			ob_start();
			// Call the function
			trailhead_social_links();
			// Get the content from the buffer
			return ob_get_clean();
		} else {
			// Return a message if the function doesn't exist
			return 'Social media links function is not available.';
		}
	}

	// Register the shortcode
	add_shortcode('social-media-links', 'social_media_links_shortcode');
}
// Hook the function to 'init'
add_action('init', 'register_social_media_links_shortcode');
