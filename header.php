<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AutoParts
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <?php global $autopars; ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	 <?php if($autopars['favicon']['url']) { ?>
    <link rel="shortcut icon" type="image/png" href="<?php echo $autopars['favicon']['url']; ?>"/>
     <?php } ?>
	<?php wp_head(); ?>
</head>
<body class="common-home res layout-3">
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog main-modal">
        <div class="modal-content">
        </div>
    </div>
</div>
<div id="wrapper" class="wrapper-fluid banners-effect-1">
    <!-- Header Container  -->
    <header id="header" class=" typeheader-3">
        <!-- Header Top -->
        <div class="header-top hidden-compact">
            <div class="container">
                <div class="row">
                    <div class="header-top-left col-lg-3 col-md-4 col-sm-5 hidden-xs">
                        <?php if($autopars['seti-on']) { ?>
                        <div class="telephone " >
                            <ul class="socials">
                                <?php if($autopars['fb']) { ?>
                                <li class="facebook"><a href="<?php echo $autopars['fb']; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <?php } ?>
                                <?php if($autopars['tw']) { ?>
                                <li class="twitter"><a href="<?php echo $autopars['tw']; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <?php } ?>
                                <?php if($autopars['ok']) { ?>
                                <li class="google_plus"><a href="<?php echo $autopars['ok']; ?>" target="_blank"><i class="fa fa-odnoklassniki"></i></a></li>
                                <?php } ?>
                                <?php if($autopars['vk']) { ?>
                                <li class="pinterest"><a href="<?php echo $autopars['vk']; ?>" target="_blank"><i class="fa fa-vk"></i></a></li>
                                <?php } ?>
                                <?php if($autopars['in']) { ?>
                                <li class="instagram"><a href="<?php echo $autopars['in']; ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="header-top-center col-lg-9 col-md-8 col-sm-7 col-xs-12">
                      <?php
                     if ( class_exists( 'WooCommerce' ) ) {
                           if(!$autopars['catalog-on']) {
                         ?>
                        <ul class="top-link list-inline lang-curr">
                            <li class="language">
                                <div class="btn-group languages-block ">
                                    <form action="index.html" method="post" enctype="multipart/form-data" id="bt-language">
                                        <a class="btn btn-link dropdown-toggle" data-toggle="dropdown">
                                            <span class="eng"><?php if($autopars['myaccount']) { echo $autopars['myaccount']; } ?></span>
                                            <span class="fa fa-angle-down"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="<?php echo home_url(); ?>/my-account">Мой аккаунт</a></li>
                                            <li> <a href="<?php echo home_url(); ?>/cart">Корзина</a></li>
                                                   <?php
                                                  if( class_exists( 'YITH_WCWL' ) ) { ?>
                                            <li> <a href="<?php echo home_url(); ?>/wishlist">Закладки</a></li>
                                            <?php } ?>
                                             <?php
                                             if( class_exists( 'YITH_WOOCOMPARE' )) { ?>
                                              <li> <a href="<?php echo home_url(); ?>/yith-compare">Сравнения</a></li>
                                                 <?php } ?>
                                        </ul>
                                    </form>
                                </div>
                            </li>
                        </ul>
                        <?php } } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-middle hidden-compact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                        <?php if($autopars['logo']['url']) { ?>
                        <div class="logo">
                            <a href="<?php echo home_url(); ?>"><img src="<?php echo $autopars['logo']['url']; ?>" title="<?php echo bloginfo('name'); ?>" alt="<?php echo bloginfo('name'); ?>" /></a>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 middle-right">
                    <?php
                     if ( class_exists( 'WooCommerce' ) ) {
                         if($autopars['search-on']) {
                     get_product_search_form();
                     }
                     if(!$autopars['catalog-on']) {
                     ?>
                        <div class="shopping_cart">
                            <div id="cart" class="btn-shopping-cart">
                                <a href="javascript:void(0)" data-loading-text="Loading... " class="btn-group top_cart dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <div class="shopcart">
                                        <span class="icon-c">
                                            <i class="fa fa-shopping-basket"></i>
                                        </span>
                                        <div class="shopcart-inner">
                                            <p class="text-shopping-cart">
                                               Корзина
                                            </p>
                                            <span class="total-shopping-cart cart-total-full">
                                            <span class="items_cart"><?php echo WC()->cart->get_cart_contents_count(); ?></span><span class="items_cart2"> Товар </span><span class="items_carts"><?php echo WC()->cart->get_cart_subtotal(); ?></span>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                                   <?php woocommerce_mini_cart(); ?>
                            </div>
                        </div>
                         <?php
                         if( class_exists( 'YITH_WCWL' ) ) { ?>
                        <div class="wishlist hidden-md hidden-sm hidden-xs"><a href="<?php echo home_url() ?>/wishlist" id="wishlist-total" class="top-link-wishlist" title="Закладки (<?php echo YITH_WCWL()->count_products(); ?>) "><i class="fa fa-heart"></i></a>
                        </div>
                        <?php } } } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom hidden-compact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        <?php if($autopars['cat-on']) { ?>
                        <div class="menu-vertical-w">
                            <div class="responsive so-megamenu megamenu-style-dev ">
                                <div class="so-vertical-menu ">
                                    <nav class="navbar-default">
                                        <div class="container-megamenu vertical">
                                            <div id="menuHeading">
                                                <div class="megamenuToogle-wrapper">
                                                    <div class="megamenuToogle-pattern">
                                                        <div class="container">
                                                            <div>
                                                                <span></span>
                                                                <span></span>
                                                                <span></span>
                                                            </div>
                                                            <?php if($autopars['menu-categ']) { echo $autopars['menu-categ']; } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="navbar-header">
                                                <button type="button" id="show-verticalmenu" data-toggle="collapse" class="navbar-toggle">
                                                    <i class="fa fa-bars"></i>
                                                    <span><?php if($autopars['menu-categ-mob']) { echo $autopars['menu-categ-mob']; } ?></span>
                                                </button>
                                            </div>
                                            <div class="vertical-wrapper" >
                                                <span id="remove-verticalmenu" class="fa fa-times"></span>
                                                <div class="megamenu-pattern">
                                                    <?php
                                                    if( has_nav_menu('menu-cat') ) {
                                                        AutoParts_menu_category();
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-6 col-xs-6">
                        <div class="main-menu-w">
                            <div class="responsive so-megamenu megamenu-style-dev">
                                <nav class="navbar-default">
                                    <div class=" container-megamenu  horizontal open ">
                                        <div class="navbar-header">
                                            <button type="button" id="show-megamenu" data-toggle="collapse" class="navbar-toggle">
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                            </button>
                                        </div>
                                        <div class="megamenu-wrapper">
                                            <span id="remove-megamenu" class="fa fa-times"></span>
                                            <div class="megamenu-pattern">
                                                <?php
                                                if( has_nav_menu('menu-primary') ) {
                                                    AutoParts_menu_primary();
                                                }
                                                ?>
                                        </div>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- //Header Container  -->
<?php
if(is_front_page()) { ?>
    <div class="main-container">
        <div id="content">
		<ul style="margin-top: 0px;" class="">
			<li style="color: #fff"><a style="color: #fff" href="#">About Us</a></li>
		</ul>
<?php }
?>