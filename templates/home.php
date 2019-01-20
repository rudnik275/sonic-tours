<?php 
print_r(date("Y-m-d H:i:s"));
$excursions = get_posts(array(
	'category' => get_category_by_slug('excursions')->cat_ID
));
$comments = get_comments(array(
	'status' => 'approve',
	'number'  => 2
));
$services = get_posts(array(
	'category' => get_category_by_slug('services')->cat_ID
));
?>

<div class="main container">
	<div class="main_left_col">
		<h2 class="section_title excursion_title">Excursion</h2>
		<div class="excursion_list">
			<?php foreach ($excursions as $post) : ?>
				<a href="<?= $post->guid ?>" class="excursion_list_item">
					<img class="excursion_list_item_photo" src="<?= get_field('preview_image')['sizes']['thumbnail'] ?>">
					<div class="excursion_list_item_text">
						<div class="excursion_list_item_text_title">
							<?= $post->post_title ?>
						</div>
						<div class="excursion_list_item_text_subtitle">
							<?= get_field('city') ?>
						</div>
					</div>
				</a>
			<?php endforeach;?>
		</div>

		<div class="section">
			<h2 class="section_title">Отзывы</h2>
			<div class="section_container">
				<?php foreach ($comments as $comment): ?>
					<!-- <pre><?= get_field('ratio', $comment) ?></pre> -->
					<!-- <pre><?php print_r($comment->comment_author) ?></pre> -->
					<pre><?php print_r($comment) ?></pre>
				<?php endforeach ?>
					<button class="btn add_comment_btn">add comment</button>
			</div>
		</div>

		<?php foreach ($services as $post) : ?>
			<div class="section">
				<h2 class="section_title"><?= $post->post_title ?></h2>
				<div class="section_container">
					<a href="<?= $post->guid ?>" class="section_slider_container" id="slider_<?= $post->ID ?>">
						<div class="section_slider">
							<?php foreach(get_field('photos') as $image) : ?>
								<div class="section_slider_item"><img src="<?= $image['url'] ?>"></div>
							<?php endforeach;?>
						</div>
					</a>
					<div class="section_content">
						<ul class="section_list">
							<?php foreach(get_field('features') as $feature) : ?>
								<li><?= $feature['text'] ?></li>
							<?php endforeach;?>
						</ul>
						<span class="section_text"><?= get_field('description') ?></span>
						<a href="<?= $post->guid ?>" class="section_btn btn">Details</a>
					</div>
				</div>
			</div>
		<?php endforeach;?>

	</div>
	
	<?php $contacts = get_page_by_title('contacts')?>
	<div class="main_right_col">
		<div class="about_me">
			<h2 class="section_title">About me</h2>
			<div class="about_me_container">
				<img class="about_me_photo" src="<?= get_field('avatar', $contacts->ID)['url'] ?>">
				<div class="about_me_text">
					<?= do_excerpt(get_field('about_me', $contacts->ID), 50) ?>
					<a href="<?= get_page_by_title('contacts')->guid ?>" class="btn about_me_btn">
						Show more
					</a>
				</div>
				<div class="about_me_socials">
					<a href="#" class="about_me_social instagram"></a>
					<a href="#" class="about_me_social viber"></a>
					<a href="#" class="about_me_social telegram"></a>
					<a href="#" class="about_me_social facebook"></a>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_template_part('templates/contact-form', 'home'); ?>