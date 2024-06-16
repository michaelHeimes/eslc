<?php

if( have_rows('content_modules') ):
	while ( have_rows('content_modules') ) : the_row();

		if( get_row_layout() == 'hero' ):
			get_template_part('template-parts/modules/hero');
		elseif( get_row_layout() == 'image_copy_cta' ):
			get_template_part('template-parts/modules/image_copy_cta');
		elseif( get_row_layout() == 'wysiwyg_button' ):
		get_template_part('template-parts/modules/wysiwyg_button');
		elseif( get_row_layout() == 'cta_cards_stats' ):
		get_template_part('template-parts/modules/cta_cards_stats');
		elseif( get_row_layout() == 'newsletter_signup' ):
		get_template_part('template-parts/modules/newsletter_signup');
		elseif( get_row_layout() == 'upcoming_recent_events_news' ):
		get_template_part('template-parts/modules/upcoming_recent_events_news');
		elseif( get_row_layout() == 'accordion' ):
		get_template_part('template-parts/modules/accordion');
		elseif( get_row_layout() == 'full_width_image' ):
		get_template_part('template-parts/modules/full_width_image');
		elseif( get_row_layout() == 'video' ):
		get_template_part('template-parts/modules/video');
		elseif( get_row_layout() == 'image_slider' ):
		get_template_part('template-parts/modules/image_slider');
		elseif( get_row_layout() == 'people_cards' ):
		get_template_part('template-parts/modules/people_cards');
		endif;

	endwhile;
endif;
?>