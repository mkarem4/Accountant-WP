<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package accountant
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
    <title><?php bloginfo('title') ?></title>
    <!-- Reset CSS -->
    <link href="<?php echo get_template_directory_uri(); ?>/css/reset.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap -->
    <link href="<?php echo get_template_directory_uri(); ?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!-- Select2 -->
    <link href="<?php echo get_template_directory_uri(); ?>/assets/select2/css/select2.min.css" rel="stylesheet" type="text/css">
    <!-- Font Awesome -->
    <link href="<?php echo get_template_directory_uri(); ?>/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Magnific Popup -->
    <link href="<?php echo get_template_directory_uri(); ?>/assets/magnific-popup/css/magnific-popup.css" rel="stylesheet" type="text/css">
    <!-- Iconmoon -->
    <link href="<?php echo get_template_directory_uri(); ?>/assets/iconmoon/css/iconmoon.css" rel="stylesheet" type="text/css">
    <!-- Owl Carousel -->
    <link href="<?php echo get_template_directory_uri(); ?>/assets/owl-carousel/css/owl.carousel.min.css" rel="stylesheet" type="text/css">
    <!-- Animate -->
    <link href="<?php echo get_template_directory_uri(); ?>/css/animate.css" rel="stylesheet" type="text/css">
    <!-- Custom Style -->
    <link href="<?php echo get_template_directory_uri(); ?>/css/custom.css" rel="stylesheet" type="text/css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.min.js"></script>
      <script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js"></script>
    <![endif]-->

	<?php
	global $user_ID;
	$current_user = wp_get_current_user();

	if ( ! $user_ID ) {
		if ( $_POST ) {
			$login_array                  = [];
			$login_array['user_login']    = $_POST['username'];
			$login_array['user_password'] = $_POST['password'];
			$login_array['rememberme']    = true;

			$verify_user = wp_signon( $login_array, false );
			if ( ! is_wp_error( $verify_user ) ) {
				echo "<script> location.href = location.href </script>";
			}
		}
	} ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- Start Preloader -->
    <div id="loading">
        <div class="element">
            <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png"  alt="">
            <div class="sk-folding-cube">
                <div class="sk-cube1 sk-cube"></div>
                <div class="sk-cube2 sk-cube"></div>
                <div class="sk-cube4 sk-cube"></div>
                <div class="sk-cube3 sk-cube"></div>
            </div>
        </div>
    </div>
    <!-- End Preloader -->
    <?php
    $contact_setting = get_option( 'contact_settings', true );
    ?>
    <!-- Start Header -->
    <header>
        <!-- Start Header Middle -->
        <div class="container header-middle">
            <div class="row">
               <span class="col-12 col-md-6 logo"><a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" class="img-responsive" alt=""></a></span>
                <div class="col-12 col-md-6 header-right-bottom mb-3">
                    <!-- Start Header Right Top -->
                    <div class="header-right-top">
                        <a class="tel-number" href="tel:<?= $contact_setting['phone']?>"><i class="fa fa-phone" aria-hidden="true"></i> <?= $contact_setting['phone']?> </a>
<!--                        <a class="free-consultation_btn" href="/contact-us">استشارة مجانية</a>-->
                        <!--                    login-->
	                    <?php if ( ! is_user_logged_in() ) { ?>
                            <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h4 class="modal-title w-100 font-weight-bold">تسجيل الدخول</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form method="post" class="login_block">
                                            <div class="modal-body mx-3">
                                                <div class="md-form mb-3">
                                                    <i class="fa fa-user prefix grey-text"></i>
                                                    <label data-error="wrong" data-success="right"
                                                           for="defaultForm-username">اسم
                                                        المستخدم</label>
                                                    <input type="text" id="defaultForm-username username"
                                                           class="form-control validate" name="username">

                                                </div>

                                                <div class="md-form mb-3">
                                                    <i class="fa fa-lock prefix grey-text"></i>
                                                    <label data-error="wrong" data-success="right"
                                                           for="defaultForm-pass">كلمة
                                                        السر</label>
                                                    <input type="password" id="defaultForm-pass"
                                                           class="form-control validate"
                                                           name="password">

                                                </div>

                                            </div>
                                            <div class="modal-footer d-flex justify-content-center">
                                                <button type="submit" name="btn-submit"
                                                        class="btn btn-default">
                                                    دخول
                                                </button>
                                            </div>
                                            <div>
                                                <input type="hidden" name="rememberme" id="rememberme" value="forever">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <a href="" class="free-consultation_btn login-btn" data-toggle="modal"
                               data-target="#modalLoginForm">تسجيل الدخول</a>

	                    <?php } else { ?>

                            <a href="<?php echo wp_logout_url(); ?>"
                               class="free-consultation_btn login-btn">تسجيل
                                خروج</a>


	                    <?php } ?>
                    </div>
                    <!-- End Header Right Top -->
                    <!-- Start Navigation -->
                    <nav class="navbar navbar-expand-md navbar-dark navbar-custom">
                        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">


                            <?php
									wp_nav_menu(array(
										'theme_location' => 'main-menu',
										'menu_id'        => 'main-menu',
										'menu_class'	 => 'navbar-nav mr-auto',
										'container'       => '',
										'container_class' => '',
										'container_id'    => '',
										'echo'            => true,
										'fallback_cb'     => 'wp_page_menu',
										'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
									));
									?>
                        </div>
                    </nav>
                    <!-- End Navigation -->
                </div>
            </div>
        </div>
        <!-- End Header Middle -->
    </header>
    <!-- End Header -->