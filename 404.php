<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package sborka
 */

get_header();
get_template_part( 'template-parts/content', 'head' );
?>

<div class="error container">
    <div class="error__content">
        <h2 class="error__title">404</h2>
        <p class="error__desc">Страница отсутствует!</p>
        <a href="<?php echo home_url(); ?>" class="button error__button">На главную</a>
    </div>
</div>

<?php
get_footer();
