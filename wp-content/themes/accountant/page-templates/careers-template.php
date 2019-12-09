<?php
/*
* Template Name: Careers Template
*
*/

get_header();
$thumbnail = get_the_post_thumbnail_url( get_the_ID() );
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
    </div>
    <!-- End Banner -->

    <!-- Start Practice Area Section -->

<?php
$args = array(
	'post_type'      => 'careers',
	'order'          => 'DESC',
	'posts_per_page' => 6,
);

$the_query = new WP_Query( $args );
?>
    <section class="practice-area padding-lg">
        <div class="container">
            <ul class="row">
	            <?php if ( $the_query->have_posts() ):
		            while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <li class="col-12 col-md-6 equal-hight">
                            <div class="inner">
                                <h3><?php the_title(); ?></h3>
                                <h5><?php echo get_post_meta( get_the_ID(), 'job_location', true ) . ' - ' . get_post_meta( get_the_ID(), 'job_type', true ); ?></h5>
                                <p><?php echo wp_trim_words( get_the_content(), 60, '...' ); ?></p>
                                <a class="read-more" href="<?php the_permalink(); ?>">قراءة المزيد</a>
                            </div>
                        </li>
		            <?php endwhile; ?> <!--End of the loop.-->
                    <div class="row">
                        <div class="col-12">
                            <ul class="pagination blue">
	                            <?php posts_numeric_pagination( $the_query ); ?>
                            </ul>
                        </div>
                    </div>
		            <?php wp_reset_postdata(); ?>
	            <?php endif; ?>
            </ul>


        </div>
    </section>
    <!-- End Practice Area Section -->

<?php
get_footer();
