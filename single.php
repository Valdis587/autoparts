<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
            <div class="article-sub-title">
                <span class="article-author">Опубликовано: <a href="#"> <?php the_author(); ?></a></span>
                <span class="article-date">Дата: <?php the_date(); ?></span>
                <span class="article-comment"><?php comments_number(); ?></span>
            </div>
            <div class="form-group">
                <?php
                $id = get_post_thumbnail_id();
                $main=wp_get_attachment_image_src( $id, 'blog-single' );
                ?>
                <a href="<?php echo $main[0]; ?>" class="image-popup"><img src="<?php echo $main[0]; ?>" alt="<?php the_title(''); ?>"></a>
            </div>

            <div class="article-description">
               <?php the_content(); ?>
            </div>
                <?php
				comments_template();
				?>
        </div>
    </div>
</div>
<?php
get_sidebar();
get_footer();
