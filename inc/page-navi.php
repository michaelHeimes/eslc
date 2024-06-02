<?php // Borrowed with love from FoundationPress
	function trailhead_page_navi() {
		global $wp_query;
		$big = 999999999; // This needs to be an unlikely integer
		// For more options and info view the docs for paginate_links()
		// http://codex.wordpress.org/Function_Reference/paginate_links
		$paginate_links = paginate_links( array(
			'base' => str_replace( $big, '%#%', html_entity_decode( get_pagenum_link( $big ) ) ),
			'current' => max( 1, get_query_var( 'paged' ) ),
			'total' => $wp_query->max_num_pages,
			'mid_size' => 5,
			'prev_next' => true,
		    'prev_text' => __( '<svg width="9" height="17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9 8.644c0 .18-.029.348-.086.504-.066.168-.167.32-.296.444L1.9 16.322a1.086 1.086 0 0 1-.78.318 1.056 1.056 0 0 1-.796-.318A1.076 1.076 0 0 1 0 15.534c0-.31.108-.572.325-.79l6.088-6.1-6.088-6.1a1.086 1.086 0 0 1-.318-.781c-.01-.3.106-.592.318-.797.21-.214.493-.332.787-.326.309 0 .572.109.788.326l6.718 6.73c.14.14.238.288.296.444.058.156.086.324.086.504Z" fill="#476882"/></svg>', 'trailhead' ),
		    'next_text' => __( '<svg width="9" height="17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9 8.644c0 .18-.029.348-.086.504-.066.168-.167.32-.296.444L1.9 16.322a1.086 1.086 0 0 1-.78.318 1.056 1.056 0 0 1-.796-.318A1.076 1.076 0 0 1 0 15.534c0-.31.108-.572.325-.79l6.088-6.1-6.088-6.1a1.086 1.086 0 0 1-.318-.781c-.01-.3.106-.592.318-.797.21-.214.493-.332.787-.326.309 0 .572.109.788.326l6.718 6.73c.14.14.238.288.296.444.058.156.086.324.086.504Z" fill="#476882"/></svg>', 'trailhead' ),
			'type' => 'list',
		) );
		$paginate_links = str_replace( "<ul class='page-numbers'>", "<ul class='pagination no-bullet grid-x align-middle align-center'>", $paginate_links );
		$paginate_links = str_replace( '<li><span class="page-numbers dots">', "<li><a href='#'>", $paginate_links );
		$paginate_links = str_replace( "<li><span class='page-numbers current'>", "<li class='current'>", $paginate_links );
		$paginate_links = str_replace( '</span>', '</a>', $paginate_links );
		$paginate_links = str_replace( "<li><a href='#'>&hellip;</a></li>", "<li><span class='dots'>&hellip;</span></li>", $paginate_links );
		$paginate_links = preg_replace( '/\s*page-numbers/', '', $paginate_links );
		// Display the pagination if more than one page is found.
		if ( $paginate_links ) {
			echo '<div class="page-navigation">';
			echo $paginate_links;
			echo '</div><!--// end .pagination -->';
		}
	}