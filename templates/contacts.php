<?php $contacts = get_page_by_title('contacts')?>

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
				<a target="_blank" href="<?= get_field('instagram', $contacts->ID) ?>" class="about_me_social instagram"></a>
				<a target="_blank" href="<?= get_field('viber', $contacts->ID) ?>" class="about_me_social viber"></a>
				<a target="_blank" href="<?= get_field('telegram', $contacts->ID) ?>" class="about_me_social telegram"></a>
				<a target="_blank" href="<?= get_field('facebook', $contacts->ID) ?>" class="about_me_social facebook"></a>
			</div>

			<div class="contacts_right_title">My phone:</div>
			<a href="tel:<?= get_field('phone', $contacts->ID) ?>" class="contacts_right_text"><?= get_field('phone', $contacts->ID) ?></a>

			<div class="contacts_right_title">My e-mail:</div>
			<a href="mailto:<?= get_field('email', $contacts->ID) ?>" class="contacts_right_text"><?= get_field('email', $contacts->ID) ?></a>
		</div>
	</div>
</div>

<?= do_shortcode('[contact-form-7 id="130" title="Contact form 12"]') ?>