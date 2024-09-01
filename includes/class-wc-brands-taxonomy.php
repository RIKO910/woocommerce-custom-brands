<?php

class WC_Brands_Taxonomy {

    public static function init() {
        add_action('init', array(__CLASS__, 'register_brand_taxonomy'));

//        add_filter('manage_edit-product_columns', array(__CLASS__, 'wc_custom_brands_add_product_columns'));
//        add_action('manage_product_posts_custom_column', array(__CLASS__, 'wc_custom_brands_show_product_columns'), 10, 2);
//        add_filter('manage_edit-product_sortable_columns', array(__CLASS__, 'wc_custom_brands_sortable_columns'));
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

//    public static function wc_custom_brands_add_product_columns($columns) {
//        $new_columns = array();
//
//        foreach ($columns as $key => $value) {
//            $new_columns[$key] = $value;
//            if ($key === 'name') {
//                // Add the new column after the "Name" column
//                $new_columns['product_brand'] = __('Brand', 'woocommerce-custom-brands');
//            }
//        }
//
//        return $new_columns;
//    }
//
//    public static function wc_custom_brands_show_product_columns($column, $post_id) {
//        if ($column === 'product_brand') {
//            $terms = get_the_terms($post_id, 'product_brand');
//            if ($terms && !is_wp_error($terms)) {
//                $brands = array();
//                foreach ($terms as $term) {
//                    $brands[] = $term->name;
//                }
//                echo implode(', ', $brands);
//            } else {
//                echo __('No Brand', 'woocommerce-custom-brands');
//            }
//        }
//    }
//
//    public static function wc_custom_brands_sortable_columns($columns) {
//        $columns['product_brand'] = 'product_brand';
//        return $columns;
//    }
}



