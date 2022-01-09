<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package AutoParts
 */

?>


    <div id="post-<?php the_ID(); ?>" class="blog-listitem row">

	<?php auto_part_post_thumbnail();
	
		the_content();

	 ?>
</div><!-- #post-<?php the_ID(); ?> -->
