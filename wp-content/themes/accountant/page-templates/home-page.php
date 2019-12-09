<?php
/*
* Template Name: Home Page
*
*/

get_header();
$thumbnail = get_the_post_thumbnail_url( get_the_ID() );
?>

    <!-- Start Banner -->
    <div class="banner-outer">
        <div class="banner-image" style="background: url('<?php echo $thumbnail ?>')">
            <div class="slide1">
                <div class="container">
                    <div class="content animated fadeInRight">
                        <h1><span><?php the_title() ?></span></h1>
                        <p><?php the_excerpt() ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner -->

    <!-- Start About Section -->
    <section class="about">
        <div class="container">
            <ul class="row our-links">
                <li class="col-12 col-md-6 clearfix equal-hight">
                    <div class="box">
                        <div class="icon"><img
                                    src="<?php echo get_template_directory_uri(); ?>/images/request-lawyer.png"
                                    class="img-responsive" alt="Request A Lawyer"></div>
                        <div class="detail">
                            <h3>أهداف المكتب </h3>
                            <p>
                                نتعهد بتقديم أفضل الخدمات المهنية واتباع الأساليب الحديثة والمحافظة التامة علي مبدأ سرية المعلومات
                            </p>
                        </div>
                    </div>
                </li>
                <li class="col-12 col-md-6 clearfix equal-hight">
                    <div class="box">
                        <div class="icon"><img
                                    src="<?php echo get_template_directory_uri(); ?>/images/case-investigation.png"
                                    class="img-responsive" alt="Case Investigation"></div>
                        <div class="detail">
                            <h3>مبادئ المكتب </h3>
                            <p>
                                وحدة الأساليب وتجانس الأداء للعاملين بالمكتب والكفاءة الإدارية والتنفيذية ومسايرة التطور في مجال المهنة والأستقلالية والحياد والحرص علي آداب وسلوك المهنة وبذل العناية المهنية الكافية
                            </p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

		<?php
		$page = get_page_by_path( 'about-us' );
		?>
        <div class="container">
            <div class="row heading heading-icon">
                <h2>من نحن</h2>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 left-block">
                    <i><?= wp_trim_words( $page->post_content, 40, '...' ) ?></i>
                    <a href="/about-us" class="know-more">تعرف أكثر </a>
                </div>
                <div class="col-12 col-md-6 right-block">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/Financial-manager.jpg"
                         class="img-responsive" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- End About Section -->

    <!-- Start Practice Area Section -->

<?php
$args = array(
	'post_type'      => 'services',
	'order'          => 'ASC',
	'posts_per_page' => 6,
);

$the_query = new WP_Query( $args );

?>
    <section class="practice-area padding-lg">
        <div class="container">
            <div class="row heading heading-icon">
                <h2>الخدمات</h2>
            </div>
            <ul class="row">

				<?php if ( $the_query->have_posts() ):
					while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <li class="col-12 col-md-4 equal-hight">
                            <div class="inner"> <?php the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) ); ?>
                                <h3><?php the_title(); ?></h3>
                                <p><?php echo wp_trim_words( get_the_content(), 25, '...' ); ?></p>
                                <a class="read-more" href="<?php the_permalink() ?>">قراءة المزيد</a>
                            </div>
                        </li>
					<?php endwhile; ?> <!--End of the loop.-->
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
            </ul>
        </div>
    </section>
    <!-- End Practice Area Section -->


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
$args = array( // Define WP Query Parameters
	'post_type'      => 'post',
	'posts_per_page' => 1
);

$recent_post = new WP_Query( $args );
?>


<?php if ( $recent_post->have_posts() ):
	while ( $recent_post->have_posts() ) : $recent_post->the_post(); ?>


        <!-- Start New & Events Section -->
        <section class="news-events padding-lg">
        <div class="container">
        <div class="row heading heading-icon">
            <h2>أحدث اخبارنا</h2>
        </div>
        <div class="row">
        <div class="col-12 col-md-8 left-block">
            <div class="news-box">
                <figure>
					<?php the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) ); ?>
                </figure>

                <div class="date"><span><?php echo arabicDate( get_the_date( 'U' ) ) ?></span></div>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <p><?php echo wp_trim_words( get_the_content(), 20, '...' ); ?></p>
                <a href="<?php the_permalink(); ?>" class="read-more">تعرف أكثر </a>
            </div>
        </div>
	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>
<?php endif; ?>


<?php
$args = array( // Define WP Query Parameters
	'post_type'      => 'post',
	'posts_per_page' => 4,
	'offset'         => 1
);

$recent_post = new WP_Query( $args );
?>

    <div class="col-12 col-md-4 right-block">
        <ul class="news-listes">
            <!--other 4 posts-->
			<?php if ( $recent_post->have_posts() ):
				while ( $recent_post->have_posts() ) : $recent_post->the_post(); ?>
                    <li>
                        <figure>
							<?php the_post_thumbnail( 'thumbnail', array( 'class' => 'img-responsive' ) ); ?>
                        </figure>
                        <div class="news-list-details">
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        </div>
                    </li>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>
        </ul>
    </div>
    </div>
    </div>
    </section>
    <!-- End New & Events Section -->


    <!-- Start logos Section -->
<?php
$args = array( // Define WP Query Parameters
	'post_type'      => 'partners',
	'posts_per_page' => - 1
);

$partners = new WP_Query( $args );

?>
    <section class="logos">
        <div class="container">
            <div class="row heading heading-icon">
                <h2>شركاء النجاح</h2>
            </div>
            <ul class="owl-carousel clearfix">
				<?php if ( $partners->have_posts() ):
					while ( $partners->have_posts() ) : $partners->the_post();
						$imgurl = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
						?>
                        <li><a href="#"><img src="<?php echo $imgurl[0]; ?>" alt="<?php the_title(); ?>"></a></li>
					<?php endwhile; ?> <!--End of the loop.-->
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
            </ul>
        </div>
    </section>
    <!-- End logos Section -->

<?php
get_footer();
?>