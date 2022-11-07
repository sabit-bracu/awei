<?php
/**
 * Price Post Type
 *
 * @package   Price_Post_Type
 * @author    Devin Price
 * @author    Gary Jones
 * @license   GPL-2.0+
 * @link      http://wptheming.com/price-post-type/
 * @copyright 2011 Devin Price, Gary Jones
 */

/**
 * Price tag taxonomy.
 *
 * @package Price_Post_Type
 * @author  Devin Price
 * @author  Gary Jones
 */
class Price_Post_Type_Taxonomy_Tag extends Gamajo_Price_Taxonomy {
	/**
	 * Taxonomy ID.
	 *
	 * @since 1.0.0
	 *
	 * @type string
	 */
	protected $taxonomy = 'price_tag';

	/**
	 * Return taxonomy default arguments.
	 *
	 * @since 1.0.0
	 *
	 * @return array Taxonomy default arguments.
	 */
	protected function default_args() {
		$labels = array(
			'name'                       => __( 'Price Tags', 'price-post-type' ),
			'singular_name'              => __( 'Price Tag', 'price-post-type' ),
			'menu_name'                  => __( 'Price Tags', 'price-post-type' ),
			'edit_item'                  => __( 'Edit Price Tag', 'price-post-type' ),
			'update_item'                => __( 'Update Price Tag', 'price-post-type' ),
			'add_new_item'               => __( 'Add New Price Tag', 'price-post-type' ),
			'new_item_name'              => __( 'New Price Tag Name', 'price-post-type' ),
			'parent_item'                => __( 'Parent Price Tag', 'price-post-type' ),
			'parent_item_colon'          => __( 'Parent Price Tag:', 'price-post-type' ),
			'all_items'                  => __( 'All Price Tags', 'price-post-type' ),
			'search_items'               => __( 'Search Price Tags', 'price-post-type' ),
			'popular_items'              => __( 'Popular Price Tags', 'price-post-type' ),
			'separate_items_with_commas' => __( 'Separate price tags with commas', 'price-post-type' ),
			'add_or_remove_items'        => __( 'Add or remove price tags', 'price-post-type' ),
			'choose_from_most_used'      => __( 'Choose from the most used price tags', 'price-post-type' ),
			'not_found'                  => __( 'No price tags found.', 'price-post-type' ),
			'items_list_navigation'      => __( 'Price tags list navigation', 'price-post-type' ),
			'items_list'                 => __( 'Price tags list', 'price-post-type' ),
		);

		$args = array(
			'labels'            => $labels,
			'public'            => true,
			'show_in_nav_menus' => true,
			'show_ui'           => true,
			'show_tagcloud'     => true,
			'hierarchical'      => false,
			'rewrite'           => array( 'slug' => 'price_tag' ),
			'show_admin_column' => true,
			'query_var'         => true,
			'show_in_rest'      => true,
		);

		return apply_filters( 'priceposttype_tag_args', $args );
	}
}