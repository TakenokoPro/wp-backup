<?php

// ファンクション
require_once('lib/admin/init.php');
require_once('lib/admin/manual.php');

require_once('lib/functions/asset.php');
require_once('lib/functions/head.php');
require_once('lib/functions/custom-post.php');
require_once('lib/functions/bzb-functions.php');
require_once('lib/functions/setting.php');
require_once('lib/functions/custom-fields.php');
require_once('lib/functions/category-custom-fields.php');
require_once('lib/functions/widget.php');
//require_once('lib/functions/lang.php');
require_once('lib/functions/postviews.php');
// require_once('lib/functions/json-ld.php');
require_once('lib/functions/social_btn.php');
require_once('lib/functions/show_avatar.php');
require_once('lib/functions/shortcode.php');
require_once('lib/functions/rss.php');


//======================================================================
// Custom
//======================================================================
function load_stylesheet() {
  wp_enqueue_style('custom_style', get_bloginfo('template_directory').'/dist/css/app.css', array(), null, 'all');
}
function load_scripts() {
  wp_enqueue_script( 'custom_scripts', get_bloginfo( 'template_directory') . '/dist/js/main.js', array(), false, 'true' );
}
add_action('wp_enqueue_scripts', 'load_stylesheet');
add_action('wp_enqueue_scripts', 'load_scripts');