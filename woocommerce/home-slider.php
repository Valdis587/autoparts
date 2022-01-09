<?php
/**
 * AutoParts functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package AutoParts
 */

if ( ! defined( '_S_VERSION' ) ) {
    // Replace the version number of the theme on each release.
    define( '_S_VERSION', '1.0.0' );
}
?>
<div class="item">
<div class="product-layout product-grid">
    <div class="product-item-container item--static">
        <div class="left-block">
            <div class="product-image-container second_img">
                <a href="<?php the_permalink(); ?>" target="_self" title="<?php the_title(''); ?>">
                    <?php
                    global $product;
                    $attachment_ids = $product->get_gallery_image_ids();
                    $main=$product->get_image_id();
                    $thumbs=wp_get_attachment_image_src($main, 'product-archive'); ?>
                    <img src="<?php echo $thumbs['0']; ?>" class="img-1 img-responsive" alt="<?php the_title(''); ?>">

                    <?php
                    if( class_exists('Dynamic_Featured_Image') ) {
                        global $dynamic_featured_image;
                        $featured_images = $dynamic_featured_image->get_featured_images( get_the_ID() );
                        foreach($featured_images as $featured_image) {
                            ?>
                            <img src="<?php echo $featured_image['full']; ?>" class="img-2 img-responsive" alt="<?php the_title(''); ?>">
                        <?php } } ?>
                </a>
            </div>
            <?php
            global $autopars;
            if($autopars['badges-on']) {
                $new = get_post_meta( get_the_ID(), 'new_badge', true );
                $hit = get_post_meta( get_the_ID(), 'hit_badge', true );
                if($new=='yes' && $hit=='yes') {
                    ?>
                    <?php if($autopars['badges-new']) { ?>
                        <span class="label-product label-new"><?php echo $autopars['badges-new']; ?></span>
                    <?php } ?>
                    <?php if($autopars['badges-hit']) { ?>
                        <span style="margin-top: 40px" class="label-product label-hit"><?php echo $autopars['badges-hit']; ?></span>
                    <?php } ?>
                <?php } ?>
                <?php if($new=='no' && $hit=='yes') { ?>
                    <?php if($autopars['badges-hit']) { ?>
                        <span  class="label-product label-hit"><?php echo $autopars['badges-hit']; ?></span>
                    <?php } ?>
                <?php }
                if($new=='yes') { ?>
                    <?php if($autopars['badges-new']) { ?>
                        <span class="label-product label-new"><?php echo $autopars['badges-new']; ?></span>
                    <?php } ?>
                <?php }
                $regulare_price=wc_get_price_to_display( $product, array( 'price' => $product->get_regular_price()) );
                $sale_price=wc_get_price_to_display( $product, array( 'price' => $product->get_sale_price() ) );
                $percentage = round( ( ( $regulare_price -  $sale_price ) / $regulare_price ) * 100 );
                if($percentage) {
                    ?>
                    <span class="label-product label-sale">-<?php echo $percentage; ?>%</span>
                <?php } } ?>
            <?php if($autopars['quick-on']) { ?>
                <!--quickview-->
                <div class="so-quickview">
                    <a class=" btn-button quickview quickview_handler visible-lg" id="IdModals" data-toggle="modal" data-target="#myModal" data-product-id="<?php echo get_the_ID() ?>" href="#myModal"><i class="fa fa-search"></i><span>Quick view</span></a>
                </div>
                <!--end quickview-->
            <?php } ?>
            <!--end quickview-->
        </div>
        <div class="right-block">
            <div class="button-group cartinfo--static">
                <?php
                if( class_exists( 'YITH_WCWL' ) ) {
                    echo do_shortcode("[yith_wcwl_add_to_wishlist]");
                }
                global $product;
                global $autopars;
                if(!$autopars['catalog-on']) {
                    $args = array();
                    echo apply_filters(
                        'woocommerce_loop_add_to_cart_link', // WPCS: XSS ok.
                        sprintf(
                            '<a href="%s" data-quantity="%s" class="%s" %s><span>%s</span></a>',
                            esc_url($product->add_to_cart_url()),
                            esc_attr(isset($args['quantity']) ? $args['quantity'] : 1),
                            esc_attr(isset($args['class']) ? $args['class'] : 'button addToCart'),
                            isset($args['attributes']) ? wc_implode_html_attributes($args['attributes']) : '',
                            esc_html($product->add_to_cart_text())
                        ),
                        $product,
                        $args
                    );
                } else { ?>
                    <a href="<?php the_permalink(); ?>" class="button addToCart">Подробнее</a>
                <?php  }
                if( class_exists( 'YITH_WOOCOMPARE' )) {
                    ?>
                    <a  type="button" data-toggle="tooltip"  class="compare btn-button" data-product_id="<?php echo get_the_ID() ?>" title="Добавить в сравнения" ><i class="fa fa-refresh"></i></a>
                <?php } ?>
            </div>
            <h4><a href="<?php the_permalink(); ?>" title="<?php the_title(''); ?>" target="_self"><?php the_title(''); ?></a></h4>
            <div style="font-size: 10px; text-align: center; height: 10px; margin-bottom: 10px" class="main-rating">
                <?php
                global $product;
                if ( ! wc_review_ratings_enabled() ) {
                    return;
                }
                if(wc_get_rating_html( $product->get_average_rating() )) {
                    echo wc_get_rating_html( $product->get_average_rating() );
                } else { ?>
                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                <?php } ?>
            </div>
            <div class="price">
                <?php
                $regulare_price=wc_get_price_to_display( $product, array( 'price' => $product->get_regular_price()) );
                $sale_price=wc_get_price_to_display( $product, array( 'price' => $product->get_sale_price() ) );
                $percentage = round( ( ( $regulare_price -  $sale_price ) / $regulare_price ) * 100 );
                if($percentage) {
                    ?>
                    <span class="price-new"><?php echo $sale_price; echo get_woocommerce_currency_symbol(); ?></span>
                    <span class="price-old"><?php echo wc_get_price_to_display( $product, array( 'price' => $product->get_regular_price()) ); echo get_woocommerce_currency_symbol(); ?></span>
                <?php } else { ?>
                    <span class="price"><?php echo $sale_price; echo get_woocommerce_currency_symbol(); ?></span>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
</div>