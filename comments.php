<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package AutoParts
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div style="margin-top: 30px" class="panel panel-default related-comment">
    <div class="panel-body">
        <div class="form-group">
            <div id="comments" class="blog-comment-info">
                <h3 id="review-title"><?php comments_number(); ?></h3>


        <?php
        // You can start editing here -- including this comment!
        if ( have_comments() ) :
            ?>


            <?php the_comments_navigation(); ?>


            <?php
            wp_list_comments('callback=better_comment&end-callback=better_comment_close');
            ?>


            <?php
            the_comments_navigation();

            // If comments are closed and there are comments, let's leave a little note, shall we?
            if ( ! comments_open() ) :
                ?>
                <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'supermarket' ); ?></p>
            <?php
            endif;

        endif; // Check for have_comments(). ?>

                <?php
                function bebe_move_comment_field_to_bottom( $fields ) {
                    $comment_field = $fields['comment'];
                    unset( $fields['comment'] );
                    $fields['comment'] = $comment_field;
                    return $fields;
                }

                add_filter( 'comment_form_fields', 'bebe_move_comment_field_to_bottom' );

                $commenter = wp_get_current_commenter();
                $req = get_option( 'require_name_email' );
                $aria_req = ( $req ? " aria-required='true'" : '' );

                $fields =  array(

                    'author' => '<div class="col-md-4"><div class="form-group"><input class="form-control unicase-form-control text-input" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' placeholder="Type your name" /></div></div>',

                    'email' => '<div class="col-md-4"><div class="form-group"><input class="form-control unicase-form-control text-input" id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' placeholder="Type your email" /></div></div>',
                    'cookies' => '',
                );

                $args = array(
                    'class_submit' =>'btn-upper btn buttonGray checkout-page-button',
                    'submit_field' => '<p class="col-md-12 outer-bottom-small m-t-20">%1$s %2$s</p>',
                    'label_submit'      => 'Отправить',
                    'fields' => apply_filters( 'comment_form_default_fields', $fields , 0),

                    'comment_field' =>  '<div class="col-md-12"><div class="form-group"><textarea class="form-control unicase-form-control" id="comment" name="comment" aria-required="true" placeholder="Type your comment">' . '</textarea></div></div>',

                );


                comment_form($args);

                ?>

        <?php

        function better_comment($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
        extract($args, EXTR_SKIP);

        if ( 'article' == $args['style'] ) {
            $tag = 'div';
            $add_below = 'comment';
        } else {
            $tag = 'div';
            $add_below = 'comment';
        }

        ?>
        <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' :'parent') ?> id="comment-<?php comment_ID() ?>" itemscope itemtype="http://schema.org/Comment">
        <div  class="col-md-2 col-sm-2">
            <?php echo get_avatar($comment); ?>
        </div>
        <?php if($depth==2) { ?>
        <div class="col-md-10 col-sm-10 outer-bottom-xs">
            <div class="blog-sub-comments inner-bottom-xs">
                <?php } else if($depth==1) { ?>
                <div class="col-md-10 col-sm-10 blog-comments outer-bottom-xs">
                    <div class="blog-comments inner-bottom-xs">
                        <?php } ?>
                        <h4><?php comment_author(); ?></h4>
                        <span class="review-action pull-right"><?php comment_date('jS F Y') ?>
                <a href="#" ><?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?></a>
                </span>
                        <?php comment_text() ?>
                    </div>

                    <?php }

                    // end of awesome semantic comment

                    function better_comment_close() {
                        echo '</div>';
                        echo '</div>';
                    }

                    ?>
                </div>
            </div><!-- #comments -->
        </div>
            </div>
