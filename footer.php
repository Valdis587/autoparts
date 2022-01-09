<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AutoParts
 */

?>
<?php
if(is_front_page()) { ?>
</div>
    </div>
<?php } ?>
<?php global $autopars; ?>
<!-- Footer Container -->
<footer class="footer-container typefooter-2">
    <div class="row-dark">
        <div class="row container container-top">
            <div style="margin-bottom: 5px" class="col-lg-4 col-md-5 col-sm-5 col-xs-12 col-socials">
                <?php if($autopars['seti-on']) { ?>
                <ul class="socials">
                    <?php if($autopars['fb']) { ?>
                        <li class="facebook"><a href="<?php echo $autopars['fb']; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    <?php } ?>
                    <?php if($autopars['tw']) { ?>
                        <li class="twitter"><a href="<?php echo $autopars['tw']; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                    <?php } ?>
                    <?php if($autopars['ok']) { ?>
                        <li class="google_plus"><a href="<?php echo $autopars['ok']; ?>" target="_blank"><i class="fa fa-odnoklassniki"></i></a></li>
                    <?php } ?>
                    <?php if($autopars['vk']) { ?>
                        <li class="pinterest"><a href="<?php echo $autopars['vk']; ?>" target="_blank"><i class="fa fa-vk"></i></a></li>
                    <?php } ?>
                    <?php if($autopars['in']) { ?>
                        <li class="instagram"><a href="<?php echo $autopars['in']; ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                    <?php } ?>
                </ul>
                <?php } ?>
            </div>
            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row footer-middle">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-style">
                <div class="box-footer box-infos">
                    <div class="module">
                        <?php if($autopars['cont-title']) { ?>
                        <h3 class="modtitle"><?php echo $autopars['cont-title']; ?></h3>
                        <?php } ?>
                        <div class="modcontent">
                            <ul class="list-icon">
                                <?php if($autopars['adress']) { ?>
                                <li><span class="icon pe-7s-map-marker"></span><?php echo $autopars['adress']; ?></li>
                                <?php } ?>
                                <?php if($autopars['phone']) { ?>
                                <li><span class="icon pe-7s-call"></span> <a href="tel:<?php echo str_replace(array("(", ")", "-", " "), "", $autopars['phone']) ?>"><?php echo $autopars['phone']; ?></a></li>
                                <?php } ?>
                                <?php if($autopars['email']) { ?>
                                <li><span class="icon pe-7s-mail"></span><a href="mailto:<?php echo $autopars['email']; ?>"><?php echo $autopars['email']; ?></a></li>
                                <?php } ?>
                                <?php if($autopars['time-job']) { ?>
                                <li><span class="icon pe-7s-alarm"></span><?php echo $autopars['time-job']; ?></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-style">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-style">
                        <div class="box-information box-footer">
                            <div class="module clearfix">
                                <?php
                                  if( has_nav_menu('menu-left') ) {
                                     if($autopars['left-menu']) {
                                      ?>
                                <h3 class="modtitle"><?php echo $autopars['left-menu']; ?></h3>
                                  <?php } AutoParts_menu_left();
                                  } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-style">
                        <div class="box-account box-footer">
                            <div class="module clearfix">
                                <?php
                                if( has_nav_menu('menu-center') ) {
                                    if($autopars['centr-menu']) {
                                        ?>
                                        <h3 class="modtitle"><?php echo $autopars['centr-menu']; ?></h3>
                                    <?php } AutoParts_menu_center();
                                } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-clear">
                        <div class="box-service box-footer">
                            <div class="module clearfix">
                                <?php
                                if( has_nav_menu('menu-right') ) {
                                    if($autopars['right-menu']) {
                                        ?>
                                        <h3 class="modtitle"><?php echo $autopars['right-menu']; ?></h3>
                                    <?php } AutoParts_menu_right();
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="payment-w col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <?php if($autopars['payment']['url']) { ?>
                    <img src="<?php echo $autopars['payment']['url']; ?>" alt="<?php echo bloginfo('name'); ?>">
                    <?php } ?>
                </div>
                <div class="copyright col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <?php if($autopars['copy']) { ?>
                    <p><?php echo $autopars['copy']; ?></p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!--Back To Top-->
    <div class="back-to-top"><i class="fa fa-angle-up"></i></div>
</footer>
<!-- //end Footer Container -->
</div>
<?php wp_footer(); ?>
</body>
</html>
