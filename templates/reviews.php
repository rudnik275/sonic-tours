<?php 
$comments = get_comments(array(
	'status' => 'approve',
));
$reviews = get_page_by_title('reviews');
?>
<div class="reviews_container container">
	<div class="reviews">
		<div class="reviews_header">
			<h2 class="section_title">
				<?= $reviews->post_title ?> 
			</h2>
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
</div>