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

remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);

add_action('woocommerce_before_shop_loop_item', 'theme_template_loop_product_link_open', 10);
function theme_template_loop_product_link_open() { ?>
    <div class="shop__cart">
<?php }

add_action('woocommerce_after_shop_loop_item', 'theme_template_loop_product_link_close', 15);
function theme_template_loop_product_link_close() { ?>
</div>
<!--shop__cart-end -->
<?php }

remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);

add_action('woocommerce_before_shop_loop_item_title', 'theme_cart_left', 5);
function theme_cart_left() { ?>
<div class="shop__cart-left">
<?php }
add_action('woocommerce_before_shop_loop_item_title', 'theme_cart_left_end', 15);
function theme_cart_left_end() { ?>
</div>
<?php }

add_action('woocommerce_shop_loop_item_title', 'theme_cart_right', 5);

function theme_cart_right() { ?>
    <div class="shop__cart-right">
<?php }

add_action('woocommerce_after_shop_loop_item', 'theme_cart_right_end', 14);
function theme_cart_right_end() { ?>
</div>
<!--cart_right_end -->
<?php }


// title//
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
add_action('woocommerce_shop_loop_item_title', 'theme_template_loop_product_title', 10);
function theme_template_loop_product_title() { ?>
<a href="<?php the_permalink(); ?>"><h3 class="woocommerce-loop-product__title"><?php the_title(''); ?></h3></a>
<?php }

add_action('woocommerce_after_shop_loop_item_title', 'theme_shop_cart_rating', 4);
function theme_shop_cart_rating() { ?>
<div class="shop__cart-rating-wrapper">
<?php }

add_action('woocommerce_after_shop_loop_item_title', 'theme_shop_cart_rating_end', 6);
function theme_shop_cart_rating_end() { ?>
</div>
<?php }

add_action('woocommerce_shop_loop_item_title', 'theme_shop_cart_desc', 12);
function theme_shop_cart_desc() { ?>
    <div class="shop__cart-desc">
    <?php do_excerpt(get_the_excerpt(), 25); ?>
    </div>
<?php }

add_action('woocommerce_after_shop_loop_item', 'theme_add_to_cart_wrapper', 2);
function theme_add_to_cart_wrapper() { ?>
<div class="shop__add-to-cart-wrapper">
<?php }

add_action('woocommerce_after_shop_loop_item', 'theme_add_to_cart_wrapper_end', 12);
function theme_add_to_cart_wrapper_end() { ?>
</div>
<!--add_to_cart_wrapper_end -->
<?php } 