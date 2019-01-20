<div class="single_container container">
	<h2 class="section_title"><?php the_title() ?></h2>
	<div class="contacts">
		<div class="contacts_left">
			<img src="<?= get_field('avatar', $contacts->ID)['url'] ?>">
			<?= get_field('about_me') ?>
		</div>
		<div class="contacts_right">
			<div class="contacts_right_title">My socials:</div>
			<div class="about_me_socials">
				<a href="#" class="about_me_social instagram"></a>
				<a href="#" class="about_me_social viber"></a>
				<a href="#" class="about_me_social telegram"></a>
				<a href="#" class="about_me_social facebook"></a>
			</div>

			<div class="contacts_right_title">My phone:</div>
			<a href="#" class="contacts_right_text">+38 (093) 123-12-12</a>

			<div class="contacts_right_title">My e-mail:</div>
			<a href="#" class="contacts_right_text">sonic-tours@gmail.com</a>
		</div>
	</div>
</div>

<?php get_template_part('templates/contact-form', 'contacts'); ?>