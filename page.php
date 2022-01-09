<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package AutoParts
 */

get_header();
?>

    <div class="main-container container">
<?php get_breadcrumbs(); ?>
    <div class="row">
        <div id="content" class="col-sm-12">
            <div class="blog-header">
                <h3><?php wp_title(''); ?></h3>
            </div>
            <div class="blog-category clearfix">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );



		endwhile; // End of the loop.
		?>
            </div>
        </div>
    </div>
	</div><!-- #main -->
<?php
get_footer();
