<?php
/**
 * accountant functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package accountant
 */

if (!function_exists('accountant_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function accountant_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on accountant, use a find and replace
         * to change 'accountant' to the name of your theme in all the template files.
         */
        load_theme_textdomain('accountant', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'menu-1' => esc_html__('Primary', 'accountant'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('accountant_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        ));
    }
endif;
add_action('after_setup_theme', 'accountant_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function accountant_content_width()
{
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters('accountant_content_width', 640);
}

add_action('after_setup_theme', 'accountant_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function accountant_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'accountant'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'accountant'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'accountant_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function accountant_scripts()
{
    wp_enqueue_style('accountant-style', get_stylesheet_uri());

    wp_enqueue_script('accountant-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);

    wp_enqueue_script('accountant-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'accountant_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}


function my_scripts()
{
    if (is_admin()) {
        wp_enqueue_script('admin-js', get_template_directory_uri() . '/includes/admin-js.js');
        wp_enqueue_style('admin-css', get_template_directory_uri() . '/includes/admin-css.css');
    }
}
add_action('init', 'my_scripts');
// custom post types

/******************************************************
 *  ****************** Careers post *****************
 * ***************************************************/

// Register Custom Post Type
function careers()
{

    $labels = array(
        'name' => _x('Careers', 'Post Type General Name', 'accountant'),
        'singular_name' => _x('Career', 'Post Type Singular Name', 'accountant'),
        'menu_name' => __('Careers', 'accountant'),
        'name_admin_bar' => __('Careers', 'accountant'),
        'all_items' => __('All Careers', 'accountant'),
        'add_new_item' => __('Add New Career', 'accountant'),
        'add_new' => __('Add New Career', 'accountant'),
        'new_item' => __('New Career', 'accountant'),
        'edit_item' => __('Edit Career', 'accountant'),
        'update_item' => __('Update Career', 'accountant'),
        'view_item' => __('View Career', 'accountant'),
        'view_items' => __('View Career', 'accountant'),
        'search_items' => __('Search Careers', 'accountant'),

    );
    $args = array(
        'label' => __('Careers', 'accountant'),
        'labels' => $labels,
        'supports' => array('title', 'editor'),
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-businessman',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        // 'rewrite'          	 	=> array( 'slug' => 'resources/glossary' , 'with_front' => true ),
        'capability_type' => 'page',
    );
    register_post_type('careers', $args);
}

add_action('init', 'careers', 0);

// meta box
add_action('add_meta_boxes', function () {
    add_meta_box(
        'career_info',
        'Career Info',
        'career_info_cb',
        'careers',
        'normal',
        'high'
    );
});

function career_info_cb()
{
    global $post;
    $job_location = get_post_meta($post->ID, 'job_location', true);
    $job_type = get_post_meta($post->ID, 'job_type', true);

    wp_nonce_field(__FILE__, 'jw_nonce');

    ?>

    <table class="metabox_table">
        <tr>
            <th><label>Job Location :</label></th>
            <td>
                <input type="text" name="job_location" value="<?php echo $job_location ?>">
            </td>
        </tr>

        <tr>
            <th><label>Job type ( part time/Full Time/ etc..) :</label></th>
            <td>
                <input type="text" name="job_type" value="<?php echo $job_type ?>">
            </td>
        </tr>

    </table>

    <?php
}

add_action('save_post', function () {
    global $post;

    $post_type = get_post_type($post->ID);
    if ($post_type != 'careers') return;

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    if ($_POST && wp_verify_nonce($_POST['jw_nonce'], __FILE__)) {

        $careers_fields = array(
            'job_location',
            'job_type',
        );

        foreach ($careers_fields as $careers_field) {
            update_post_meta($post->ID, $careers_field, $_POST[$careers_field]);
        }
    }
});


// Register Custom Post Type
function services() {

    $labels = array(
        'name'                => _x( 'Services', 'Post Type General Name', 'accountant' ),
        'singular_name'       => _x( 'Service', 'Post Type Singular Name', 'accountant' ),
        'menu_name'           => __( 'Services', 'accountant' ),
        'parent_item_colon'   => __( 'Parent Item:', 'accountant' ),
        'all_items'           => __( 'All Services', 'accountant' ),
        'view_item'           => __( 'View Service', 'accountant' ),
        'add_new_item'        => __( 'Add New Service', 'accountant' ),
        'add_new'             => __( 'Add New', 'accountant' ),
        'edit_item'           => __( 'Edit Service', 'accountant' ),
        'update_item'         => __( 'View Service', 'accountant' ),
        'search_items'        => __( 'Search Services', 'accountant' ),
        'not_found'           => __( 'Not Found', 'accountant' ),
        'not_found_in_trash'  => __( 'Not Found', 'accountant' ),
    );
    $args = array(
        'label'               => __( 'Services', 'accountant' ),
        'description'         => __( '', 'accountant' ),
        'labels'              => $labels,
        'supports'            => array( 'title','editor', 'thumbnail'),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-screenoptions',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
        'taxonomies' 		  => array('portfolio_categories'),
    );
    register_post_type( 'services', $args );

}
// Hook into the 'init' action
add_action( 'init', 'services', 0 );



// Register Custom Post Type
function testimonials() {

    $labels = array(
        'name'                => _x( 'Testimonials', 'Post Type General Name', 'accountant' ),
        'singular_name'       => _x( 'Testimonial', 'Post Type Singular Name', 'accountant' ),
        'menu_name'           => __( 'Testimonials', 'accountant' ),
        'parent_item_colon'   => __( 'Parent Item:', 'accountant' ),
        'all_items'           => __( 'All Testimonials', 'accountant' ),
        'view_item'           => __( 'View Testimonial', 'accountant' ),
        'add_new_item'        => __( 'Add New Testimonial', 'accountant' ),
        'add_new'             => __( 'Add New', 'accountant' ),
        'edit_item'           => __( 'Edit Testimonial', 'accountant' ),
        'update_item'         => __( 'View Testimonial', 'accountant' ),
        'search_items'        => __( 'Search Testimonials', 'accountant' ),
        'not_found'           => __( 'Not Found', 'accountant' ),
        'not_found_in_trash'  => __( 'Not Found', 'accountant' ),
    );
    $args = array(
        'label'               => __( 'Testimonials', 'accountant' ),
        'description'         => __( '', 'accountant' ),
        'labels'              => $labels,
        'supports'            => array( 'title','editor','thumbnail'),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-format-status',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'testimonials', $args );

}
// Hook into the 'init' action
add_action( 'init', 'testimonials', 0 );



// Register Custom Post Type
function partners() {

	$labels = array(
		'name'                => _x( 'Partners', 'Post Type General Name', 'accountant' ),
		'singular_name'       => _x( 'Partner', 'Post Type Singular Name', 'accountant' ),
		'menu_name'           => __( 'Partners', 'accountant' ),
		'parent_item_colon'   => __( 'Parent Item:', 'accountant' ),
		'all_items'           => __( 'All Partners', 'accountant' ),
		'view_item'           => __( 'View Partner', 'accountant' ),
		'add_new_item'        => __( 'Add New Partner', 'accountant' ),
		'add_new'             => __( 'Add New', 'accountant' ),
		'edit_item'           => __( 'Edit Partner', 'accountant' ),
		'update_item'         => __( 'View Partner', 'accountant' ),
		'search_items'        => __( 'Search Partners', 'accountant' ),
		'not_found'           => __( 'Not Found', 'accountant' ),
		'not_found_in_trash'  => __( 'Not Found', 'accountant' ),
	);
	$args = array(
		'label'               => __( 'Partners', 'accountant' ),
		'description'         => __( '', 'accountant' ),
		'labels'              => $labels,
		'supports'            => array( 'title','thumbnail'),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-groups',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'partners', $args );

}
// Hook into the 'init' action
add_action( 'init', 'partners', 0 );



// Register Custom Post Type
function team() {

	$labels = array(
		'name'                => _x( 'Team', 'Post Type General Name', 'accountant' ),
		'singular_name'       => _x( 'Member', 'Post Type Singular Name', 'accountant' ),
		'menu_name'           => __( 'Team', 'accountant' ),
		'parent_item_colon'   => __( 'Parent Item:', 'accountant' ),
		'all_items'           => __( 'All Team', 'accountant' ),
		'view_item'           => __( 'View Member', 'accountant' ),
		'add_new_item'        => __( 'Add New Member', 'accountant' ),
		'add_new'             => __( 'Add New', 'accountant' ),
		'edit_item'           => __( 'Edit Member', 'accountant' ),
		'update_item'         => __( 'View Member', 'accountant' ),
		'search_items'        => __( 'Search Team', 'accountant' ),
		'not_found'           => __( 'Not Found', 'accountant' ),
		'not_found_in_trash'  => __( 'Not Found', 'accountant' ),
	);
	$args = array(
		'label'               => __( 'Team', 'accountant' ),
		'description'         => __( '', 'accountant' ),
		'labels'              => $labels,
		'supports'            => array( 'title','editor','thumbnail'),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-nametag',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'team', $args );

}
// Hook into the 'init' action
add_action( 'init', 'team', 0 );

// posts pagination
// Numbered Pagination
function posts_numeric_pagination($query) {
	$big = 999999999; // need an unlikely integer
	echo paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $query->max_num_pages
	) );
}


// main menu
function wpb_custom_new_menu() {
	register_nav_menu('main-menu',__( 'Main Menu' ));
}
add_action( 'init', 'wpb_custom_new_menu' );



// create custom plugin settings menu
add_action('admin_menu', 'haivision_settings_menu');

function haivision_settings_menu()
{

    //create new top-level menu
    add_menu_page('Accountant Settings', 'Accountant Settings', 'administrator', 'accountant_settings', 'accountant_settings_page', 'dashicons-admin-generic');
    add_submenu_page('accountant_settings', 'Contact Settings', 'Contact Settings', 'administrator', 'contact_options', 'contact_options');
}

function accountant_settings_page()
{

    $home_banner_setting = get_option('home_banner_settings', true);

    ?>
    <div class="wrap">
        <h1>Home Settings</h1>
        <form method="post" action="">
            <?php settings_fields('haivision_settings'); ?>
            <table class="metabox_table" style="width:60%">
                <tr>
                    <th>Home Banner Title</th>
                    <td><input type="text" name="home_banner_settings[title]" value="<?= $home_banner_setting['title']; ?>"></td>
                </tr>
                <tr>
                    <th>Home Banner Subtitle</th>
                    <td><input type="text" name="home_banner_settings[desc]" value="<?= $home_banner_setting['desc']; ?>"></td>
                </tr>
                <tr>
                    <th>Banner Button Text</th>
                    <td><input type="text" name="home_banner_settings[button_text]" value="<?= $home_banner_setting['button_text']; ?>"></td>
                </tr>
                <tr>
                    <th>Banner Button URL</th>
                    <td><input type="text" name="home_banner_settings[button_url]" value="<?= $home_banner_setting['button_url']; ?>"></td>
                </tr>
            </table>

            <?php submit_button(); ?>
        </form>
    </div>
<?php }

if ($_POST['option_page'] == 'accountant_settings') {
    $home_settings = array(
        'home_banner_settings',
    );
    foreach ($home_settings as $home_setting) {
        update_option($home_setting, $_POST[$home_setting]);
    }
}



function contact_options()
{

    $contact_setting    = get_option('contact_settings', true);
	$social_setting     = get_option( 'social_settings', true );
	$work_times_setting = get_option( 'work_times_settings', true );
    ?>

    <div class="wrap">
        <h1>Contact Settings</h1>
        <form method="post" action="">
            <?php settings_fields('contact_options'); ?>
            <table class="metabox_table" style="width:60%">
                <tr>
                    <th>Address</th>
                    <td><textarea name="contact_settings[address]"
                                  value="<?= $contact_setting['address'] ?>"><?= $contact_setting['address']; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><input type="email" name="contact_settings[email]" value="<?= $contact_setting['email']; ?>"></td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td><input type="number" name="contact_settings[phone]" value="<?= $contact_setting['phone']; ?>"></td>
                </tr>

            </table>

            <br>
            <hr>

            <h1>Social Networks</h1>
            <table class="metabox_table" style="width:60%">
                <tr>
                    <th>Facebook</th>
                    <td><input type="text" name="social_settings[facebook]" value="<?= $social_setting['facebook'] ?>">
                    </td>
                </tr>
                <tr>
                    <th>Twitter</th>
                    <td><input type="text" name="social_settings[twitter]" value="<?= $social_setting['twitter'] ?>">
                    </td>
                </tr>
                <tr>
                    <th>LinkedIn</th>
                    <td><input type="text" name="social_settings[linkedIn]" value="<?= $social_setting['linkedIn'] ?>">
                    </td>
                </tr>
                <tr>
                    <th>Google+</th>
                    <td><input type="text" name="social_settings[google]" value="<?= $social_setting['google'] ?>"></td>
                </tr>

            </table>

            <br>
            <hr>

            <h1>Work Times and Vacations</h1>
            <table class="metabox_table" style="width:60%">
                <tr>
                    <th>Work Times</th>
                    <td><textarea name="work_times_settings[work_times]"
                                  value="<?= $work_times_setting['work_times'] ?>"><?= $work_times_setting['work_times'] ?></textarea>
                    </td>
                </tr>
                <tr>
                    <th>Vacations</th>
                    <td><textarea name="work_times_settings[vacations]"
                                  value="<?= $work_times_setting['vacations'] ?>"><?= $work_times_setting['vacations'] ?></textarea>
                    </td>
                </tr>
            </table>


            <?php submit_button(); ?>
        </form>
    </div>

<?php }

if ($_POST['option_page'] == 'contact_options') {
    $contact_settings = array(
        'contact_settings',
        'social_settings',
	    'work_times_settings',
    );
    foreach ($contact_settings as $contact_setting) {
        update_option($contact_setting, $_POST[$contact_setting]);
    }
}


// logout redirect
add_action( 'wp_logout', 'auto_redirect_after_logout' );
function auto_redirect_after_logout() {
	$location = $_SERVER['HTTP_REFERER'];
	wp_safe_redirect( $location );
	exit();
}


// stop wp admin redirect
add_action( 'init', 'remove_default_redirect' );
add_filter( 'auth_redirect_scheme', 'stop_redirect', 9999 );

function stop_redirect( $scheme ) {
	if ( $user_id = wp_validate_auth_cookie( '', $scheme ) ) {
		return $scheme;
	}

	global $wp_query;
	$wp_query->set_404();
	get_template_part( 404 );
	exit();
}

function remove_default_redirect() {
	remove_action( 'template_redirect', 'wp_redirect_admin_locations', 1000 );
}


// show admin bar for admins only
add_action( 'after_setup_theme', 'remove_admin_bar' );

function remove_admin_bar() {
	if (current_user_can( 'editor' ) || (current_user_can( 'administrator' ) && is_admin() ) ) {
		show_admin_bar( true );
	}
}


function media_add_author_dropdown()
{
	$scr = get_current_screen();
	if ( $scr->base !== 'upload' ) return;

	$author   = filter_input(INPUT_GET, 'author', FILTER_SANITIZE_STRING );
	$selected = (int)$author > 0 ? $author : '-1';
	$args = array(
		'show_option_none'   => 'All Authors',
		'name'               => 'author',
		'selected'           => $selected
	);
	wp_dropdown_users( $args );
}
add_action('restrict_manage_posts', 'media_add_author_dropdown');


function arabicDate( $time ) {
	$months = [
		"Jan" => "يناير",
		"Feb" => "فبراير",
		"Mar" => "مارس",
		"Apr" => "أبريل",
		"May" => "مايو",
		"Jun" => "يونيو",
		"Jul" => "يوليو",
		"Aug" => "أغسطس",
		"Sep" => "سبتمبر",
		"Oct" => "أكتوبر",
		"Nov" => "نوفمبر",
		"Dec" => "ديسمبر"
	];
	$days   = [
		"Sat" => "السبت",
		"Sun" => "الأحد",
		"Mon" => "الإثنين",
		"Tue" => "الثلاثاء",
		"Wed" => "الأربعاء",
		"Thu" => "الخميس",
		"Fri" => "الجمعة"
	];
	$am_pm  = [ 'AM' => 'صباحاً', 'PM' => 'مساءً' ];

	$day        = $days[ date( 'D', $time ) ];
	$month      = $months[ date( 'M', $time ) ];
	$am_pm      = $am_pm[ date( 'A', $time ) ];
	$date       = $day . ' ' . date( 'd', $time ) . ' - ' . $month . ' - ' . date( 'Y', $time );
	$numbers_ar = [ "٠", "١", "٢", "٣", "٤", "٥", "٦", "٧", "٨", "٩" ];
	$numbers_en = [ '0', '1', '2', '3', '4', '5', '6', '7', '8', '9' ];

	return str_replace( $numbers_en, $numbers_ar, $date );
}

/**
 * truncateHtml can truncate a string up to a number of characters while preserving whole words and HTML tags
 *
 * @param string $text String to truncate.
 * @param integer $length Length of returned string, including ellipsis.
 * @param string $ending Ending to be appended to the trimmed string.
 * @param boolean $exact If false, $text will not be cut mid-word
 * @param boolean $considerHtml If true, HTML tags would be handled correctly
 *
 * @return string Trimmed string.
 */
function truncateHtml($text, $length = 100, $ending = '...', $exact = false, $considerHtml = true) {
	if ($considerHtml) {
		// if the plain text is shorter than the maximum length, return the whole text
		if (strlen(preg_replace('/<.*?>/', '', $text)) <= $length) {
			return $text;
		}
		// splits all html-tags to scanable lines
		preg_match_all('/(<.+?>)?([^<>]*)/s', $text, $lines, PREG_SET_ORDER);
		$total_length = strlen($ending);
		$open_tags = array();
		$truncate = '';
		foreach ($lines as $line_matchings) {
			// if there is any html-tag in this line, handle it and add it (uncounted) to the output
			if (!empty($line_matchings[1])) {
				// if it's an "empty element" with or without xhtml-conform closing slash
				if (preg_match('/^<(\s*.+?\/\s*|\s*(img|br|input|hr|area|base|basefont|col|frame|isindex|link|meta|param)(\s.+?)?)>$/is', $line_matchings[1])) {
					// do nothing
					// if tag is a closing tag
				} else if (preg_match('/^<\s*\/([^\s]+?)\s*>$/s', $line_matchings[1], $tag_matchings)) {
					// delete tag from $open_tags list
					$pos = array_search($tag_matchings[1], $open_tags);
					if ($pos !== false) {
						unset($open_tags[$pos]);
					}
					// if tag is an opening tag
				} else if (preg_match('/^<\s*([^\s>!]+).*?>$/s', $line_matchings[1], $tag_matchings)) {
					// add tag to the beginning of $open_tags list
					array_unshift($open_tags, strtolower($tag_matchings[1]));
				}
				// add html-tag to $truncate'd text
				$truncate .= $line_matchings[1];
			}
			// calculate the length of the plain text part of the line; handle entities as one character
			$content_length = strlen(preg_replace('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|[0-9a-f]{1,6};/i', ' ', $line_matchings[2]));
			if ($total_length+$content_length> $length) {
				// the number of characters which are left
				$left = $length - $total_length;
				$entities_length = 0;
				// search for html entities
				if (preg_match_all('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|[0-9a-f]{1,6};/i', $line_matchings[2], $entities, PREG_OFFSET_CAPTURE)) {
					// calculate the real length of all entities in the legal range
					foreach ($entities[0] as $entity) {
						if ($entity[1]+1-$entities_length <= $left) {
							$left--;
							$entities_length += strlen($entity[0]);
						} else {
							// no more characters left
							break;
						}
					}
				}
				$truncate .= substr($line_matchings[2], 0, $left+$entities_length);
				// maximum lenght is reached, so get off the loop
				break;
			} else {
				$truncate .= $line_matchings[2];
				$total_length += $content_length;
			}
			// if the maximum length is reached, get off the loop
			if($total_length>= $length) {
				break;
			}
		}
	} else {
		if (strlen($text) <= $length) {
			return $text;
		} else {
			$truncate = substr($text, 0, $length - strlen($ending));
		}
	}
	// if the words shouldn't be cut in the middle...
	if (!$exact) {
		// ...search the last occurance of a space...
		$spacepos = strrpos($truncate, ' ');
		if (isset($spacepos)) {
			// ...and cut the text in this position
			$truncate = substr($truncate, 0, $spacepos);
		}
	}
	// add the defined ending to the text
	$truncate .= $ending;
	if($considerHtml) {
		// close all unclosed html-tags
		foreach ($open_tags as $tag) {
			$truncate .= '</' . $tag . '>';
		}
	}
	return $truncate;
}