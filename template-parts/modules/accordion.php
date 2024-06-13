<?php
$accordion_heading = get_sub_field('accordion_heading') ?? null;
$accordion_accordions = get_sub_field('accordion_accordions') ?? null;
?>
<section class="accordion module">
	<div class="grid-container">
		<div class="grid-x grid-padding-x align-center">
			
			<?php if( !empty($accordion_heading) ):?>
				<div class="cell small-12 medium-11 tablet-8 large-8">
					<h2 class="color-green"><?=esc_html( $accordion_heading );?></h2>
				</div>
			<?php endif;?>
			<?php if($accordion_accordions):?>
				<div class="cell small-12 medium-11 tablet-8 large-8">
					<ul class="accordion" data-accordion data-allow-all-closed="true">
						<?php foreach($accordion_accordions as $accordion_accordion):
							$title = $accordion_accordion['title'] ?? null;
							$content = $accordion_accordion['content'] ?? null;
						?>
							<li class="accordion-item" data-accordion-item>
								
								<a href="#" class="accordion-title h4">
									<?=esc_html( $title );?>
								</a>
							
								<div class="accordion-content" data-tab-content>
									<?=wp_kses_post( $content );?>
								</div>
						  	</li>
						<?php endforeach;?>
					</ul>
				</div>
			<?php endif;?>
		</div>
	</div>
</section>	