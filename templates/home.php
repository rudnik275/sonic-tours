<?php 
wp_mail( 'monawelo@braun4email.com', 'subject', 'test' );
 ?>
<div class="main container">
	<div class="main_left_col">
		<h2 class="section_title excursion_title">Excursion</h2>
		<div class="excursion_list">
			<?php
			$excursions = get_posts(array(
				'category' => get_category_by_slug('excursions')->cat_ID
			));
			foreach ($excursions as $post) : ?>
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
				<!-- <?php foreach (get_comments() as $comment): ?>
					<pre><?= get_field('ratio', $comment) ?></pre>
					<pre><?php print_r($comment->comment_author) ?></pre>
					<br>
					<br>

				<?php endforeach ?> -->
				<form action="<?= get_template_directory_uri() . '/add-comment.php' ?>" onsubmit="sendComment(event)">
					<input type="file" multiple name="photos">
					<input required type="text" name="author" value="dimka">
					<input required type="text" name="text" value="ads dsa sd sd">
					<input type="range" name="ratio" value="3" min="0" max="5">
					<button type="submit">Send</button>
				</form>
			</div>
		</div>

		<?php
			$services = get_posts(array(
				'category' => get_category_by_slug('services')->cat_ID
			));
			foreach ($services as $post) : ?>
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