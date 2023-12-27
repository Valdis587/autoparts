<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sborka
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); 
	global $themesetting;
	?>
</head>
<div class="site-wrapper" >
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="header ">
    <div class="header__top-line">
        <div class="header__top-content container">
            <div class="header__top-icons">
			<?php get_template_part( 'template-parts/content', 'social' ); ?>
            </div>
            <div class="header__top-contacts">
                <ul class="header__top-contacts-list">
				<?php if($themesetting['phones']) { ?>
                    <li><i class="icon-phone-alt"></i><a href="tel:<?php echo str_replace(array("(", ")", "-", " "), "", $themesetting['phones']) ?>"><?php echo $themesetting['phones'] ?></a></li>
					<?php } ?>
            <?php if($themesetting['mail']) { ?>
                    <li><i class="icon-envelope"></i><a href="mailto:<?php echo $themesetting['mail'] ?>"><?php echo $themesetting['mail'] ?></a></li>
					<?php } ?>
                </ul>
            </div>
            <button aria-label="menu button" class="header__menu-button"><i class="icon-bars"></i></button>
        </div>
    </div>
    <div class="header__center-line container">
        <div class="header__logo">
		<?php get_template_part( 'template-parts/content', 'logo' ); ?>
        </div>
        <div class="header__search-box">
		<?php if ( class_exists( 'WooCommerce' ) ) { get_product_search_form(); }  ?>
        </div>
        <div class="header__icon-box">
		<?php if ( class_exists( 'WooCommerce' ) ) { ?>
            <ul class="header__cart-list">
			<?php if( class_exists( 'YITH_WCWL' ) ) { ?>
                <li><a href="<?php echo home_url(); ?>/wishlist"><i class="icon-heart"></i></a></li>
				<?php } ?>
                <li class="header__minicart"><a href="javascript:void(0);" class="header__minicart-link"><i class="icon-shopping-cart"></i></a> </li>
                <li><span class="header__mycart">Корзина<span class="header__price"><?php echo WC()->cart->get_cart_subtotal(); ?></span></span></li>
            </ul>
			<?php if( class_exists( 'YITH_WCWL' ) ) { ?>
            <span class="header__num-white"><?php echo YITH_WCWL()->count_products(); ?></span>
			<?php } ?>
            <span class="header__num-cart"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
			<?php } ?>
			<?php if ( class_exists( 'WooCommerce' ) ) { woocommerce_mini_cart(); }  ?>
        </div>
    </div>
    <div class="header__menu-line">
        <div class="header__menu-content container">
            <div class="header__menu-category-box">
			<?php if( has_nav_menu('category-menu') ) { ?>
                <a class="header__menu-category-link" href="javascript:void(0);"><span class="header__menu-category-title">Категории<i class="icon-bars"></i></span></a>
                <nav class="header__menu-category">
                    <button aria-label="menu category close" class="header__category-close"><i class="icon-plus"></i></button>
					<?php theme_menu_category(); ?>
                </nav>
				<?php } ?>
            </div>
            <div class="header__menu-primary-box">
			<?php if( has_nav_menu('primary-menu') ) { ?>
                <nav class="header__menu-primary">
                    <button aria-label="menu primary close" class="header__primary-close"><i class="icon-plus"></i></button>
					<?php theme_menu_primary(); ?>
                </nav>
				<?php } ?>
            </div>
        </div>
    </div>
</header>
<div class="page-wrapper">