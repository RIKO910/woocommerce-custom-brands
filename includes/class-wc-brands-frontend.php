<?php

class WC_Brands_Frontend {

    public static function init() {
        add_action('woocommerce_single_product_summary', array(__CLASS__, 'display_product_brand'), 6);
        add_filter('template_include', array(__CLASS__, 'brand_template_include'), 99);



    }

    public static function display_product_brand() {
        global $post;
        $terms = get_the_terms($post->ID, 'product_brand');
        if ($terms && !is_wp_error($terms)) {
            $brand = array_shift($terms);
            echo '<p class="product-brand">' . esc_html($brand->name) . '</p>';
        }
    }

    public static function brand_template_include($template) {
        if (is_tax('product_brand')) {
            $brand_template = locate_template('woocommerce-brand-archive.php');
            if ($brand_template) {
                $template = $brand_template;
            } else {
                $template = WC_CUSTOM_BRANDS_PATH . 'templates/brand-archive.php';
            }
        }
        return $template;
    }


}
