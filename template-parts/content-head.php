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

<section class="topPanel">
   <div class="topPanel__img">
    <?php if($themesetting['headimg']) { ?>
    <img src="<?php echo $themesetting['headimg']['url']; ?>" alt="<?php bloginfo('name'); ?>">
    <?php } ?>
   </div> 
   <div class="topPanel__content">
    <h2 class="topPanel__title"><?php wp_title(''); ?></h2>
        <?php breadcrumbs(); ?>
   </div>
</section> 