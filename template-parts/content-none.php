<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package AutoParts
 */

?>

<div class="blog-item col-lg-4 col-md-4 col-sm-6 col-xs-12">
	<header class="page-header">
		<h1 class="page-title"><?php wp_title(''); ?></h1>
	</header><!-- .page-header -->


		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Не нашли что ищите? <a href="%1$s">Попрубуте здесь</a>.', 'auto-part' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
			?>

			<p><?php esc_html_e( 'Извините, мы не нашли что вы ищите! Попробуйте другой запрос!', 'auto-part' ); ?></p>
			<?php
			get_search_form();

		else :
			?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'auto-part' ); ?></p>
			<?php
			get_search_form();

		endif;
		?>
</div><!-- .no-results -->
