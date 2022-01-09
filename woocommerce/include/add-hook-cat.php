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
add_action('woocommerce_before_main_content', 'autoparts_output_content_wrapper', 10);
function autoparts_output_content_wrapper() { ?>
    <div class="main-container container">
<?php }

add_action('woocommerce_sidebar', 'autoparts_output_content_wrapper_end', 10);
function autoparts_output_content_wrapper_end() { ?>
    </div>
<?php }

add_action('woocommerce_before_main_content', 'woocommerce_breadcrumb2', 15);

add_action('woocommerce_before_main_content', 'autoparts_output_content_row', 20);
function autoparts_output_content_row() { ?>
    <div class="row">
<?php }
add_action('woocommerce_sidebar', 'autoparts_output_content_row_end', 8);
function autoparts_output_content_row_end() { ?>
    </div>
<?php }

add_action('woocommerce_before_main_content', 'autoparts_sidebar', 22);
function autoparts_sidebar() {
    if ( ! is_active_sidebar( 'shop-sidebar-autoparts' ) ) {
        return;
    } ?>
    <aside class="col-sm-4 col-md-3 content-aside" id="column-left">
 <?php  dynamic_sidebar( 'shop-sidebar-autoparts' );
    ?>
    </aside>
<?php }

add_action('woocommerce_archive_description', 'autoparts_content', 5);
function autoparts_content() { ?>
    <div id="content" class="col-md-9 col-sm-8">
        <div class="products-category">
            <h3 class="title-category "><?php wp_title(''); ?></h3>
<?php }

add_action('woocommerce_after_main_content', 'autoparts_content_end', 10);
function autoparts_content_end() { ?>
    </div>
    </div>
    <!--end content-->
<?php }

add_action('woocommerce_archive_description', 'autoparts_product_banner', 10);
function autoparts_product_banner() {
    global $autopars;
    if($autopars['banner-on']) { ?>
    <div class="category-desc">
        <div class="row">
            <div class="col-sm-12">
                <div class="banners">
                   <?php if($autopars['banner']['url']) { ?>
                    <div>
                        <a  href="<?php if($autopars['banner-link']) { echo $autopars['banner-link']; } ?>"><img src="<?php echo $autopars['banner']['url']; ?>" alt="<?php wp_title(''); ?>"><br></a>
                    </div>
            <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php } }

add_action('woocommerce_before_shop_loop', 'autoparts_product_filter_top', 5);
function autoparts_product_filter_top() { ?>
    <!-- Filters -->
    <div class="product-filter product-filter-top filters-panel">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12 view-mode">
                <div class="list-view">
                    <button class="btn btn-default grid active" data-view="grid" data-toggle="tooltip"  data-original-title="Grid"><i class="fa fa-th"></i></button>
                    <button class="btn btn-default list" data-view="list" data-toggle="tooltip" data-original-title="List"><i class="fa fa-th-list"></i></button>
                </div>
            </div>
<?php }

add_action('woocommerce_before_shop_loop', 'autoparts_product_filter_top_end', 32);
function autoparts_product_filter_top_end() { ?>
    </div>
    </div>
<?php }

add_action('woocommerce_before_shop_loop_item_title', 'autoparts_template_loop_product_thumbnail', 10);
function autoparts_template_loop_product_thumbnail() { ?>
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
    </div>
<?php }

add_action('woocommerce_shop_loop_item_title', 'autoparts_template_loop_product_right', 10);
function autoparts_template_loop_product_right() { ?>
    <div  class="right-block">
        <div class="button-group cartinfo--static">
           <!-- <button type="button" class="wishlist btn-button" title="Add to Wish List" onclick="wishlist.add('60');"><i class="fa fa-heart"></i></button>-->
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
    <div style="font-size: 10px;  height: 10px; margin-bottom: 10px" class="main-rating">
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
        <div class="description item-desc hidden">
            <p><?php do_excerpt(get_the_excerpt(), 15); ?></p>
        </div>
        <div style="width: 500px" class="list-block  hidden">
            <?php
            global $product;
    if(!$autopars['catalog-on']) {
            $args=array();
            echo apply_filters(
                'woocommerce_loop_add_to_cart_link', // WPCS: XSS ok.
                sprintf(
                    '<a href="%s" data-quantity="%s" class="%s" %s><i class="fa fa-shopping-basket"></i></a>',
                    esc_url( $product->add_to_cart_url() ),
                    esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
                    esc_attr( isset( $args['class'] ) ? $args['class'] : 'button addToCart btn-button' ),
                    isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
                    esc_html( $product->add_to_cart_text() )
                ),
                $product,
                $args
            );
    } else { ?>
        <a href="<?php the_permalink(); ?>" class="button addToCart btn-button"><i class="fa fa-sign-in"></i></a>
    <?php  }
            if( class_exists( 'YITH_WCWL' ) ) {
                echo do_shortcode("[yith_wcwl_add_to_wishlist]");
            }
            if( class_exists( 'YITH_WOOCOMPARE' )) {?>
         <a class="compare btn-button" data-toggle="tooltip" type="button" title="Добавить в сравнения" data-product_id="<?php echo get_the_ID() ?>"><i class="fa fa-refresh"></i>
             <?php } ?>
    <?php global $autopars; if($autopars['quick-on']) { ?>
            <!--quickview-->
            <a style="display: inline-block" class=" btn-button quickview quickview_handler visible-lg" id="IdModals" data-toggle="modal" data-target="#myModal" data-product-id="<?php echo get_the_ID() ?>" href="#myModal"><i class="fa fa-eye"></i></a>
            <!--end quickview-->
        <?php } ?>
        </div>
    </div>
<?php }

add_action('woocommerce_after_shop_loop', 'autoparts_pagination', 10);
function autoparts_pagination() { ?>
    <div class="text-center">
        <?php  wp_main_pagination(); ?>
    </div>
<?php }



