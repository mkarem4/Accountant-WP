<?php
/*
* Template Name: About Template
*
*/

get_header();
$thumbnail       = get_the_post_thumbnail_url( get_the_ID() );
?>

    <!-- Start Banner -->
    <div class="inner-banner" style="background: url('<?php echo $thumbnail ?>')">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="content">
                        <h1><span><?php the_title() ?></span></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner -->

    <!-- Start About Section -->
    <section class="about padding-lg">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 left-block">
                    <?php
                    while (have_posts()) :
                        the_post();
                        the_content();
                        //  get_template_part( 'template-parts/content', 'page' );

                    endwhile; // End of the loop.
                    ?>
                </div>
                <div class="col-12 col-md-6 right-block">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/Financial-manager.jpg"
                         class="img-responsive" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- End About Section -->


    <!-- Start Testimonial -->
    <?php
    $args = array(
        'post_type'      => 'testimonials',
        'order'          => 'DESC',
        'posts_per_page' => 5,
    );

    $the_query = new WP_Query( $args );

    ?>
    <section class="testimonial padding-lg">
        <div class="container">
            <div class="row heading heading-icon">
                <h2>شهادات العميل</h2>
            </div>
            <div class="wrapper">
                <ul class="testimonial-slide">
		            <?php if ( $the_query->have_posts() ):
			            while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                            <li>
                                <p><?php echo wp_trim_words( get_the_content(), 50, '...' ); ?></p>
                                <p><span>من <?php the_title() ?> </span></p>
                            </li>
			            <?php endwhile; ?> <!--End of the loop.-->
			            <?php wp_reset_postdata(); ?>
		            <?php endif; ?>

                </ul>
                <div id="bx-pager"></div>
            </div>
        </div>
    </section>
    <!-- End Testimonial -->


<?php
get_footer();
