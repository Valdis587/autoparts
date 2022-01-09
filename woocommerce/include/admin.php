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

## Добавляем блоки в основную колонку на страницах постов и пост. страниц
add_action('add_meta_boxes', 'myplugin_add_custom_box');
function myplugin_add_custom_box(){
    // $screens = array('product', 'normal', 'high');
    add_meta_box( 'myplugin_sectionid', 'Бейджики', 'myplugin_meta_box_callback', 'product', 'normal', 'high');
}

// HTML код блока
function myplugin_meta_box_callback( $post, $meta ){
    $screens = $meta['args'];

    // Используем nonce для верификации
    wp_nonce_field( plugin_basename(__FILE__), 'myplugin_noncename' );

    // значение поля
    $prfx_stored_meta = get_post_meta( $post->ID ); ?>

    <label for="myplugin_new_field"><?php echo esc_html__( 'Новый продукт', 'flipmarts' ); ?></label>
    <input type="checkbox"  id="new_badge" name="new_badge" value="no" size="25" <?php if ( isset ( $prfx_stored_meta['new_badge'] ) ) checked( $prfx_stored_meta['new_badge'][0], 'yes' ); ?> />

    <label for="myplugin_new_field"><?php echo esc_html__( 'Хит продаж', 'flipmarts' ); ?></label>
    <input type="checkbox"  id="hit_badge" name="hit_badge" value="no" size="25" <?php if ( isset ( $prfx_stored_meta['hit_badge'] ) ) checked( $prfx_stored_meta['hit_badge'][0], 'yes' ); ?> />
<?php }

function prfx_meta_save( $post_id ) {

    // Checks save status - overcome autosave, etc.
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'prfx_nonce' ] ) && wp_verify_nonce( $_POST[ 'prfx_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

// Checks for input and saves - save checked as yes and unchecked at no
    if( isset( $_POST[ 'new_badge' ] ) ) {
        update_post_meta( $post_id, 'new_badge', 'yes' );
    } else {
        update_post_meta( $post_id, 'new_badge', 'no' );
    }

    if( isset( $_POST[ 'hit_badge' ] ) ) {
        update_post_meta( $post_id, 'hit_badge', 'yes' );
    } else {
        update_post_meta( $post_id, 'hit_badge', 'no' );
    }

}
add_action( 'save_post', 'prfx_meta_save' );





add_action('add_meta_boxes', 'data_add_youtube_custom_box');
function data_add_youtube_custom_box(){
    // $screens = array( 'post', 'product' );
    add_meta_box( 'myplugin_sectionid_youtube', 'Ссылка на видео о товаре', 'data_meta_box_youtube_callback', 'product', 'normal', 'high' );
}

// HTML код блока
function data_meta_box_youtube_callback( $post, $meta ){
    $screens = $meta['args'];

    // Используем nonce для верификации
    wp_nonce_field( plugin_basename(__FILE__), 'myplugin_noncename' );

    // значение поля
    $value = get_post_meta( $post->ID, 'my_meta_key_youtube', 1 );


    // Поля формы для введения данных
    echo '<label for="youtube">' . __(" Видео ", 'myplugin_textdomain' ) . '</label> ';
    echo '<input type="text" id="youtube" name="youtube" value="'. $value .'" size="85" />';
}

## Сохраняем данные, когда пост сохраняется
add_action( 'save_post', 'data_save_postdata_youtube' );
function data_save_postdata_youtube( $post_id ) {
    // Убедимся что поле установлено.
    if ( ! isset( $_POST['youtube'] ) )
        return;

    // проверяем nonce нашей страницы, потому что save_post может быть вызван с другого места.
    if ( ! wp_verify_nonce( $_POST['myplugin_noncename'], plugin_basename(__FILE__) ) )
        return;

    // если это автосохранение ничего не делаем
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
        return;

    // проверяем права юзера
    if( ! current_user_can( 'edit_post', $post_id ) )
        return;

    // Все ОК. Теперь, нужно найти и сохранить данные
    // Очищаем значение поля input.
    $my_data = sanitize_text_field( $_POST['youtube'] );


    // Обновляем данные в базе данных.
    update_post_meta( $post_id, 'my_meta_key_youtube', $my_data );

}




function autusin_cpwl_init(){
    if( class_exists( 'YITH_WCWL' ) ){
        update_option( 'yith_wcwl_after_add_to_wishlist_behaviour', 'add' );
        update_option( 'yith_wcwl_button_position', 'shortcode' );
    }
    if( class_exists( 'YITH_WOOCOMPARE' ) ){
        update_option( 'yith_woocompare_compare_button_in_product_page', 'no' );
        update_option( 'yith_woocompare_compare_button_in_products_list', 'no' );
    }
}
add_action('admin_init','autusin_cpwl_init');

add_filter( 'woocommerce_product_add_to_cart_text', 'product_cat_add_to_cart_button_text', 20, 1 );
function product_cat_add_to_cart_button_text( $text ) {
    // Only for a specific product category

    $text = __('Add to cart', 'woocommerce');

    return $text;
}



## Добавляем блоки в основную колонку на страницах постов и пост. страниц
add_action('add_meta_boxes', 'data_add_custom_box');
function data_add_custom_box(){
    // $screens = array( 'post', 'product' );
    add_meta_box( 'myplugin_sectionid2', 'Дата окончания акции', 'data_meta_box_callback', 'product', 'normal', 'high' );
}

// HTML код блока
function data_meta_box_callback( $post, $meta ){
    $screens = $meta['args'];

    // Используем nonce для верификации
    wp_nonce_field( plugin_basename(__FILE__), 'myplugin_noncename' );

    // значение поля
    $value = get_post_meta( $post->ID, 'my_meta_key', 1 );
    $value2 = get_post_meta( $post->ID, 'my_meta_key2', 1 );
    $value3 = get_post_meta( $post->ID, 'my_meta_key3', 1 );

    // Поля формы для введения данных
    echo '<label for="day">' . __(" День ", 'myplugin_textdomain' ) . '</label> ';
    echo '<input type="text" id="day" name="day" value="'. $value .'" size="25" />';

    echo '<label for="mon">' . __(" Месяц ", 'myplugin_textdomain' ) . '</label> ';
    echo '<input type="text" id="mon" name="mon" value="'. $value2 .'" size="25" />';

    echo '<label for="year">' . __(" Год ", 'myplugin_textdomain' ) . '</label> ';
    echo '<input type="text" id="year" name="year" value="'. $value3 .'" size="25" />';
}

## Сохраняем данные, когда пост сохраняется
add_action( 'save_post', 'data_save_postdata' );
function data_save_postdata( $post_id ) {
    // Убедимся что поле установлено.
    if ( ! isset( $_POST['day'] ) )
        return;
    if ( ! isset( $_POST['mon'] ) )
        return;
    if ( ! isset( $_POST['year'] ) )
        return;

    // проверяем nonce нашей страницы, потому что save_post может быть вызван с другого места.
    if ( ! wp_verify_nonce( $_POST['myplugin_noncename'], plugin_basename(__FILE__) ) )
        return;

    // если это автосохранение ничего не делаем
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
        return;

    // проверяем права юзера
    if( ! current_user_can( 'edit_post', $post_id ) )
        return;

    // Все ОК. Теперь, нужно найти и сохранить данные
    // Очищаем значение поля input.
    $my_data = sanitize_text_field( $_POST['day'] );
    $my_data2 = sanitize_text_field( $_POST['mon'] );
    $my_data3 = sanitize_text_field( $_POST['year'] );

    // Обновляем данные в базе данных.
    update_post_meta( $post_id, 'my_meta_key', $my_data );
    update_post_meta( $post_id, 'my_meta_key2', $my_data2 );
    update_post_meta( $post_id, 'my_meta_key3', $my_data3 );
}