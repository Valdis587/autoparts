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

/**
 * Enqueue scripts and styles.
 */
function sborka_scripts() {
	global $themesetting;
	wp_enqueue_style('sborka-owl', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', array(), _S_VERSION);

	wp_enqueue_style('sborka-style', get_template_directory_uri() . '/assets/css/style.min.css', array(), _S_VERSION);

	wp_enqueue_style( 'theme-style', get_stylesheet_uri(), array(), _S_VERSION );



	wp_enqueue_script( 'sborka-jq', get_template_directory_uri() . '/assets/js/jQuery.min.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'sborka-owl', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array(), _S_VERSION, true );

	if($themesetting['quick-on']) {
		wp_enqueue_script( 'theme-quick', get_template_directory_uri() . '/assets/js/quick.min.js', array(), _S_VERSION, true );
		wp_localize_script('theme-quick', 'quick', array(
		   'url' => admin_url('admin-ajax.php'),
		   'nonce' => wp_create_nonce('quick_nonce')
	   ));
		}

	if($themesetting['count-on']) {
		wp_enqueue_script( 'countdown-js', get_template_directory_uri() . '/assets/js/jquery.countdown.min.js', array(), _S_VERSION, true );
		wp_enqueue_script( 'count-js', get_template_directory_uri() . '/assets/js/count.min.js', array(), _S_VERSION, true );
		wp_localize_script('count-js', 'count', array(
			'url' => admin_url('admin-ajax.php'),
			'nonce' => wp_create_nonce('count_nonce')
		));
		}
	
		if($themesetting['message-on']) {
			wp_enqueue_script( 'lib-js', get_template_directory_uri() . '/assets/js/lib.min.js', array(), _S_VERSION, true );
			wp_enqueue_script( 'message-js', get_template_directory_uri() . '/assets/js/message.min.js', array(), _S_VERSION, true );
			wp_localize_script('message-js', 'messages', array(
				'url' => admin_url('admin-ajax.php'),
				'nonce' => wp_create_nonce('messages_nonce')
			));
			wp_localize_script('message-js', 'addwishlist', array(
				'url' => admin_url('admin-ajax.php'),
				'nonce' => wp_create_nonce('addwishlist_nonce')
			));
			wp_localize_script('message-js', 'removewishlist', array(
				'url' => admin_url('admin-ajax.php'),
				'nonce' => wp_create_nonce('removewishlist_nonce')
			));
			}

	wp_enqueue_script( 'sborka-woo', get_template_directory_uri() . '/assets/js/woo.min.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'sborka-js', get_template_directory_uri() . '/assets/js/scripts.min.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sborka_scripts' );