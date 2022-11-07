<?php
/**
 * Price Post Type
 *
 * @package   Price_Post_Type
 * @author    Devin Price
 * @license   GPL-2.0+
 * @link      https://wptheming.com/price-post-type/
 * @copyright 2011 Devin Price, Gary Jones
 *
 * @wordpress-plugin
 * Plugin Name: Price Post Type
 * Plugin URI:  https://wptheming.com/price-post-type/
 * Description: Enables a price post type and taxonomies.
 * Version:     1.0.0
 * Author:      Devin Price
 * Author URI:  https://www.wptheming.com/
 * Text Domain: priceposttype
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Required files for registering the post type and taxonomies.
require plugin_dir_path( __FILE__ ) . 'includes/class-price-post-type.php';
require plugin_dir_path( __FILE__ ) . 'includes/interface-gamajo-registerable.php';
require plugin_dir_path( __FILE__ ) . 'includes/class-gamajo-post-type.php';
require plugin_dir_path( __FILE__ ) . 'includes/class-gamajo-taxonomy.php';
require plugin_dir_path( __FILE__ ) . 'includes/class-price-post-type-post-type.php';
require plugin_dir_path( __FILE__ ) . 'includes/class-price-post-type-taxonomy-category.php';
require plugin_dir_path( __FILE__ ) . 'includes/class-price-post-type-taxonomy-tag.php';
require plugin_dir_path( __FILE__ ) . 'includes/class-price-post-type-registrations.php';

// Instantiate registration class, so we can add it as a dependency to main plugin class.
$price_post_type_registrations = new Price_Post_Type_Registrations;

// Instantiate main plugin file, so activation callback does not need to be static.
$price_post_type = new Price_Post_Type( $price_post_type_registrations );

// Register callback that is fired when the plugin is activated.
register_activation_hook( __FILE__, array( $price_post_type, 'activate' ) );

// Initialise registrations for post-activation requests.
$price_post_type_registrations->init();

add_action( 'init', 'price_post_type_init', 100 );
/**
 * Adds styling to the dashboard for the post type and adds price posts
 * to the "At a Glance" metabox.
 *
 * Adds custom taxonomy body classes to price posts on the front end.
 *
 * @since 0.8.3
 */
function price_post_type_init() {
	if ( is_admin() ) {
		global $price_post_type_admin, $price_post_type_registrations;
		// Loads for users viewing the WordPress dashboard
		if ( ! class_exists( 'Gamajo_Price_Dashboard_Glancer' ) ) {
			require plugin_dir_path( __FILE__ ) . 'includes/class-gamajo-dashboard-glancer.php';  // WP 3.8
		}
		require plugin_dir_path( __FILE__ ) . 'includes/class-price-post-type-admin.php';
		$price_post_type_admin = new Price_Post_Type_Admin( $price_post_type_registrations );
		$price_post_type_admin->init();
	} else {
		// Loads for users viewing the front end
		if ( apply_filters( 'priceposttype_add_taxonomy_terms_classes', true ) ) {
			if ( ! class_exists( 'Gamajo_Price_Single_Entry_Term_Body_Classes' ) ) {
				require plugin_dir_path( __FILE__ ) . 'includes/class-gamajo-single-entry-term-body-classes.php';
			}
			$price_post_type_body_classes = new Gamajo_Price_Single_Entry_Term_Body_Classes;
			$price_post_type_body_classes->init( 'price' );
		}
	}
}
