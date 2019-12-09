<?php
/*
* Template Name: Files Template
*/

$thumbnail = get_the_post_thumbnail_url( get_the_ID() );
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

<?php
$current_user_id    = get_current_user_id();
$display_name = get_the_author_meta( 'display_name', $current_user_id );

$args        = array(
	'post_type'   => 'attachment',
	'numberposts' => null,
	'post_status' => 'inherit',
	'author'      => $current_user_id
);
$attachments = get_posts( $args );
?>

    <!-- Start Contact Us -->
    <section class="contact-us padding-lg">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 contact-info files-page">
                   <a href="#upload-files" class="upload-files"> رفع ملفات جديدة </a>
					<?php
					if ( is_user_logged_in() ) {
						if ( $attachments ) {
							foreach ( $attachments as $attachment ) { ?>
                                <div class="list-group">
                                    <div class="preview">
                                        <img src="<?php echo $attachment->guid ?>" alt="<?php the_title() ?>">
                                    </div>
                                    <div class="attachment-data">
                                        <h4><?php echo $attachment->post_title ?></h4>
                                        <p><?php echo $attachment->post_content; ?></p>


                                    </div>
                                    <div class="attachment-date">
                                        <p ><?php echo get_the_date(); ?></p>
                                        <a href="<?php echo $attachment->guid ?>" download>تحميل الملف</a>
                                    </div>
                                </div>
								<?php
							}
						} else {
							echo '<h3>لا توجد ملفات خاصة بك حاليا </h3>';
						}
						echo '<div id="upload-files">';
						echo do_shortcode( '[fu-upload-form]' );
						echo '</div>';
					}else{
						echo '<h3>لابد من تسجيل دخولك لرفع ملفاتك </h3>';
                    }

					?>
                </div>
            </div>
        </div>
    </section>
    <!-- end Contact Us -->


<?php
get_footer();
