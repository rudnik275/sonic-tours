<header class="header">
	<div class="header_row container">
		<div class="header_left">
			<a href="/" class="header_logo"></a>
		</div>
		<div class="header_right">
			<div class="header_right_item with_list">
				Excursions
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
			<!-- <a class="header_right_item">Reviews</a> -->
			<a href="<?= $contact_page->guid ?>" class="header_right_item"><?= $contact_page->post_title ?></a>
		</div>
	</div>

	<h1 class="header_title">Sri-lanka</h1>
	<h2 class="header_subtitle">Cicerone Buddika Killakulam</h2>
</header>