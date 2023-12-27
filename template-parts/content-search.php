<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sborka
 */

?> 

<div class="blog__item" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="blog__item-left">
                        <div class="blog__item-img">
						<?php
                $id = get_post_thumbnail_id();
                $main=wp_get_attachment_image_src( $id, 'blog' );
                ?>
                    <img  src="<?php echo $main[0]; ?>" alt="<?php the_title(''); ?>"> 
                        </div>
                        <div class="blog__item-date">
                            <div class="blog__item-date-day"><?php the_date('d'); ?></div>
                            <div class="blog__item-date-may"><?php the_date('F'); ?></div>
                        </div>
                    </div>
                    <div class="blog__item-right">
                        <a href="<?php the_permalink(); ?>"><h3 class="blog__item-title"><?php the_title(''); ?></h3></a>
                        <span class="blog__item-author"><i class="icon-user-alt"></i> Автор: <?php the_author(); ?></span>
                        <div class="blog__item-desc"><?php do_excerpt(get_the_excerpt(), 25); ?></div>
                        <a href="<?php the_permalink(); ?>" class="blog__item-link">Читать далее...</a>
                    </div>
                </div><!-- #post-<?php the_ID(); ?> -->