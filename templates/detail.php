<?php 
$photos = get_field('photos');
$category = get_the_category()['0']->name;
$isExcursions = $category === 'excursions';
?>

<div class="single_container container">
	<h2 class="section_title"><?php the_title() ?></h2>
	<div class="single">
		<div class="single_left">
			<div class="single_list">
				<?php if ($isExcursions) : ?>
					<div class="single_list_item">
						<div class="single_list_item_lebel">City</div>
						<div class="single_list_item_text"><?= get_field('city') ?></div>
					</div>
					<div class="single_list_item">
						<div class="single_list_item_lebel">Approximate duration</div>
						<div class="single_list_item_text"><?= get_field('duration') ?></div>
					</div>
					<div class="single_list_item">
						<div class="single_list_item_lebel">Price</div>
						<div class="single_list_item_text"><?= get_field('price') ?></div>
					</div>
				<?php else : ?>
					<div class="single_list_item">
						<div class="single_list_item_lebel">Features</div>
						<?php foreach(get_field('features') as $service) : ?>
							<div class="single_list_item_text single_list_item_text_feature">
								<?= $service['text'] ?>
							</div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<div class="single_right">
			<div class="section_slider_container" id="slider_<?php the_ID() ?>">
				<div class="section_slider">
					<?php foreach($photos as $photo) : ?>
						<div class="section_slider_item">
							<img src="<?= $photo['url']?>">
						</div>
					<?php endforeach; ?>
				</div>
			</div>

			<div class="single_text">
				<?= get_field('description') ?>
			</div>
		</div>
	</div>
</div>

<?php get_template_part('templates/contact-form', 'detail'); ?>