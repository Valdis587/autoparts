<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package AutoParts
 */

get_header();
global $autopars;
?>
    <div class="main-container container">
<?php get_breadcrumbs(); ?>
    <div class="row">
        <div id="content" class="col-sm-12">
            <div class="about-us about-demo-2">
                <div class="row">
                    <div class="col-lg-12 col-md-12 about-us-center">
                        <div class="content-description">
                            <h2 style="font-size: 100px" class="about-title">404</h2>
                              <?php if($autopars['404-text']) { ?>
                            <h3 style="font-size: 40px" class="about-title"><?php echo $autopars['404-text']; ?></h3>
                              <?php } ?>
                            <div class="">
                                <a href="<?php echo home_url(); ?>" id="button-comment" class="btn buttonGray"><span>На главную</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php
get_footer();
