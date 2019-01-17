<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700&amp;subset=cyrillic" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body>
	<header class="header">
		<div class="header_row container">
			<div class="header_left">
				<div class="header_logo"></div>
			</div>
			<div class="header_right">
				<div class="header_right_item with_list">
					Excursion
					<div class="header_dropdown">
						<?php
						$excursions = get_posts(array(
							'category' => get_category_by_slug('excursions')->cat_ID
						));
						foreach ($excursions as $post){ ?>
							<a href="<?= $post->guid ?>" class="header_dropdown_item">
								<?= $post->post_title ?>							
							</a>
						<?php }?>
						
					</div>
				</div>
				<?php
				$services = get_posts(array(
					'category' => get_category_by_slug('services')->cat_ID
				));
				foreach ($services as $post){ ?>
					<a href="<?= $post->guid ?>" class="header_right_item">
						<?= $post->post_title ?>							
					</a>
				<?php }?>
				<a class="header_right_item">Reviews</a>
				<a class="header_right_item">Contacts</a>
			</div>
		</div>

		<h1 class="header_title">Sri-lanka</h1>
		<h2 class="header_subtitle">Cicerone Buddika Killakulam</h2>
	</header>

	<div class="main container">
		<div class="main_left_col">
			<h2 class="section_title excursion_title">Excursion</h2>
			<div class="excursion_list">
				<?php
				$excursions = get_posts(array(
					'category' => get_category_by_slug('excursions')->cat_ID
				));
				foreach ($excursions as $post){ ?>
					<a href="<?= $post->guid ?>" class="excursion_list_item">
						<img class="excursion_list_item_photo" src="<?= get_field('image', $post->ID)['url'] ?>">
						<div class="excursion_list_item_text">
							<div class="excursion_list_item_text_title">
								<?= $post->post_title ?>
							</div>
							<div class="excursion_list_item_text_subtitle">
								<?= get_field('city', $post->ID) ?>
							</div>
						</div>
					</a>
				<?php }?>
			</div>

			<div class="section">
				<h2 class="section_title">Отзывы</h2>
				<div class="section_container">
					Отзыв <br>
					Отзыв <br>
					Отзыв <br>
					Отзыв <br>
					Отзыв <br>
					Отзыв <br>
					Отзыв <br>
					Отзыв <br>
					Отзыв <br>
					Отзыв <br>
				</div>
			</div>

			<?php
				$services = get_posts(array(
					'category' => get_category_by_slug('services')->cat_ID
				));
				foreach ($services as $post){ ?>
				<div class="section">
					<h2 class="section_title"><?= $post->post_title ?></h2>
					<div class="section_container">
						<div class="section_slider_container" id="slider_<?= $post->ID ?>">
							<div class="section_slider">
								<?php foreach(get_field('image_galery', $post->ID) as $image){?>
									<div class="section_slider_item"><img src="<?= $image['url'] ?>"></div>
								<?php }?>
							</div>
						</div>
						<div class="section_content">
							<ul class="section_list">
								<?php foreach(get_field('features', $post->ID) as $feature){?>
								<li><?= $feature['text'] ?></li>
								<?php }?>
							</ul>
							<span class="section_text"><?= get_field('description', $post->ID) ?></span>
							<button class="section_btn btn">Заказать</button>
						</div>
					</div>
				</div>
			<?php }?>

		</div>
		
		<?php $contacts = get_page_by_title('contacts')?>
		<div class="main_right_col">
			<div class="about_me">
				<h2 class="section_title">About me</h2>
				<div class="about_me_container">
					<img class="about_me_photo" src="<?= get_field('avatar', $contacts->ID)['url'] ?>">
					<div class="about_me_text">
						<?= get_field('about_me', $contacts->ID) ?>
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

	<div class="contact_form container">
		<h2 class="section_title">Ask question to me</h2>
		<div class="contact_form_container">
			<div class="contact_form_col_left">
				<textarea cols="30" rows="10" placeholder="Your question" class="contact_form_textarea"></textarea>
			</div>
			<div class="contact_form_col_right">
				<input type="text" class="contact_form_input" placeholder="Name">
				<input type="text" class="contact_form_input" placeholder="Phone or e-mail">
				<button class="contact_form_btn btn">Отправить</button>
			</div>
		</div>
	</div>


	<footer class="footer">
		<div class="footer_social_container container">
			<a href="#" class="footer_social instagram"></a>
			<a href="#" class="footer_social viber"></a>
			<a href="#" class="footer_social telegram"></a>
			<a href="#" class="footer_social facebook"></a>
		</div>
	</footer>

	<?php wp_footer(); ?>
</body>
</html>