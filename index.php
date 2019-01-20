<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700&amp;subset=cyrillic" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body>
	<?php 
	get_header();

	if (is_home()) :
		get_template_part('templates/home');
	elseif(is_page('contacts') ):
		while ( have_posts() ) : the_post(); 
			get_template_part('templates/contacts');
		endwhile;
	elseif(is_page('reviews') ):
		while ( have_posts() ) : the_post(); 
			get_template_part('templates/reviews');
		endwhile;
	else : 
		while ( have_posts() ) : the_post(); 
	  	get_template_part('templates/detail');
		endwhile;
	endif; 

	get_template_part('templates/send-comment-popup');
	get_template_part('templates/reviews-image-popup');

	get_footer();
	wp_footer(); 
	?>
</body>
</html>