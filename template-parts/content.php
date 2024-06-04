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
				<a <?php if( !is_home() || !is_archive() ):?> class="color-white"<?php endif;?> href="<?= esc_url( get_permalink() );?>" rel="bookmark">
					<div class="grid-x grid-padding-x">
						<div class="cell small-12 medium-6">
							<?php the_post_thumbnail('full'); ?>
						</div>
						<div class="entry-header cell small-12 medium-6">
							<div class="date weight-medium small-14<?php if( !is_home() || !is_archive() ):?> color-white<?php endif;?>">
								<?php echo get_the_date('F j, Y'); ?>
							</div>
							<h2 class="entry-title h3<?php if( !is_home() || !is_archive() ):?> color-white<?php endif;?>">
								<span><?php the_title();?></span>
							</h2>
							<?php if( is_home() || is_archive() ):?>
								<svg width="9" height="17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9 8.644c0 .18-.029.348-.086.504-.066.168-.167.32-.296.444L1.9 16.322a1.086 1.086 0 0 1-.78.318 1.056 1.056 0 0 1-.796-.318A1.076 1.076 0 0 1 0 15.534c0-.31.108-.572.325-.79l6.088-6.1-6.088-6.1a1.086 1.086 0 0 1-.318-.781c-.01-.3.106-.592.318-.797.21-.214.493-.332.787-.326.309 0 .572.109.788.326l6.718 6.73c.14.14.238.288.296.444.058.156.086.324.086.504Z" fill="#476882"/></svg>
							<?php else:?>
								<svg width="24" height="19" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19.878 10.668H1.232c-.33.008-.65-.124-.878-.363A1.242 1.242 0 0 1 0 9.403c0-.36.119-.66.354-.903.229-.238.547-.37.876-.361h18.647l-5.402-5.556a1.206 1.206 0 0 1-.361-.88c.002-.335.13-.655.36-.898.226-.248.543-.394.879-.405.334-.007.654.13.877.378l7.35 7.557c.144.142.255.312.326.5.063.175.094.364.094.568 0 .203-.031.393-.094.567a1.4 1.4 0 0 1-.326.5l-7.35 7.557c-.223.242-.54.378-.87.372a1.218 1.218 0 0 1-.885-.398 1.342 1.342 0 0 1-.37-.89 1.196 1.196 0 0 1 .37-.887l5.403-5.556Z" fill="#fff"/></svg>
							<?php endif;?>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
</article>