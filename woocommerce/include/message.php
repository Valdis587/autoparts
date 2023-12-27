<?php
/**
 * woo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package woo
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}



add_action( 'wp_ajax_messages_action', 'theme_popup_messages_callback' );
add_action( 'wp_ajax_nopriv_messages_action', 'theme_popup_messages_callback' );
function theme_popup_messages_callback() {
    if (!wp_verify_nonce($_POST['nonce'], 'messages_nonce')) {
        wp_die('Данные отправлены с левого адреса');
    }

$product_id = (int) $_POST['id'];

$params = array('p' => $product_id,
    'post_type' => array('product','product_variation'));

$query = new WP_Query($params);
if($query->have_posts()){
while ($query->have_posts()){
$query->the_post();
global $product;
    $main=$product->get_image_id();
    $thumbs=wp_get_attachment_image_src($main, 'product-single');
?>
<div class="messages">
   <h2 class="messages__title"> Добавлен в корзину:</h2>
    <div class="messages__box">
      <div class="messages__img">
    <img src="<?php echo $thumbs['0']; ?>" alt="<?php the_title(''); ?>">
    </div>
      <div class="messages__content">
    <h3><a href="<?php the_permalink(); ?>"><?php the_title(''); ?></a></h3>  
     <a class="messages__button" href="<?php echo wc_get_cart_url();?>"><i class="icon-shopping-cart"></i>В корзину</a></p>
    </div>
    </div>
</div>
<?php }
    $data['product'] = ob_get_clean();
    wp_send_json($data);
    wp_die();
} }

add_action( 'wp_ajax_addwishlist_action', 'theme_popup_addwishlist_callback' );
add_action( 'wp_ajax_nopriv_addwishlist_action', 'theme_popup_addwishlist_callback' );
function theme_popup_addwishlist_callback() {
    if (!wp_verify_nonce($_POST['nonce'], 'addwishlist_nonce')) {
        wp_die('Данные отправлены с левого адреса');
    }

$product_id = (int) $_POST['id'];

$params = array('p' => $product_id,
    'post_type' => array('product','product_variation'));

$query = new WP_Query($params);
if($query->have_posts()){
while ($query->have_posts()){
$query->the_post();
global $product;
    $main=$product->get_image_id();
    $thumbs=wp_get_attachment_image_src($main, 'product-single');
?>
<div class="messages">
   <h2 class="messages__title"> Добавлен в избранные:</h2>
    <div class="messages__box">
      <div class="messages__img">
    <img src="<?php echo $thumbs['0']; ?>" alt="<?php the_title(''); ?>">
    </div>
      <div class="messages__content">
    <h3><a href="<?php the_permalink(); ?>"><?php the_title(''); ?></a></h3>  
     <a class="messages__button" href="<?php echo home_url(); ?>/wishlist">Список желаний</a></p>
    </div>
    </div>
</div>
<?php }
    $data['product'] = ob_get_clean();
    wp_send_json($data);
    wp_die();
} }








