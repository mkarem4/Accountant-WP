<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package accountant
 */

get_header();
$page_for_posts = get_option( 'page_for_posts' );
$thumbnail      = get_the_post_thumbnail_url( $page_for_posts );
?>


			<?php while ( have_posts() ) :the_post(); ?>

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

                <!-- Start Blog Detail -->
                <div class="container blog-wrapper padding-lg">
                    <div class="row">
                        <!-- Start Left Column -->
                        <div class="col-sm-8 blog-left">
                            <ul class="blog-listing detail">
                                <li> <?php the_post_thumbnail( 'full', array(
										'class' => 'img-responsive',
										'alt'   => ''
									) ); ?>
                                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <ul class="post-detail">
                                        <li><span class="icon-date-icon ico"></span><span
                                                    class="bold"><?php the_time( 'F jS, Y' ); ?></span></li>
                                    </ul>
                                    <p><?php echo get_the_content(); ?></p>
                                </li>
                            </ul>

                        </div>
                        <!-- End Left Column -->

                        <!-- Start Right Column -->
                        <div class="col-sm-4">
                            <div class="blog-right">
                                <div class="category">
                                    <h3>احدث الوظائف</h3>
				                    <?php

				                    $args = array(
					                    'post_type'      => 'careers',
					                    'order'          => 'DESC',
					                    'posts_per_page' => 3,
				                    );

				                    $the_query = new WP_Query( $args );

				                    echo '<ul>';
				                    while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                                        <li><a href="<?php the_permalink()?>"> <?php the_title(); ?></a></li>
				                    <?php
				                    endwhile;
				                    wp_reset_postdata();
				                    echo '</ul>';
				                    ?>
                                </div>
                                <div class="recent-post">
                                    <h3>أخبار شعبية</h3>

				                    <?php
				                    // Query random posts
				                    $rand_posts = new WP_Query( array(
					                    'post_type'      => 'post',
					                    'orderby'        => 'rand',
					                    'posts_per_page' => 3,
				                    ) ); ?>

				                    <?php
				                    // If we have posts lets show them
				                    if ( $rand_posts->have_posts() ) : ?>
                                        <ul>
						                    <?php
						                    // Loop through the posts
						                    while ( $rand_posts->have_posts() ) : $rand_posts->the_post(); ?>

                                                <li class="clearfix"><a href="#">
                                                        <div class="img-block"><img
                                                                    src="<?php echo get_template_directory_uri(); ?>/images/rp-thumb3.jpg"
                                                                    class="img-responsive" alt=""></div>
                                                        <div class="detail">
                                                            <h4><a href="<?php the_permalink(); ?>"
                                                                   title="<?php the_title(); ?>"><?php the_title(); ?>
                                                            </h4>
                                                            <p>
                                                                <span class="icon-date-icon ico"></span><span><?php the_time( 'F jS, Y' ); ?></span>
                                                            </p>
                                                        </div>
                                                    </a>
                                                </li>
						                    <?php endwhile; ?>
						                    <?php wp_reset_postdata(); ?>
                                        </ul>
				                    <?php endif; ?>
                                </div>

                            </div>
                        </div>
                        <!-- End Right Column -->
                    </div>
                </div>
                <!-- End Blog Detail -->


			<?php endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
