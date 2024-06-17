<?php
$remove_top_padding = get_sub_field('remove_top_padding') ?? null; 
$remove_bottom_padding = get_sub_field('remove_bottom_padding') ?? null; 
$video = get_sub_field('video') ?? null;
$video_caption = get_sub_field('video_caption') ?? null;
?>
<section class="video module<?php if($remove_top_padding == true) { echo ' no-top-padding';} if ($remove_bottom_padding == true) { echo ' no-bottom-padding';}?>">
	<div class="grid-container">
		<div class="grid-x grid-padding-x align-center">
			<div class="cell small-12 medium-11 tablet-10 large-8">
				<?php
				
				// Load value.
				$iframe =$video;
				
				// Use preg_match to find iframe src.
				preg_match('/src="(.+?)"/', $iframe, $matches);
				$src = $matches[1];
				
				// Add extra parameters to src and replace HTML.
				$params = array(
					'controls'  => 0,
					'hd'        => 1,
					'autohide'  => 1,
					'rel'       => 0,
				);
				$new_src = add_query_arg($params, $src);
				$iframe = str_replace($src, $new_src, $iframe);
				
				// Add extra attributes to iframe HTML.
				$attributes = 'frameborder="0"';
				$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
				
				// Display customized HTML.
				echo '<div class="responsive-embed widescreen">';
				echo $iframe;
				echo '</div>';
				?>
				
				<?php if( !empty($video_caption) ):?>
					<div class="caption-wrap">
						<?=esc_html(  $video_caption );?>
					</div>
				<?php endif;?>
			</div>
		</div>
	</div>
</section>