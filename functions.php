<?php

/* Theme Support: Titles, etc.
---------------------------------------------------------------------------------------------------- */

add_theme_support('title-tag');
add_theme_support('post-thumbnails');


/* Theme Support: Titles, etc.
---------------------------------------------------------------------------------------------------- */

function my_error_notice() { ?>
  <div style="width: 340px; height: 90px; position: fixed; top: 20px; right: 20px; z-index: 100000; padding:10px; border-radius: 45px 6px 6px 45px; background-color: #f44c67; box-shadow: rgba(29, 29, 31, 0.5) 0 5px 40px; box-sizing: border-box;">
    <div style="width: 70px; height: 70px; float: left; background-color: #ffffff; background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/icon-plasso.png'); background-size: 45px; background-position: center 12px; background-repeat: no-repeat; border-radius: 50%;"></div>
    <div style="width: 240px; float: left; margin: -2px 0 0 10px;">
      <h6 style="margin: 0; padding: 0; font-size: 12px; color: #ffffff;">Plasso Plugin Required!</h6>
      <p style="margin: 0; padding: 0; font-size: 12px; color: #ffffff; opacity: 0.75;">To use this theme, you’ll have to install and activate the Plasso Plugin.</p>
      <a style="font-size: 12px; color: #ffffff;" href="<?php echo admin_url('plugin-install.php?s=plasso&tab=search&type=term'); ?>">Get the Plasso Plugin</a>
    </div>
  </div>
<?php }
if(!function_exists('plasso_protect_pages')) {
  add_action('admin_notices', 'my_error_notice');
}


/* Include Works: Customizer, etc.
---------------------------------------------------------------------------------------------------- */

require_once(get_template_directory() . '/assets/works/customizer.php');


/* Kirki: Including Kirki in this theme.
---------------------------------------------------------------------------------------------------- */

// Including Kirki
require_once(get_template_directory() . '/assets/works/vendor/kirki/kirki.php');

// Config Kirki to work from the theme.
function plasso_kirki_configuration() {
  return array('url_path' => get_stylesheet_directory_uri() . '/assets/works/vendor/kirki/');
}
add_filter('kirki/config', 'plasso_kirki_configuration');


/* ACF: Including Advanced Custom Fields in this theme.
---------------------------------------------------------------------------------------------------- */

// Custom ACF path.
add_filter('acf/settings/path', 'pk_acf_settings_path');
function pk_acf_settings_path($path) {
  $path = get_template_directory() . '/assets/works/vendor/acf/';
  return $path;
}

// Custom ACF directory.
add_filter('acf/settings/dir', 'pk_acf_settings_dir');
function pk_acf_settings_dir($dir) {
  $dir = get_template_directory_uri() . '/assets/works/vendor/acf/';
  return $dir;
}

// Hide the ACF admin.
add_filter('acf/settings/show_admin', '__return_false');

// Include ACF.
include_once(get_template_directory() . '/assets/works/vendor/acf/acf.php');

// Include ACF fields.
include_once(get_template_directory() . '/assets/works/custom-fields.php');


/* Remove Menus: Removing unused WordPress menu items and taxonomy features.
---------------------------------------------------------------------------------------------------- */

function plasso_remove_menus() {

	// Removes unused top level menus.
	remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'plasso_remove_menus');

function plasso_remove_customizer_settings($wp_customize){

	// Remove nav menus from the customizer.
	$wp_customize->remove_panel('nav_menus');
  $wp_customize->remove_section('custom_css');
}
add_action('customize_register', 'plasso_remove_customizer_settings', 20);


/* Enqueue: Adding styles and scripts.
---------------------------------------------------------------------------------------------------- */

function plasso_enqueue() {

	// Loads Google Fonts
	$query_args = array(
		'family' => 'Roboto:400,300,500,700|Montserrat:400,700'
	);
	wp_register_style('plasso_fonts', add_query_arg($query_args, 'https://fonts.googleapis.com/css'), array(), null);
	wp_enqueue_style('plasso_fonts');

	// Loads site styles
	wp_enqueue_style('plasso_site', get_template_directory_uri() . '/assets/styles/site-min.css');

	// Loads site scripts
	wp_enqueue_script('jquery');
	wp_enqueue_script('plasso_site', get_template_directory_uri() . '/assets/scripts/site-min.js', array('jquery'), '1.0', 'in-footer');

	// Localizes scripts
	wp_localize_script('plasso_site', 'plassoAjax', array(
		'ajaxUrl' => admin_url('admin-ajax.php'),
		'nonce' => wp_create_nonce('plasso-nonce')
	));
}
add_action('wp_enqueue_scripts', 'plasso_enqueue');


/* Products: Register the products post type.
---------------------------------------------------------------------------------------------------- */

function plasso_post_types() {

  // The "Product" post type.
  $labels = array(
    'name' => 'Products',
    'singular_name' => 'Product',
    'menu_name' => 'Products',
    'all_items' => 'All Products',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Product',
    'edit' => 'Edit',
    'edit_item' => 'Edit Product',
    'new_item' => 'New Product',
    'view' => 'View',
    'view_item' => 'View Product',
    'search_items' => 'Search Products',
    'not_found' => 'No Products Found',
    'not_found_in_trash' => 'No Products Found in Trash',
    'parent' => 'Parent Product',
  );

	// Variables for the "Product" post type.
  $args = array(
    'labels' => $labels,
    'description' => 'Your downloadable products.',
    'public' => true,
    'show_ui' => true,
    'has_archive' => true,
    'show_in_menu' => true,
    'exclude_from_search' => false,
    'capability_type' => 'post',
    'map_meta_cap' => true,
    'hierarchical' => false,
    'rewrite' => array('slug' => 'product', 'with_front' => true),
    'query_var' => true,
    'menu_position' => 5,
    'supports' => array('title'),
	  'taxonomies' => array('post_tag'),
  );
  register_post_type('products', $args);

	flush_rewrite_rules();
}
add_action('init', 'plasso_post_types');


/* Taxonomies: Adding the product post type to tags.
---------------------------------------------------------------------------------------------------- */

function plasso_post_types_tax($query) {
  if(is_category() || is_tag() && empty( $query->query_vars['suppress_filters'])) {

    // Get all your post types
    $post_types = get_post_types();

    $query->set('post_type', $post_types);
    return $query;
  }
}
add_filter('pre_get_posts', 'plasso_post_types_tax');


/* Taxonomies: Remove tags from standard posts.
---------------------------------------------------------------------------------------------------- */

function plasso_unregister_tags() {
  unregister_taxonomy_for_object_type('post_tag', 'post');
}
add_action('init', 'plasso_unregister_tags');

