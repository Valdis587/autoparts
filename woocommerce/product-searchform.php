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
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<form role="search" method="get" class="woocommerce-product-search header__form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
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
        'class' => 'header__select',
        'echo' => 1,
        'value_field' => 'slug',
        'selected' => $optsetlect
    );
    $args['taxonomy'] = 'product_cat';
    $args['name'] = 'product_cat';
    $args['class'] = 'header__select';

    wp_dropdown_categories($args);
    ?>
<input type="search" id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>" class="search-field header__input" placeholder="" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit"  class="header__search-button"><i class="icon-search"></i></button>
	<input type="hidden" name="post_type" value="product" />
</form>
