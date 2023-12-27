<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Flipmarts
 */
global $themesetting;

?>

    <div class="homeCategory container">
    <div class="homeCategory__slider owl-carousel owl-theme">
    <?php 
                   $terms = get_terms( array(
                    'taxonomy' => 'product_cat',
                    'hide_empty' => true,
                    'pad_counts'=> true,
                    'orderby' => 'name',
                    'parent' => 0
                ) );
                if($terms) {
                    foreach($terms as $term) {
                ?>
        <div class="homeCategory__item">
           <div class="homeCategory__img">
                <a href="<?php echo get_category_link($term->term_id);?>">
                <?php 
                        $thumbnail_id =get_term_meta($term->term_id, 'thumbnail_id', true );
                        $image = wp_get_attachment_url( $thumbnail_id);
                        ?>
                        <img  src="<?php echo $image; ?>" alt="<?php echo $term->name;?>">
            </a>
            </div>
            <div class="homeCategory__title-wrap">
                <a href="<?php echo get_category_link($term->term_id);?>">
                <h3 class="homeCategory__title"><?php echo $term->name;?></h3>
            </a>
            </div>
        </div>
        <?php } } ?>
    </div>
</div>

