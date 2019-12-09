<?php
/*
* Template Name: Contact Template
*
*/

$contact_setting = get_option( 'contact_settings', true );
$social_setting  = get_option( 'social_settings', true );
$thumbnail       = get_the_post_thumbnail_url( get_the_ID() );
get_header();

?>

    <!-- Start Banner -->
    <div class="inner-banner" style="background: url('<?php echo $thumbnail ?>')">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="content">
                        <h1><span><?php the_title() ?></span></h1>
                        <p><?php the_excerpt() ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner -->

    <!-- Start Contact Us -->
    <section class="contact-us padding-lg">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 form-wrapper">
                    <h2>ابقى على تواصل</h2>
                    <?php echo do_shortcode('[contact-form-7 id="72" title="Contact form 1"]'); ?>

                </div>
                <div class="col-sm-6 contact-info">
                    <h2>معلومات الاتصال</h2>
                    <p><i class="fa fa-map-marker" aria-hidden="true"></i><?= $contact_setting['address']?></p>
                    <p class="number-info"><i class="fa fa-phone" aria-hidden="true"></i><span class="numbers">
                            <a href="tel:<?= $contact_setting['phone']?>"><?= $contact_setting['phone']?></a></span>
                    </p>
                    <p class="mail-info"><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:<?= $contact_setting['email']?>"><?= $contact_setting['email']?></a>
                    </p>
                    <div class="connect-with-us">
                        <h2>اتصل بنا : </h2>
                        <ul class="follow-us clearfix">
                            <li><a href="<?= $social_setting['facebook']?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="<?= $social_setting['twitter']?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="<?= $social_setting['linkedIn']?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end Contact Us -->

    <!-- Start Google Map -->
    <div class="google-map">
        <div id="map">
            <iframe width="100%" style="border:none" id="gmap_canvas"
                    src="https://maps.google.com/maps?q=31.032204%2C31.367586&t=&z=15&ie=UTF8&iwloc=&output=embed"
                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
        </div>
    </div>
    <!-- End Google Map -->

<?php
get_footer();
