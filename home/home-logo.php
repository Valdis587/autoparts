<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Flipmarts
 */
global $themesetting;
if($themesetting['logo-home-on']) {
?>
<section class="homeLogo section">
    <div class="container">
        <div class="homeLogo__slider owl-carousel owl-theme">
        <?php 
     $query_args = array(
        'posts_per_page' => 10,
            'post_status'    => 'publish',
            'post_type'      => 'logo',
        );
        $r = new WP_Query( $query_args  );
        if ( $r->have_posts() ) {
            while ( $r->have_posts() ) {
            $r->the_post();
        ?>
            <div class="homeLogo__img">
            <?php
                $id = get_post_thumbnail_id();
                $main=wp_get_attachment_image_src( $id, 'blog' );
                ?>
                <img src="<?php echo $main[0]; ?>" width="<?php echo $themesetting['logo-home-width']; ?>" height="<?php echo $themesetting['logo-home-height']; ?>" alt="<?php bloginfo('name'); ?>">
            </div>
            <?php } } ?>
        </div>
    </div>
</section>
<?php } ?>