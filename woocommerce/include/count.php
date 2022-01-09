<?php
/**
 * Market functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Market
 */

if ( ! defined( '_S_VERSION' ) ) {
    // Replace the version number of the theme on each release.
    define( '_S_VERSION', '1.0.0' );
}

add_action( 'wp_ajax_action_count', 'autoparts_count_callback' );
add_action( 'wp_ajax_nopriv_action_count', 'autoparts_count_callback' );
function autoparts_count_callback() {

    if (!wp_verify_nonce($_POST['nonce'], 'count_nonce')) {
        wp_die('Данные отправлены с левого адреса');
    }
    $product = wc_get_product($_POST['id']);
    //print_r($product);
    ob_start();
    $day=get_post_meta( $product->get_id(), 'my_meta_key', true );
    $mon=get_post_meta( $product->get_id(), 'my_meta_key2', true );
    $year=get_post_meta( $product->get_id(), 'my_meta_key3', true );
    ?>
    <script>
        jQuery('.defaultCountdown-<?php echo $product->get_id(); ?>').each(function(){

            var austDay = new Date(<?php echo get_post_meta( $product->get_id(), 'my_meta_key3', true ); ?>, <?php echo get_post_meta( $product->get_id(), 'my_meta_key2', true ); ?> - 1, <?php echo get_post_meta( $product->get_id(), 'my_meta_key', true ); ?>);
            jQuery('.defaultCountdown-<?php echo $product->get_id(); ?>').countdown(austDay, function (event) {
                var $this = $(this).html(event.strftime(''
                    + '<div class="time-item time-day"><div class="num-time">%D</div><div class="name-time">Day </div></div>'
                    + '<div class="time-item time-hour"><div class="num-time">%H</div><div class="name-time">Hour </div></div>'
                    + '<div class="time-item time-min"><div class="num-time">%M</div><div class="name-time">Min </div></div>'
                    + '<div class="time-item time-sec"><div class="num-time">%S</div><div class="name-time">Sec </div></div>'));

            });
        });
    </script>
    <?php
    $data['product'] = ob_get_clean();
    wp_send_json($data);
    wp_die();
}