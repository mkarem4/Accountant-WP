<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package accountant
 */

get_header();
?>

    <!-- Start 404 -->
    <div class="container">
        <div class="not-found-wrapper">
            <h1><img src="<?php echo get_template_directory_uri(); ?>/images/404-image.png" alt="404"/></h1>
            <h2>! الصفحة غير موجودة</h2>
            <p>يبدو أننا لا نستطيع العثور على ما تبحث عنه. ربما البحث يمكن أن يساعد أو يعود إلى <a
                        href="<?php echo home_url(); ?>">الصفحة الرئيسية</a></p>
        </div>
    </div>
    <!-- End 404 -->


<?php
get_footer();
