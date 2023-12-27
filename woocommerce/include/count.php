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

add_action( 'wp_ajax_action_count', 'theme_count_callback' );
add_action( 'wp_ajax_nopriv_action_count', 'theme_count_callback' );
function theme_count_callback() {

    if (!wp_verify_nonce($_POST['nonce'], 'count_nonce')) {
        wp_die('Данные отправлены с левого адреса');
    }
    global $themesetting;
    $product = wc_get_product($_POST['id']);
    ob_start();

    $product_id = (int) $_POST['id'];
    $day =  (int) $_POST['days'];
    $mon = (int) $_POST['mons'];
    $year = (int) $_POST['years'];
    $params = array('p' => $product_id,
        'post_type' => array('product','product_variation'));

    $query = new WP_Query($params);
    if($query->have_posts()){
        while ($query->have_posts()){
            $query->the_post();
            global $product;
    ?>
    <script>
        jQuery('.defaultCountdown-<?php echo $product->get_id(); ?>').each(function(){
            var austDay = new Date(<?php echo $year; ?> , <?php echo $mon; ?> - 1, <?php echo $day; ?>);
            jQuery('.defaultCountdown-<?php echo $product->get_id(); ?>').countdown(austDay, function (event) {
                var $this = $(this).html(event.strftime(''
                    + '<div class="time-item time-day"><div class="num-time">%D</div><div class="name-time">Дн. </div></div>'
                    + '<div class="time-item time-hour"><div class="num-time">%H</div><div class="name-time">Чс. </div></div>'
                    + '<div class="time-item time-min"><div class="num-time">%M</div><div class="name-time">Мин. </div></div>'
                    + '<div class="time-item time-sec"><div class="num-time">%S</div><div class="name-time">Сек. </div></div>'));

            });
        });
    </script>
    <?php }
    $data['product'] = ob_get_clean();
    wp_send_json($data);
    wp_die();
} }