<?php
/**
 * sborka functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sborka
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

//images single product //
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);

add_action('woocommerce_before_single_product_summary', 'theme_show_product_images', 20);

function theme_show_product_images() { ?>
	  <div class="shop__miniature">
        <div class="shop__miniature-big">
            <div id="big" class="shop__miniature-big-wrapper">
                <?php
                global $product;
                $attachment_ids = $product->get_gallery_image_ids();
                $main=$product->get_image_id();
                $thumbs=wp_get_attachment_image_src($main, 'product-single'); ?>
                <div class="shop__miniature-big-item" >
                    <img src="<?php echo $thumbs['0']; ?>"  alt="<?php the_title(''); ?>">
                </div>
            </div>
        </div>
        <?php  if($attachment_ids) { ?>
        <div class="shop__miniature-small ">
            <div id="small" class="shop__miniature-small-wrapper owl-carousel">
    <?php
        $item=0;
        foreach ( $attachment_ids as $post)  {
            $item++;
            $image = wp_get_attachment_image_src($post, 'product-min');  ?>
                <div class="shop__miniature-small-item ">
                    <a class="horizontal-thumb"  href="<?php echo $image['0']; ?>">
                        <img src="<?php echo $image['0']; ?>" alt="<?php the_title(''); ?>">
                    </a>
                </div>
        <?php } ?>
            </div>
        </div>
        <?php } ?>
    </div>
<?php }

remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 15);

remove_action('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');
add_action('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display', 25);
