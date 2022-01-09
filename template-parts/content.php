<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package AutoParts
 */
global $autopars;
?>
<div id="post-<?php the_ID(); ?>" class="blog-item col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="blog-item-inner clearfix">
        <div class="itemBlogImg clearfix">
            <div class="article-image">
                <div>
                    <?php
                    $id = get_post_thumbnail_id();
                    $main=wp_get_attachment_image_src( $id, 'blog' );
                    ?>
                    <a class="popup-gallery" href="<?php echo $main[0]; ?>">
                        <img src="<?php echo $main[0]; ?>" alt="<?php the_title(''); ?>" />
                    </a>
                </div>
                <div class="article-date">
                    <div class="date"><span class="article-date">
                            <b><?php echo date('d'); ?></b> <?php echo date('M'); ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="itemBlogContent clearfix ">
            <div class="blog-content">
                <div class="article-title font-title">
                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(''); ?></a></h4>
                </div>
                <div class="blog-meta"> <span class="author"><i class="fa fa-user"></i><span>Опубликовано: </span><?php the_author(); ?></span>
                    <span class="comment_count"><i class="fa fa-comment-o"></i><a href="#"><?php comments_number(); ?></a></span>
                </div>
                <p class="article-description"><?php do_excerpt(get_the_excerpt(), 15); ?></p>
                <div class="readmore">
                    <?php if($autopars['blog-but-text']) { ?>
                    <a class="btn-readmore font-title" href="<?php the_permalink(); ?>"><i class="fa fa-caret-right"></i><?php echo $autopars['blog-but-text']; ?></a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div><!-- #post-<?php the_ID(); ?> -->

