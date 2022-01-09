<?php
/**
 * The template for displaying product search form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/product-searchform.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="search-header-w">
    <div class="icon-search hidden-lg hidden-md"><i class="fa fa-search"></i></div>
    <div id="sosearchpro" class="sosearchpro-wrapper so-search ">
        <form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <div id="search0" class="search input-group form-group">
                <div class="select_category filter_type  icon-select hidden-sm hidden-xs">
                    <?php
                    if(isset($_REQUEST['product_cat']) && !empty($_REQUEST['product_cat']))	{
                        $optsetlect=$_REQUEST['product_cat'];
                    } else {
                        $optsetlect=0;
                    }

                    $args = array(
                        'show_option_all' => esc_html__( 'Все категории', 'woocommerce' ),
                        'hierarchical' => 1,
                        'depth' => 2,
                        'class' => 'cat',
                        'echo' => 1,
                        'value_field' => 'slug',
                        'selected' => $optsetlect
                    );
                    $args['taxonomy'] = 'product_cat';
                    $args['name'] = 'product_cat';
                    $args['class'] = 'no-border';

                    wp_dropdown_categories($args);
                    ?>
                </div>
                <input class="autosearch-input form-control" type="text" value="" size="50" autocomplete="off" placeholder="<?php echo esc_attr__( 'Search products&hellip;', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>" >
                <button type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'woocommerce' ); ?>" class="button-search btn btn-primary" name="submit_search"><i class="fa fa-search"></i></button>
            </div>
            <input type="hidden" name="post_type" value="product" />
        </form>
    </div>
</div>
