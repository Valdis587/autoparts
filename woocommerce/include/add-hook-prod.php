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

add_action('woocommerce_before_single_product_summary', 'autoparts_show_product_images', 20);
function autoparts_show_product_images() { ?>
    <div class="content-product-left class-honizol col-md-5 col-sm-12 col-xs-12">
        <div class="large-image">
            <?php
            global $product;
            $attachment_ids = $product->get_gallery_image_ids();
            $main=$product->get_image_id();
            $thumbs=wp_get_attachment_image_src($main, 'product-single'); ?>
            <img itemprop="image" class="product-image-zoom" src="<?php echo $thumbs['0']; ?>"  title="<?php the_title(''); ?>" alt="<?php the_title(''); ?>">
        </div>
        <?php if(get_post_meta( get_the_ID(), 'my_meta_key_youtube', true )) { ?>
        <a class="thumb-video pull-left" href="<?php echo get_post_meta( get_the_ID(), 'my_meta_key_youtube', true ); ?>"><i class="fa fa-youtube-play"></i></a>
    <?php } ?>
        <div id="thumb-slider" class="yt-content-slider full_slider owl-drag" data-rtl="yes" data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="10" data-items_column00="4" data-items_column0="4" data-items_column1="3" data-items_column2="4"  data-items_column3="1" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-loop="no" data-hoverpause="yes">
    <?php
    if($attachment_ids) {
        $item=0;
        foreach ( $attachment_ids as $post)  {
            $item++;
                $image = wp_get_attachment_image_src($post, 'product-archive');  ?>
            <a data-index="<?php echo $item; ?>" class="img thumbnail " data-image="<?php echo $image['0']; ?>" title="<?php the_title(''); ?>">
                <img src="<?php echo $image['0']; ?>" width="<?php echo $image['1']; ?>" height="<?php echo $image['2']; ?>" title="<?php the_title(''); ?>" alt="<?php the_title(''); ?>">
            </a>
                <?php } }  ?>
        </div>
    </div>
<?php }

add_action('woocommerce_single_product_summary', 'autoparts_template_single_title', 5);
function autoparts_template_single_title() { ?>
    <div class="title-product">
        <h1 ><?php the_title(''); ?></h1>
    </div>
<?php }

add_action('woocommerce_single_product_summary', 'autoparts_template_single_rating', 10);
function autoparts_template_single_rating() { ?>
    <!-- Review ---->
                            <div class="box-review form-group">
                                <div  class="ratings">
                                    <div style="font-size: 12px; margin-top: -10px" class="rating-box">
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
                                </div>
                                <?php $review_count = $product->get_review_count(); ?>
                                <a  class="reviews_button" href="" ><?php printf( _n( '%s customer review', '%s customer reviews', $review_count, 'woocommerce' ), '' . esc_html( $review_count ) . '' ); ?></a>
                            </div>
<?php }
add_action('woocommerce_single_product_summary', 'autoparts_template_single_price', 15);
function autoparts_template_single_price() { ?>
    <div class="product-label form-group">
        <div class="product_page_price price" itemprop="offerDetails" itemscope="" >
            <?php
            global $product;
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
<?php }

add_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 20);

add_action('woocommerce_single_product_summary', 'autoparts_template_single_add_to_cart_open', 25);
function autoparts_template_single_add_to_cart_open() { ?>
    <div id="product">
<?php }
add_action('woocommerce_single_product_summary', 'autoparts_template_single_add_to_cart_close', 35);
function autoparts_template_single_add_to_cart_close() { ?>
    </div>
<?php }

add_action('woocommerce_single_product_summary', 'autoparts_template_single_catalog', 33);
function autoparts_template_single_catalog() {
    global $autopars;
    if($autopars['catalog-on']) {
    ?>
    <div class="form-group box-info-product">
    <div class="cart">
        <button type="submit" data-toggle="modal" data-target="#myModal" data-product-id="<?php echo get_the_ID() ?>" id="button-cart" class="btn btn-mega btn-lg">Заказать</button>
    </div>
    </div>
<?php } }

add_action('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display', 20);