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
<section class="homeNews blog section">
    <div class="container">
    <div class="homeNews__slider owl-carousel owl-theme">
        <?php 
    $query_args = array(
        'posts_per_page' => 10,
            'post_status'    => 'publish',
            'post_type'      => 'post',
        );
        $r = new WP_Query( $query_args  );
        if ( $r->have_posts() ) {
            while ( $r->have_posts() ) {
            $r->the_post();
            get_template_part( 'template-parts/content', get_post_type() );
       
     } } ?>
    </div>
</div>
</section>
