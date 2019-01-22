<?php $contacts = get_page_by_title('contacts')?>
					
<footer class="footer">
	<div class="footer_social_container container">
		<a target="_blank" href="<?= get_field('instagram', $contacts->ID) ?>" class="footer_social instagram"></a>
		<a target="_blank" href="<?= get_field('viber', $contacts->ID) ?>" class="footer_social viber"></a>
		<a target="_blank" href="<?= get_field('telegram', $contacts->ID) ?>" class="footer_social telegram"></a>
		<a target="_blank" href="<?= get_field('facebook', $contacts->ID) ?>" class="footer_social facebook"></a>
	</div>
</footer>