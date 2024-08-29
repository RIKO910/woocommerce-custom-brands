<?php

class WC_Brands_Taxonomy {

    public static function init() {
        add_action('init', array(__CLASS__, 'register_brand_taxonomy'));
    }

    public static function register_brand_taxonomy() {
        $labels = array(
            'name'              => _x('Brands', 'taxonomy general name', 'woocommerce-custom-brands'),
            'singular_name'     => _x('Brand', 'taxonomy singular name', 'woocommerce-custom-brands'),
            'search_items'      => __('Search Brands', 'woocommerce-custom-brands'),
            'all_items'         => __('All Brands', 'woocommerce-custom-brands'),
            'parent_item'       => __('Parent Brand', 'woocommerce-custom-brands'),
            'parent_item_colon' => __('Parent Brand:', 'woocommerce-custom-brands'),
            'edit_item'         => __('Edit Brand', 'woocommerce-custom-brands'),
            'update_item'       => __('Update Brand', 'woocommerce-custom-brands'),
            'add_new_item'      => __('Add New Brand', 'woocommerce-custom-brands'),
            'new_item_name'     => __('New Brand Name', 'woocommerce-custom-brands'),
            'menu_name'         => __('Brands', 'woocommerce-custom-brands'),
        );

        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array('slug' => 'brand'),
        );

        register_taxonomy('product_brand', array('product'), $args);
    }
}
