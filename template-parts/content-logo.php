<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Groceen
 */
global $themesetting;
?>

<?php 
			if($themesetting['logo-url']) {
			if(is_front_page()) { ?>
            <img width="<?php echo $themesetting['logo-width']; ?>" height="<?php echo $themesetting['logo-height']; ?>" src="<?php echo $themesetting['logo-url']['url'] ?>" alt="<?php bloginfo('name'); ?>">
			<?php } else { ?>
				<a href="<?php echo home_url(); ?>"><img width="<?php echo $themesetting['logo-width']; ?>" height="<?php echo $themesetting['logo-height']; ?>" src="<?php echo $themesetting['logo-url']['url'] ?>" alt="<?php bloginfo('name'); ?>"></a>
				<?php } } ?>
            