<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trailhead
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="grid-x grid-padding-x">
		<div class="cell small-12">
			<div class="inner">
				<a href="<?= esc_url( get_permalink() );?>" rel="bookmark">
					<div class="grid-x grid-padding-x">
						<div class="cell small-12 medium-6">
							<?php the_post_thumbnail('full'); ?>
						</div>
						<div class="entry-header cell small-12 medium-6">
							<div class="date weight-medium small-14">
								<?php echo get_the_date('F j, Y'); ?>
							</div>
							<h2 class="entry-title h3">
								<span><?php the_title();?></span>
							</h2>
							<svg width="9" height="17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9 8.644c0 .18-.029.348-.086.504-.066.168-.167.32-.296.444L1.9 16.322a1.086 1.086 0 0 1-.78.318 1.056 1.056 0 0 1-.796-.318A1.076 1.076 0 0 1 0 15.534c0-.31.108-.572.325-.79l6.088-6.1-6.088-6.1a1.086 1.086 0 0 1-.318-.781c-.01-.3.106-.592.318-.797.21-.214.493-.332.787-.326.309 0 .572.109.788.326l6.718 6.73c.14.14.238.288.296.444.058.156.086.324.086.504Z" fill="#476882"/></svg>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
</article>
