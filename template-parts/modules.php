<?php
if( have_rows('content_modules') ):
	while ( have_rows('content_modules') ) : the_row();

		if( get_row_layout() == 'hero' ):
			get_template_part('template-parts/modules/module', 'hero');
		elseif( get_row_layout() == 'image_copy_cta' ):
			get_template_part('template-parts/modules/module', 'image_copy_cta');
		elseif( get_row_layout() == 'wysiwyg_button' ):
		get_template_part('template-parts/modules/module', 'wysiwyg_button');
		elseif( get_row_layout() == 'cta_cards_stats' ):
		get_template_part('template-parts/modules/module', 'cta_cards_stats');
		elseif( get_row_layout() == 'newsletter_signup' ):
		get_template_part('template-parts/modules/module', 'newsletter_signup');
		elseif( get_row_layout() == 'upcoming_recent_events_news' ):
		get_template_part('template-parts/modules/module', 'upcoming_recent_events_news');
		endif;

	endwhile;
endif;
?>