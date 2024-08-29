<!-- brand-archive.php -->
<?php
get_header();
?>
<div class="brand-archive">
    <h1><?php single_term_title(); ?></h1>
    <div class="brand-products">
        <?php woocommerce_product_loop_start(); ?>
        <?php while (have_posts()) : the_post(); ?>
            <?php wc_get_template_part('content', 'product'); ?>
        <?php endwhile; ?>
        <?php woocommerce_product_loop_end(); ?>
    </div>
</div>
<?php
get_footer();
?>
