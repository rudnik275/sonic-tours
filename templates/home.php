<?php 
$excursions = get_posts(array(
	'category' => get_category_by_slug('excursions')->cat_ID
));

$available_comments_count = 3;
$comments = get_comments(array(
	'status' 	=> 'approve',
	'number' 	=> $available_comments_count,
	'order'  	=> 'DESC',
	'orderBy' => 'comment_date',
));

$comments_count = get_comments(array(
	'status' => 'approve',
	'count'  => true
));

$services = get_posts(array(
	'category' => get_category_by_slug('services')->cat_ID
));

$reviews = get_page_by_title('reviews');
?>

<div class="main container">
	<div class="main_left_col">
		<h2 class="section_title excursion_title">Excursions</h2>
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

		<div class="reviews">
			<div class="reviews_header">
				<h2 class="section_title">
					<?= $reviews->post_title ?> 
					<span class="reviews_header_count">
						(<?= $available_comments_count ?> of <?= $comments_count ?>)
					</span>
				</h2>
				<a class="reviews_header_link" href="<?= $reviews->guid ?>">Show all</a>
				<button class="btn add_comment_btn">add new comment</button>
			</div>
			
			<?php foreach ($comments as $comment): ?>
				<div class="reviews_item">
					<div class="reviews_item_header">
						<div class="reviews_item_author"><?= $comment->comment_author ?></div>
						<div class="reviews_item_ratio">
							<?php foreach (range(1,5) as $value): ?>
								<?php if ($value < get_field('ratio', $comment)): ?>
									<div class="star filled"></div>
								<?php else : ?>
									<div class="star"></div>
								<?php endif ?>
							<?php endforeach ?>
						</div>
						<div class="reviews_item_date"><?= $comment->comment_date ?></div>
					</div>
					<div class="reviews_item_text">
						<?= $comment->comment_content ?>
					</div>
					<?php 
						$photos = get_field('photos', $comment);
						if (!empty($photos)): 
					?>
						<div class="reviews_photos">
							<?php foreach ($photos as $photo) : ?>
								<img src="<?= $photo['url'] ?>" data-big="<?= $photo['url'] ?>">
							<?php endforeach; ?>
						</div>
					<?php endif ?>
				</div>
			<?php endforeach ?>
		</div>

		<?php foreach ($services as $post) : ?>
			<div class="section">
				<h2 class="section_title"><?= $post->post_title ?></h2>
				<div class="section_container">
					<div class="section_slider_container" id="slider_<?= $post->ID ?>">
						<div class="section_slider">
							<?php foreach(get_field('photos') as $image) : ?>
								<div class="section_slider_item"><img src="<?= $image['url'] ?>"></div>
							<?php endforeach;?>
						</div>
					</div>
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
					<a target="_blank" href="<?= get_field('instagram', $contacts->ID) ?>" class="about_me_social instagram"></a>
					<a target="_blank" href="<?= get_field('viber', $contacts->ID) ?>" class="about_me_social viber"></a>
					<a target="_blank" href="<?= get_field('telegram', $contacts->ID) ?>" class="about_me_social telegram"></a>
					<a target="_blank" href="<?= get_field('facebook', $contacts->ID) ?>" class="about_me_social facebook"></a>
				</div>
			</div>
		</div>
	</div>
</div>

<?= do_shortcode('[contact-form-7 id="130" title="Contact form 12"]') ?>