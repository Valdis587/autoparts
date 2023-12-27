<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package sborka
 */

get_header();
get_template_part( 'template-parts/content', 'head' );
?>

<div class="blog container">
    <div class="row-theme">
	<div class="blog__single content-theme">
	<h2 class="blog__single-title"><?php the_title(''); ?></h2>
            <div class="blog__single-info">
                <span>Автор: <?php the_author(); ?></span>
                <span>Дата: <?php the_date(); ?></span>
                <span><?php echo comments_number(); ?></span>
            </div>
            <div class="blog__single-img">
			<?php
                $id = get_post_thumbnail_id();
                $main=wp_get_attachment_image_src( $id, 'blog' );
                ?>
                    <img src="<?php echo $main[0]; ?>" alt="<?php the_title(''); ?>">
            </div>
            <div class="blog__single-desc">
			<?php the_content(); ?>
            </div>
			<?php
// If comments are open or we have at least one comment, load up the comment template.
if ( comments_open() || get_comments_number() ) :
	comments_template();
endif;
?>
</div>
		<?php
get_sidebar(); ?>
	</div>
	</div><!-- #main -->

<?php
get_footer();
