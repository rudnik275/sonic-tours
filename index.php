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
				<a href="/" class="header_logo"></a>
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
				foreach ($services as $post) : ?>
					<a href="<?= $post->guid ?>" class="header_right_item">
						<?= $post->post_title ?>							
					</a>
				<?php endforeach;?>
				<a class="header_right_item">Reviews</a>
				<a class="header_right_item">Contacts</a>
			</div>
		</div>

		<h1 class="header_title">Sri-lanka</h1>
		<h2 class="header_subtitle">Cicerone Buddika Killakulam</h2>
	</header>
	
	<?php 
	if (is_home()) :
		get_template_part('templates/home');
	else : 
		while ( have_posts() ) : the_post(); 
	  	get_template_part('templates/detail');
		endwhile;
	endif; 
	?>

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