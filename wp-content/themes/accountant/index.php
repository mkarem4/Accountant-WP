<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package accountant
 */

get_header();
$page_for_posts = get_option( 'page_for_posts' );
$thumbnail      = get_the_post_thumbnail_url( $page_for_posts );
?>


    <!-- Start Banner -->
    <div class="inner-banner" style="background: url('<?php echo $thumbnail ?>')">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="content">
                        <h1><span> <?php single_post_title(); ?> </span></h1>
                        <p><?php echo get_post_meta(get_queried_object_id() , 'page_desc', true) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner -->

    <!-- Start Blog -->
    <div class="container blog-wrapper padding-lg">
        <div class="row">
            <!-- Start Left Column -->
            <div class="col-sm-8 blog-left">
                <ul class="blog-listing">

                    <?php
                    if ( have_posts() ) :
                        /* Start the Loop */
                        while ( have_posts() ) :
                            the_post(); ?>

                            <li>
		                        <?php the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) ); ?>
                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <ul class="post-detail">
                                    <li><span class="icon-date-icon ico"></span><span
                                                class="bold"><?php the_time( 'F jS, Y' ); ?></span></li>
                                    <li><span class="icon-chat-icon ico"></span><span
                                                class="bold"><?php echo get_comments_number( get_the_ID() ) ?></span>
                                        تعليقات
                                    </li>
                                    <li><span class="label"><?php the_category( ', ' ); ?></span></li>
                                </ul>
                                <p><?php echo wp_trim_words( get_the_content(), 20, '...' ); ?></p>

                                <a href="<?php the_permalink(); ?>" class="read-more">قراءة المزيد</a>
                            </li>

                        <?php

                        endwhile; ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <ul class="pagination blue">
				                    <?php posts_numeric_pagination( $wp_query ); ?>
                                </ul>
                            </div>
                        </div>
	                    <?php
	                    wp_reset_postdata();
                    else :
                        get_template_part( 'template-parts/content', 'none' );
                    endif;
                    ?>

                </ul>
            </div>
            <!-- End Left Column -->

            <!-- Start Right Column -->
            <div class="col-sm-4">
                <div class="blog-right">

                    <div class="category">
                        <h3>الفئة</h3>
	                    <?php
	                    $categories = get_categories( array(
		                    'hide_empty' => false
	                    ) );
	                    echo '<ul>';
	                    foreach ( $categories as $category ) {
		                    echo '<li><a href="' . get_category_link( $category->term_id ) . '">' . $category->name . '<span>' . $category->category_count . '</span></a></li>';
	                    }
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
                                                   title="<?php the_title(); ?>"><?php the_title(); ?></h4>
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

                    <div class="archives">
                        <h3>أرشيف</h3>
                        <ul>
	                        <?php
	                        $archives = wp_get_archives( array(
		                        'hide_empty' => false
	                        ) );
	                        echo '<ul>';
	                        foreach ( $archives as $archive ) {
		                        echo '<li><a href="' . get_archives_link() . '" ><span class="icon-date-icon ico"></span>' . $archive->name . '</a></li>';
	                        }
	                        echo '</ul>';
	                        ?>
                        </ul>
                    </div>

                    <div class="tags">
                        <h3>الكلمات</h3>
                        <ul class="tags-list clearfix">
	                        <?php
	                        $tags = get_tags( array(
		                        'hide_empty' => false
	                        ) );
	                        echo '<ul>';
	                        foreach ( $tags as $tag ) {
		                        echo '<li><a href="'. get_tag_link($tag) .'" >' . $tag->name . '</a></li>';
	                        }
	                        echo '</ul>';
	                        ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Right Column -->

        </div>
    </div>
    <!-- End Blog -->




<?php
get_footer();
