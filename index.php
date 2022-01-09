<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
        <?php get_sidebar(); ?>
        <div id="content" class="col-md-9 col-sm-8">
            <div class="blog-header">
                <h3><?php wp_title(''); ?></h3>
            </div>
            <div class="blog-category clearfix">
                <div class="blog-listitem row">
		<?php
		if ( have_posts() ) :

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;



		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
                </div>
            </div>
        <div class="text-center">
            <?php  wp_main_pagination(); ?>
    </div>
        </div>
    </div>
	</div><!-- #main -->
<?php
get_footer();
