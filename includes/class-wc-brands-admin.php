<?php

class WC_Brands_Admin {

    public static function init() {
        // Change 'product_cat_add_form_fields' and 'product_cat_edit_form_fields' to target 'product_brand'
        add_action('product_brand_add_form_fields', array(__CLASS__, 'add_brand_image_field'), 10, 2);
        add_action('product_brand_edit_form_fields', array(__CLASS__, 'edit_brand_image_field'), 10, 2);

        // Make sure the correct taxonomy hooks are used for saving metadata
        add_action('created_product_brand', array(__CLASS__, 'save_brand_image'), 10, 2);
        add_action('edited_product_brand', array(__CLASS__, 'save_brand_image'), 10, 2);


        add_action('admin_enqueue_scripts', array(__CLASS__, 'enqueue_media_uploader'));

    }

    public static function add_brand_image_field() {
        ?>
        <div class="form-field term-group">
            <label for="brand_image"><?php _e('Brand Image', 'woocommerce-custom-brands'); ?></label>
            <input type="file" id="brand_image" name="brand_image" value="">
            <button id="upload_brand_image_button" class="button"><?php _e('Upload/Add image', 'woocommerce-custom-brands'); ?></button>
        </div>
        <?php
    }

    public static function edit_brand_image_field($term) {
        $brand_image = get_term_meta($term->term_id, 'brand_image', true);
        ?>
        <tr class="form-field term-group-wrap">
            <th scope="row"><label for="brand_image"><?php _e('Brand Image', 'woocommerce-custom-brands'); ?></label></th>
            <td>
                <input type="file" id="brand_image" name="brand_image" value="<?php echo esc_attr($brand_image); ?>">
                <button id="upload_brand_image_button" class="button"><?php _e('Upload/Add image', 'woocommerce-custom-brands'); ?></button>
            </td>
        </tr>
        <?php
    }

    public static function save_brand_image($term_id) {
        if (isset($_POST['brand_image']) && '' !== $_POST['brand_image']) {
            update_term_meta($term_id, 'brand_image', sanitize_text_field($_POST['brand_image']));
        }
    }

    public static function enqueue_media_uploader() {
        if (isset($_GET['taxonomy']) && $_GET['taxonomy'] === 'product_brand') {
            wp_enqueue_media();
            wp_enqueue_script('brand-media-uploader', plugins_url('assets/js/brand-media-uploader.js', __FILE__), array('jquery'), WC_CUSTOM_BRANDS_VERSION, true);
        }
    }
}

