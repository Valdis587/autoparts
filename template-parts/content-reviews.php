<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Flipmarts
 */
?>
   <div class="sidebar__reviews-item">
                <div class="sidebar__reviews-img">
                <?php
                $id = get_post_thumbnail_id();
                $main=wp_get_attachment_image_src( $id, 'blog' );
                ?>
                    <img src="<?php echo $main[0]; ?>" alt="<?php bloginfo('name'); ?>">
                </div>
                <p class="sidebar__reviews-neme"><?php the_title(''); ?></p>
                <b class="sidebar__reviews-rewievs"><?php the_content(); ?></b>
            </div>