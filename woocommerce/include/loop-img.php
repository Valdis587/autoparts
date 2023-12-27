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

remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action('woocommerce_before_shop_loop_item_title', 'theme_template_loop_product_thumbnail', 10);

function theme_template_loop_product_thumbnail() {
    global $product;
    global $themesetting;
    global $dynamic_featured_image;
    $main=$product->get_image_id();
    $thumbs=wp_get_attachment_image_src($main, 'product-archive'); 
    if(is_plugin_active('dynamic-featured-image/dynamic-featured-image.php')) {
        if ( class_exists( 'Dynamic_Featured_Image' ) ) {
            $featured_images = $dynamic_featured_image->get_featured_images( get_the_ID());
            }
    }
    if(!$featured_images) { ?>
    <div class="shop__cart-img">
        <a href="<?php the_permalink(); ?>">
        <img width="<?php echo $themesetting['loop-img-width'] ?>" height="<?php echo $themesetting['loop-img-height'] ?>"  src="<?php echo $thumbs['0']; ?>" alt="<?php the_title(''); ?>">
        </a>
    </div>
    <?php } else { ?>
         <div class="shop__cart-img-dop">
         <a href="<?php the_permalink(); ?>">
         <img class="img-os" width="<?php echo $themesetting['loop-img-width'] ?>" height="<?php echo $themesetting['loop-img-height'] ?>"  src="<?php echo $thumbs['0']; ?>" alt="<?php the_title(''); ?>">
         <?php foreach( $featured_images as $images ): ?>
         <img class="img-dop" width="<?php echo $themesetting['loop-img-width'] ?>" height="<?php echo $themesetting['loop-img-height'] ?>"  src="<?php echo $images['full'] ?>" alt="<?php the_title(''); ?>">
         <?php endforeach;  ?>
        </a>
     </div>
   <?php }
    if($themesetting['quick-on']) { ?>
        <a id="shop__cart-quick" class="shop__cart-quick" data-product-id="<?php echo get_the_ID() ?>" href="javascript:void(0);"><i class="icon-search"></i></a>
<?php } 

if($themesetting['badges-on']) { 
    if($themesetting['badgik-new']) { ?>
<span class="label-product label-new"><?php if($themesetting['badges-new']) { echo $themesetting['badges-new']; } ?></span>
<?php } 
$regulare_price=wc_get_price_to_display( $product, array( 'price' => $product->get_regular_price()) );
$sale_price=wc_get_price_to_display( $product, array( 'price' => $product->get_sale_price() ) );
$percentage = round( ( ( $regulare_price -  $sale_price ) / $regulare_price ) * 100 );
if($percentage) {
?>
<span  class="label-product label-hit">-<?php echo $percentage; ?>%</span>
<?php if($themesetting['badgik-hit']) { ?>
<span  class="label-product  label-sale label-hit-margin"><?php if($themesetting['badges-hit']) { echo $themesetting['badges-hit']; } ?></span>
<?php } } else {
   if($themesetting['badgik-hit']) { ?>
<span  class="label-product  label-sale"><?php if($themesetting['badges-hit']) { echo $themesetting['badges-hit']; } ?></span>
  <?php  } 
}  }  

if($themesetting['count-on']) {
    if($themesetting['count-year'] && $themesetting['count-mons'] && $themesetting['count-day']) {
    ?>
      <div id="<?php echo get_the_ID() ?>" class="product__count countdown_box main-action<?php echo get_the_ID() ?>" data-year="<?php echo $themesetting['count-year']; ?>" data-mons="<?php echo $themesetting['count-mons']; ?>" data-day="<?php echo $themesetting['count-day']; ?>">
                    <div class="countdown_inner">
                        <h3 class="product__count-title">До конца акции осталось:</h3>
                        <div class="defaultCountdown-<?php echo get_the_ID() ?> countdown-row"></div>
                    </div>
                </div>
    <?php } } }