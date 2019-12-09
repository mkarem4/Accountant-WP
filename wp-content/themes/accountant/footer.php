<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package accountant
 */

$contact_setting    = get_option('contact_settings', true);
$social_setting     = get_option( 'social_settings', true );
$work_times_setting = get_option( 'work_times_settings', true );
?>

 <!-- Start Footer -->
    <footer class="footer">

        <!-- Start Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="contact-us">
                            <h3>اتصل بنا</h3>
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i><?= $contact_setting['address'] ?></p>
                            <a href="tel:+1-760-284-3410"><i class="fa fa-phone"
                                                             aria-hidden="true"></i><?= $contact_setting['phone'] ?>
                            </a>
                            <a href="mailto:info@demoemail.com"><i class="fa fa-envelope"
                                                                   aria-hidden="true"></i><?= $contact_setting['email'] ?>
                            </a>
                            <ul class="follow-us clearfix">
                                <li><a href="<?= $social_setting['facebook'] ?>"><i class="fa fa-facebook"
                                                                                    aria-hidden="true"></i></a></li>
                                <li><a href="<?= $social_setting['twitter'] ?>"><i class="fa fa-twitter"
                                                                                   aria-hidden="true"></i></a></li>
                                <li><a href="<?= $social_setting['linkedIn'] ?>"><i class="fa fa-linkedin"
                                                                                    aria-hidden="true"></i></a></li>
                                <li><a href="<?= $social_setting['google'] ?>"><i class="fa fa-google-plus"
                                                                                  aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="open-time">
                            <h3>اوقات العمل</h3>
                            <p><strong>ايام العمل :</strong><br/> <?= $work_times_setting['work_times'] ?></p>
                            <p><strong>عطلة:</strong><br/><?= $work_times_setting['vacations'] ?></p>
                        </div>
                    </div>

	                <?php
	                $args = array(
		                'post_type'      => 'services',
		                'order'          => 'ASC',
		                'posts_per_page' => 6,
	                );

	                $the_query = new WP_Query( $args );

	                ?>
                    <div class="col-sm-6 col-md-4">
                        <div class="practice-area">
                            <h3>الخدمات</h3>
                            <ul class="clearfix">

	                            <?php if ( $the_query->have_posts() ):
		                            while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                                        <li><a href="<?php the_permalink() ?>"><i class="fa fa-arrow-right" aria-hidden="true"></i><?php the_title(); ?></a></li>
		                            <?php endwhile; ?> <!--End of the loop.-->
		                            <?php wp_reset_postdata(); ?>
	                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Bottom -->

        <!-- Copy Rights -->
        <div class="copy-rights-section">
            <div class="container">
                <div class="row">
                    <p> © <?php echo date('Y'); ?>  altair-group - كل الحقوق محفوظة </p>
                </div>
            </div>
        </div>
        <!-- End Copy Rights -->
    </footer>
    <!-- End Footer -->

    <!-- Scroll to top -->
    <a href="#" class="scroll-top"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>
<!-- popper JS -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/popper/popper.min.js"></script>
<!--  Bootstrap JS -->
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- Select2 JS -->
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/select2/js/select2.min.js"></script>
    <!-- Match Height JS -->
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/matchHeight/js/matchHeight-min.js"></script>
    <!-- Bxslider JS -->
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/bxslider/js/bxslider.min.js"></script>
    <!-- Waypoints JS -->
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/waypoints/js/waypoints.min.js"></script>
    <!-- Counter Up JS -->
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/counterup/js/counterup.min.js"></script>
    <!-- Magnific Popup JS -->
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/magnific-popup/js/magnific-popup.min.js"></script>
    <!-- Owl Carousal JS -->
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/owl-carousel/js/owl.carousel.min.js"></script>
    <!-- Modernizr JS -->
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/modernizr.custom.js"></script>
    <!-- Custom JS -->
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/custom.js"></script>

<script>
    $('#main-menu > li').addClass('nav-item');
    $('#main-menu > li > a').addClass('nav-link');
</script>

<?php wp_footer(); ?>

</body>
</html>
