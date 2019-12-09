<?php
/*
* Template Name: Team Template
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
    <!-- End Banner -->

<?php
$args = array(
	'post_type'      => 'team',
	'posts_per_page' => -1,
);

$team = new WP_Query( $args );
?>
    <!-- Start Our Attorneys Section -->
    <section class="our-attorneys padding-lg attorney-page">

        <div class="container">
            <ul class="row">
				<?php if ( $team->have_posts() ):
					while ( $team->have_posts() ) : $team->the_post(); ?>
                        <li class="col-12 col-md-6 col-lg-3">
                            <div class="cnt-block equal-hight">
                                <figure><?php the_post_thumbnail( 'full', array(
										'class' => 'img-responsive',
										'alt'   => ''
									) ); ?></figure>
                                <h3><?php the_title() ?></h3>
                                <p><?php the_excerpt() ?></p>
                            </div>
                        </li>
					<?php endwhile; ?> <!--End of the loop.-->
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
            </ul>

        </div>
    </section>
    <!-- End Our Attorneys Section -->


<?php
get_footer();
