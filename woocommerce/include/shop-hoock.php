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
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'theme_output_content_wrapper', 10);
function theme_output_content_wrapper() { ?>
    <div class="shop container">
   
<?php }

add_action('woocommerce_after_main_content', 'theme_output_content_wrapper_end', 10);
function theme_output_content_wrapper_end() { ?>

</div>
<!-- end shop -->
<?php }

// breadcrumbs //
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

add_action('woocommerce_before_main_content', 'theme_head_panel', 5);

function theme_head_panel() { 
    global $themesetting;
    ?>
    <section class="topPanel">
   <div class="topPanel__img">
    <?php if($themesetting['headimg']) { ?>
    <img src="<?php echo $themesetting['headimg']['url']; ?>" alt="<?php bloginfo('name'); ?>">
    <?php } ?>
   </div> 
   <div class="topPanel__content">
    <h2 class="topPanel__title"><?php wp_title(''); ?></h2>
<? }

add_action('woocommerce_before_main_content', 'theme_head_panel_end', 8);

function theme_head_panel_end() { ?>
    </div>
</section>
<?php }

add_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 6);

//sidebar //

remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

add_action('woocommerce_archive_description', 'theme_shop_row', 4);
function theme_shop_row() { ?>
    <div class="row-theme">
<?php }

add_action('woocommerce_after_shop_loop', 'theme_shop_row_end', 12);
function theme_shop_row_end() { ?>
</div>
<!-- end shop row -->
<?php }

add_action('woocommerce_archive_description', 'theme_get_sidebar', 6);

function theme_get_sidebar() {
    if ( ! is_active_sidebar( 'sidebar-shop' ) ) {
        return;
    }?>
<aside id="secondary" class="sidebar-theme shop__sidebar sidebar">
	<?php dynamic_sidebar( 'sidebar-shop' ); ?>
</aside><!-- #secondary -->
<?php }

//decription //
remove_action('woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10);
remove_action('woocommerce_archive_description', 'woocommerce_product_archive_description', 10);

//content //

add_action('woocommerce_archive_description', 'theme_shop_content__wrapper', 10);
function theme_shop_content__wrapper() { ?>
<div class="content-theme shop__content-wrapper">
<?php }

add_action('woocommerce_no_products_found', 'theme_shop_content__wrapper_end', 11);
function theme_shop_content__wrapper_end() { ?>
</div>
<!--content-theme-end -->
<?php }

add_action('woocommerce_archive_description', 'theme_category_carousel', 12);

function theme_category_carousel() { 
    global $themesetting;
    if($themesetting['carusel-cat-on']) {
    ?>
    <div class="shop__category-carusel">
            <ul class="shop__carusel-list owl-carousel">
                <?php 
                   $terms = get_terms( array(
                    'taxonomy' => 'product_cat',
                    'hide_empty' => true,
                    'pad_counts'=> true,
                    'orderby' => 'name',
                    'parent' => 0
                ) );
                if($terms) {
                    foreach($terms as $term) {
                ?>
                <li class="shop__cat-item">
                    <div class="shop__carusel-img">
                        <?php 
                        $thumbnail_id =get_term_meta($term->term_id, 'thumbnail_id', true );
                        $image = wp_get_attachment_url( $thumbnail_id);
                        ?>
                        <a href="<?php echo get_category_link($term->term_id);?>">
                        <img src="<?php echo $image; ?>" alt="<?php echo $term->name;?>">
                        </a>
                    </div>
                    <div class="shop__carusel-cat-name">
                        <a href="<?php echo get_category_link($term->term_id);?>"><?php echo $term->name;?></a>
                    </div>
                </li>
                <?php } } ?>
            </ul>
    </div>
<?php } }

//filter //
remove_action('woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10);
add_action('woocommerce_before_shop_loop', 'theme_filter_wrapper', 5);

function theme_filter_wrapper() { ?>
<div class="shop__filter_wrapper">
    <div class="shop__filter_button">
        <button class="shop__filter-grid"><i class="icon-th"></i></button>
        <button class="shop__filter-list"><i class="icon-th-list"></i></button>
    </div>
<?php }

add_action('woocommerce_before_shop_loop', 'theme_filter_wrapper_end', 32);

function theme_filter_wrapper_end() { ?>
</div>
<?php }

//loop//

add_action('woocommerce_before_shop_loop', 'theme_loop_wrapper', 35);
function theme_loop_wrapper() { ?>
    <div class="shop__loop-wrapper">
<?php }

add_action('woocommerce_after_shop_loop', 'theme_loop_wrapper_end', 5);
function theme_loop_wrapper_end() { ?>
</div>
<!--loop_wrapper_end -->
<?php }

//pagination //

remove_action('woocommerce_after_shop_loop', 'woocommerce_pagination', 10);
add_action('woocommerce_after_shop_loop', 'theme_pagination', 10);

function theme_pagination() {
    wp_main_pagination();
}

//popup //


add_action('wp_footer', 'pop_quick');
function pop_quick() {
    global $themesetting;
    if($themesetting['quick-on']) {
    ?>
    <div id="quick-modal" class="themeModal">
        <div class="themeModal__body">
        <div class="themeModal__header">
            <button class="modal-close"><i class="icon-plus"></i></button>
                </div>
                    <div class="shop">
                        <div class="shop__pop-content single-product">
                        </div>
                    </div>
        </div>
    </div>
    <?php }
 }

 // notice //
remove_action('woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10);
remove_action('woocommerce_before_single_product', 'woocommerce_output_all_notices', 10);
//add_action('woocommerce_before_main_content', 'woocommerce_output_all_notices', 23);

remove_action('woocommerce_before_single_product', 'woocommerce_output_all_notices', 10);

// end notice //





