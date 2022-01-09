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

add_action( 'wp_ajax_catalog_action', 'autoparts_popup_catalog_action_callback' );
add_action( 'wp_ajax_nopriv_catalog_action', 'autoparts_popup_catalog_action_callback' );
function autoparts_popup_catalog_action_callback() {
    if (!wp_verify_nonce($_POST['nonce'], 'catalog_nonce')) {
        wp_die('Данные отправлены с левого адреса');
    }
    $product = wc_get_product($_POST['id']);
    ob_start();
    ?>
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
    <div id="content" class="row ">
    <div class="product-view row">
        <div class="left-content-product">
            <div class="content-product-left class-honizol col-md-6 col-sm-12 col-xs-12">
                <?php
                $attachment_ids = $product->get_gallery_image_ids();
                $main=$product->get_image_id();
                $thumbs=wp_get_attachment_image_src($main, 'popup');
                ?>
                <div class="large-image main-modal ">
                    <img height="300" width="300" itemprop="image" class="product-image-zoom" src="<?php echo $thumbs['0']; ?>"  title="<?php the_title(''); ?>" alt="<?php the_title(''); ?>">
                </div>

            </div>
            <div class="content-product-right col-md-6 col-sm-12 col-xs-12 main-content-modal">
                <div class="title-product">
                    <h1><?php echo $product->get_name(); ?></h1>
                </div>
                <div class="box-review form-group">
                    <div class="ratings">
                        <div class="rating-box">
                            <?php
                            $rating_count = $product->get_rating_count();
                            $review_count = $product->get_review_count();
                            $average      = $product->get_average_rating();
                            if(wc_get_rating_html( $average, $rating_count )) {
                                echo wc_get_rating_html($average, $rating_count);
                            } else { ?>
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                            <?php }
                            ?>
                        </div></div>
                </div>
                <div class="product-label form-group">
                    <div class="product_page_price price" itemprop="offerDetails" itemscope="">
                        <?php
                        $regulare_price=wc_get_price_to_display( $product, array( 'price' => $product->get_regular_price()) );
                        $sale_price=wc_get_price_to_display( $product, array( 'price' => $product->get_sale_price() ) );
                        $percentage = round( ( ( $regulare_price -  $sale_price ) / $regulare_price ) * 100 );
                        if($percentage) {?>
                            <span class="price-new" itemprop="price"><?php  echo $sale_price; echo get_woocommerce_currency_symbol(); ?></span>
                            <span class="price-old"><?php echo wc_get_price_to_display( $product, array( 'price' => $product->get_regular_price()) ); echo get_woocommerce_currency_symbol(); ?></span>
                        <?php } else { ?>
                            <span class="price-new" itemprop="price"><?php  echo $sale_price; echo get_woocommerce_currency_symbol(); ?></span>
                        <?php } ?>
                    </div>
                </div>
                <?php  global $autopars; ?>
                <div class="description main-popform text-center">
                    <form action="<?php echo get_template_directory_uri() . '/catalog.php' ?>" method="post">
                        <div class="form-group zakaz-form" style="margin-top: 20px; margin-right: 10px">
                            <input  type="text" name="name" placeholder="Укажите имя" class="form-control">
                            <br>
                            <input  type="text" name="phone" placeholder="Укажите телефон" class="form-control">
                            <input size="5px" type="checkbox" name="sogl" placeholder="Укажите телефон" checked value="coding">
                            <label for="coding">Я даю согласие на обработку моих данных!</label>
                            <input type="hidden" name="product" value="<?php echo $product->get_name(); ?>" class="form-control">
                            <input type="hidden" name="mail" value="<?php if($autopars['mail-cat']) echo $autopars['mail-cat']; ?>" class="form-control">
                            <input type="hidden" name="url" value="<?php echo home_url(); ?>" class="form-control">
                            <br>
                            <input class="btn btn-success" type="submit" value="Отправить">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div style="margin-top: 10px" class="modal-footer">
        <div class="cart">
            <button type="button" class="btn btn-info" data-dismiss="modal">Закрыть</button>
        </div>
    </div>
    <?php
    $data['product'] = ob_get_clean();
    wp_send_json($data);
    wp_die();
}
