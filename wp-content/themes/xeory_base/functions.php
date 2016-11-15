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
function load() {
  wp_enqueue_style('custom_app_style', get_bloginfo('template_directory').'/dist/css/app.css', array(), null, 'all');
  wp_enqueue_style('custom_prism_style', get_bloginfo('template_directory').'/lib/css/prism.css', array(), null, 'all');
  wp_enqueue_script( 'custom_app_scripts', get_bloginfo( 'template_directory') . '/dist/js/main.js', array(), false, 'true' );
  wp_enqueue_script( 'custom_prism_scripts', get_bloginfo( 'template_directory') . '/lib/js/prism.js', array(), false, 'true' );
}
add_action('wp_enqueue_scripts', 'load');
