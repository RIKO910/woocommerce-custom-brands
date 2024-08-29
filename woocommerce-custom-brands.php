<?php
/**
 * Plugin Name: WooCommerce Custom Brands
 * Plugin URI:  https://yourwebsite.com
 * Description: Adds a custom brand taxonomy for WooCommerce products.
 * Version:     1.0.0
 * Author:      Your Name
 * Author URI:  https://yourwebsite.com
 * Text Domain: woocommerce-custom-brands
 * Domain Path: /languages
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Define constants
define('WC_CUSTOM_BRANDS_VERSION', '1.0.0');
define('WC_CUSTOM_BRANDS_PATH', plugin_dir_path(__FILE__));
define('WC_CUSTOM_BRANDS_URL', plugin_dir_url(__FILE__));

// Include the core classes
include_once WC_CUSTOM_BRANDS_PATH . 'includes/class-wc-brands-taxonomy.php';
//include_once WC_CUSTOM_BRANDS_PATH . 'includes/class-wc-brands-admin.php';
include_once WC_CUSTOM_BRANDS_PATH . 'includes/class-wc-brands-frontend.php';

// Initialize the plugin
function wc_custom_brands_init() {
    WC_Brands_Taxonomy::init();
//    WC_Brands_Admin::init();
    WC_Brands_Frontend::init();
}

add_action('plugins_loaded', 'wc_custom_brands_init');
