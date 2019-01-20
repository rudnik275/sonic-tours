<?php
require_once '../../../wp-load.php';
require_once '../../../wp-admin/includes/file.php';

$comment_data = array(
	'comment_post_ID'      => 1,
	'comment_approved'     => 0,
	'comment_author'       => $_POST['author'],
	'comment_content'      => $_POST['text'],
	'comment_type'         => '',
	'comment_parent'       => 0,
	'comment_date'         => current_time( 'mysql' ), 
);

$ID = wp_insert_comment( wp_slash($comment_data) );
$comment = get_comment($ID);
update_field('ratio', $_POST['ratio'], $comment);

if (!empty($_FILES)) :
	$gallery = array();

	foreach ($_FILES as $uploadedfile) :
		$movefile = wp_handle_upload($uploadedfile, array('test_form' => false));

		if ($movefile) :
			$wp_upload_dir = wp_upload_dir();
			$attachment = array(
				'guid' => $wp_upload_dir['url'].'/'.basename($movefile['file']),
				'post_mime_type' => $movefile['type'],
				'post_title' => preg_replace('/\.[^.]+$/', ”, basename($movefile['file'])),
				'post_content' => '',
				'post_status' => 'inherit'
			);
			$attach_id = wp_insert_attachment($attachment, $movefile['file']);
			$gallery[] = $attach_id;
		endif;
	endforeach;

	update_field('photos', $gallery, $comment);
endif;

echo 'Your review has been submitted and is awaiting administrator verification.';