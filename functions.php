<?php
wp_enqueue_style('styles', get_template_directory_uri() . '/css/styles.css');
wp_enqueue_script('scripts', get_template_directory_uri() . '/js/index.js', null, null, true);

function do_excerpt($string, $word_limit) {
  $words = explode(' ', $string, ($word_limit + 1));
  if (count($words) > $word_limit)
  array_pop($words);
  echo implode(' ', $words).' ...';
}