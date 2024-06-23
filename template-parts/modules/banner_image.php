<?php
$banner_image = get_sub_field('banner_image') ?? null;
?>
<div class="banner-img text-center">
	<?php
	$size = 'full'; // (thumbnail, medium, large, full or custom size)
	if( $banner_image ) {
		echo wp_get_attachment_image( $banner_image['id'], $size );
	}
	?>
</div>