<?php
require 'db.php';

// Logo
$select_logo = "SELECT * FROM logos WHERE active_status=1";
$select_logo_result = mysqli_query($db_connect, $select_logo);
$after_assoc_logo = mysqli_fetch_assoc($select_logo_result);

// Menu
$select_menu = "SELECT * FROM menus WHERE status=0";
$select_menu_result = mysqli_query($db_connect, $select_menu);

// BANNERS
$select_banners = "SELECT * FROM banners WHERE status=1";
$select_banners_result = mysqli_query($db_connect, $select_banners);
$after_assoc_banner = mysqli_fetch_assoc($select_banners_result);

// BANNER ICON
$select_icons = "SELECT * FROM icons WHERE state=1";
$select_icons_result = mysqli_query($db_connect, $select_icons);

// About
$select_about = "SELECT * FROM abouts WHERE active_status=1";
$select_about_result = mysqli_query($db_connect, $select_about);
$after_assoc_about = mysqli_fetch_assoc($select_about_result);

// About-Education
$select_edu = "SELECT * FROM educations WHERE status=0";
$select_edu_result = mysqli_query($db_connect, $select_edu);

// Service
$select_services = "SELECT * FROM services WHERE status=0";
$select_services_result = mysqli_query($db_connect, $select_services);

$select_services = "SELECT * FROM services WHERE active_status=1";
$select_services_result = mysqli_query($db_connect, $select_services);

// Counter Up
$select_counters = "SELECT * FROM counters WHERE status=0";
$select_counters_result = mysqli_query($db_connect, $select_counters);

$select_counters = "SELECT * FROM counters WHERE active_status=1";
$select_counters_result = mysqli_query($db_connect, $select_counters);

// Testimonial
$select_testimonial = "SELECT * FROM testimonials WHERE status=0";
$select_testimonial_result = mysqli_query($db_connect, $select_testimonial);

// Brands
$select_brands = "SELECT * FROM brands WHERE active_status=1";
$select_brands_result = mysqli_query($db_connect, $select_brands);

$select_brands = "SELECT * FROM brands WHERE status=0";
$select_brands_result = mysqli_query($db_connect, $select_brands);

// Contact
$select_contact = "SELECT * FROM contacts WHERE active_status=1";
$select_contact_result = mysqli_query($db_connect, $select_contact);
$after_assoc_contact = mysqli_fetch_assoc($select_contact_result);

// Portfolio-works
$select_works = "SELECT * FROM works WHERE active_status=1";
$select_works_result = mysqli_query($db_connect, $select_works);
?>

<!doctype html>
<html class="no-js" lang="en">

<!-- Mirrored from themebeyond.com/html/kufa/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Feb 2020 06:27:43 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Kufa - Personal Portfolio HTML5 Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
        <!-- Place favicon.ico in the root directory -->

		<!-- CSS here -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="css/fontawesome-all.min.css">
        <link rel="stylesheet" href="css/flaticon.css">
        <link rel="stylesheet" href="css/slick.css">
        <link rel="stylesheet" href="css/aos.css">
        <link rel="stylesheet" href="css/default.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
    </head>
    <body class="theme-bg">

        <!-- preloader -->
        <div id="preloader">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object" id="object_one"></div>
                    <div class="object" id="object_two"></div>
                    <div class="object" id="object_three"></div>
                </div>
            </div>
        </div>
        <!-- preloader-end -->

        <!-- header-start -->
        <header>
            <div id="header-sticky" class="transparent-header">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-menu">
                                <nav class="navbar navbar-expand-lg">
                                    <a href="index.html" class="navbar-brand logo-sticky-none"><img src="uploads/logos/<?=$after_assoc_logo['logo']?>" alt="Logo"></a>
                                    <a href="index.html" class="navbar-brand s-logo-none"><img src="img/logo/s_logo.png" alt="Logo"></a>
                                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#navbarNav">
                                        <span class="navbar-icon"></span>
                                        <span class="navbar-icon"></span>
                                        <span class="navbar-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarNav">
                                        <ul class="navbar-nav ml-auto">
                                            <?php foreach($select_menu_result as $menu){ ?>
                                                <li class="nav-item"><a class="nav-link" href="#<?=$menu['menu_link']?>"><?=$menu['menu_name']?></a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                    <div class="header-btn">
                                        <a href="#" class="off-canvas-menu menu-tigger"><i class="flaticon-menu"></i></a>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- offcanvas-start -->
            <div class="extra-info">
                <div class="close-icon menu-close">
                    <button>
                        <i class="far fa-window-close"></i>
                    </button>
                </div>
                <div class="logo-side mb-30">
                    <a href="index-2.html">
                        <img src="uploads/logos/<?=$after_assoc_logo['logo']?>" alt="" />
                    </a>
                </div>
                <div class="side-info mb-30">
                    <div class="contact-list mb-30">
                        <h4>Office Address</h4>
                        <p><?=$after_assoc_contact['address']?></p>
                    </div>
                    <div class="contact-list mb-30">
                        <h4>Phone Number</h4>
                        <p><?=$after_assoc_contact['phone']?></p>
                    </div>
                    <div class="contact-list mb-30">
                        <h4>Email Address</h4>
                        <p><?=$after_assoc_contact['email']?></p>
                    </div>
                </div>
                <div class="social-icon-right mt-20">
                    <?php foreach($select_icons_result as $icon){ ?>
                        <a href="<?=$icon['icon_link']?>" target="_blank"><i class="fab <?=$icon['icon_class']?>"></i></a>
                    <?php } ?>
                </div>
            </div>
            <div class="offcanvas-overly"></div>
            <!-- offcanvas-end -->
        </header>
        <!-- header-end -->

        <!-- main-area -->
        <main>

            <!-- banner-area -->
            <section id="home" class="banner-area banner-bg fix">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-7 col-lg-6">
                            <div class="banner-content">
                                <h6 class="wow fadeInUp" data-wow-delay="0.2s"><?=$after_assoc_banner['opening']?>!</h6>
                                <h2 class="wow fadeInUp" data-wow-delay="0.4s"><?=$after_assoc_banner['title']?></h2>
                                <p class="wow fadeInUp" data-wow-delay="0.6s"><?=$after_assoc_banner['description']?></p>
                                <div class="banner-social wow fadeInUp" data-wow-delay="0.8s">
                                    <ul>
                                    <?php foreach($select_icons_result as $icon){ ?>
                                        <li><a href="<?=$icon['icon_link']?>" target="_blank"><i class="fab <?=$icon['icon_class']?>"></i></a></li>
                                    <?php } ?>
                                    </ul>
                                </div>
                                <a href="#" class="btn wow fadeInUp" data-wow-delay="1s"><?=$after_assoc_banner['btn']?></a>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-6 d-none d-lg-block">
                            <div class="banner-img text-right">
                                <img src="uploads/banners/<?=$after_assoc_banner['image']?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner-shape"><img src="img/shape/dot_circle.png" class="rotateme" alt="img"></div>
            </section>
            <!-- banner-area-end -->

            <!-- about-area-->
            <section id="about" class="about-area primary-bg pt-120 pb-120">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="about-img">
                                <img src="uploads/about/<?=$after_assoc_about['about_img']?>" title="me-01" alt="me-01">
                            </div>
                        </div>
                        <div class="col-lg-6 pr-90">
                            <div class="section-title mb-25">
                                <span>Introduction</span>
                                <h2><?=$after_assoc_about['about_title']?></h2>
                            </div>
                            <div class="about-content">
                                <p><?=$after_assoc_about['description']?></p>
                                <h3>Education:</h3>
                            </div>
                            <!-- Education Item -->
                            <?php foreach($select_edu_result as $education){ ?>
                                <div class="education">
                                    <div class="year"><?=$education['edu_year']?></div>
                                    <div class="line"></div>
                                    <div class="location">
                                        <span><?=$education['edu_name']?></span>
                                        <div class="progressWrapper">
                                            <div class="progress">
                                                <div class="progress-bar wow slideInLefts" data-wow-delay="0.2s" data-wow-duration="2s" role="progressbar" style="width: <?=$education['percentage']?>%;" aria-valuenow="<?=$education['percentage']?>" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <!-- End Education Item -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- about-area-end -->

            <!-- Services-area -->
            <section id="service" class="services-area pt-120 pb-50">
				<div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>WHAT WE DO</span>
                                <h2>Services and Solutions</h2>
                            </div>
                        </div>
                    </div>
					<div class="row">
                        <?php foreach($select_services_result as $services){ ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="icon_box_01 wow fadeInLeft" data-wow-delay="0.2s">
                                    <i class="fab <?=$services['icon']?>"></i>
                                    <h3><?=$services['service_title']?></h3>
                                    <p>
                                    <?=$services['service_description']?>
                                    </p>
                                </div>
                            </div>
                        <?php } ?>
					</div>
				</div>
			</section>
            <!-- Services-area-end -->

            <!-- Portfolios-area -->
            <section id="portfolio" class="portfolio-area primary-bg pt-120 pb-90">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>Portfolio Showcase</span>
                                <h2>My Recent Best Works</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach($select_works_result as $work){ ?>
                            <div class="col-lg-4 col-md-6 pitem">
                                <div class="speaker-box">
                                    <div class="speaker-thumb">
                                        <img src="uploads/works/<?=$work['image']?>" alt="img">
                                    </div>
                                    <div class="speaker-overlay">
                                        <span><?=$work['category']?></span>
                                        <h4><a href="portfolio-single.php?id=<?=$work['id']?>"><?=$work['title']?></a></h4>
                                        <a href="portfolio-single.php?id=<?=$work['id']?>" class="arrow-btn"><?=$work['button']?> <span></span></a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
            <!-- services-area-end -->


            <!-- fact-area -->
            <section class="fact-area">
                <div class="container">
                    <div class="fact-wrap">
                        <div class="row justify-content-between">
                            <?php foreach($select_counters_result as $counter){ ?>
                                <div class="col-xl-2 col-lg-3 col-sm-6">
                                    <div class="fact-box text-center mb-50">
                                        <div class="fact-icon">
                                            <i class="<?=$counter['counter_icon']?>"></i>
                                        </div>
                                        <div class="fact-content">
                                            <h2><span class="count"><?=$counter['counter_num']?></span></h2>
                                            <span><?=$counter['counter_title']?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- fact-area-end -->

            <!-- testimonial-area -->
            <section class="testimonial-area primary-bg pt-115 pb-115">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>testimonial</span>
                                <h2>happy customer quotes</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10">
                            <div class="testimonial-active">
                                <?php foreach($select_testimonial_result as $testimonial){ ?>
                                    <div class="single-testimonial text-center">
                                        <div class="testi-avatar">
                                            <img src="uploads/testimonials/<?=$testimonial['photo']?>" alt="img">
                                        </div>
                                        <div class="testi-content">
                                            <h4><span>“</span> <?=$testimonial['review']?><span>”</span></h4>
                                            <div class="testi-avatar-info">
                                                <h5><?=$testimonial['name']?></h5>
                                                <span><?=$testimonial['head']?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- testimonial-area-end -->

            <!-- brand-area -->
            <div class="barnd-area pt-100 pb-100">
                <div class="container">
                    <div class="row brand-active">
                        <?php foreach($select_brands_result as $brand){ ?>
                            <div class="col-xl-3">
                                <div class="single-brand">
                                    <img src="uploads/brands/<?=$brand['brand_photo']?>" alt="img">
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!-- brand-area-end -->

            <!-- contact-area -->
            <section id="contact" class="contact-area primary-bg pt-120 pb-120">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="section-title mb-20">
                                <span>information</span>
                                <h2>Contact Information</h2>
                            </div>
                            <div class="contact-content">
                                <p><?=$after_assoc_contact['contact_info']?></p>
                                <h5>OFFICE IN <span><?=$after_assoc_contact['office']?></span></h5>
                                <div class="contact-list">
                                    <ul>
                                        <li><i class="fas fa-map-marker"></i><span>Address :</span><?=$after_assoc_contact['address']?></li>
                                        <li><i class="fas fa-phone"></i><span>Phone :</span><?=$after_assoc_contact['phone']?></li>
                                        <li><i class="fas fa-envelope"></i><span>e-mail :</span><?=$after_assoc_contact['email']?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="contact-form">
                                <form action="messages/message_post.php" method="POST">
                                    <input type="text" name="name" placeholder="your name *">
                                    <input type="email" name="email" placeholder="your email *">
                                    <textarea name="message" id="message" placeholder="your message *"></textarea>
                                    <button class="btn">BUY TICKET</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- contact-area-end -->

        </main>
        <!-- main-area-end -->

        <!-- footer -->
        <footer>
            <div class="copyright-wrap">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="copyright-text text-center">
                                <p>Copyright© <span>Kufa</span> | All Rights Reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer-end -->





		<!-- JS here -->
        <script src="js/vendor/jquery-1.12.4.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/isotope.pkgd.min.js"></script>
        <script src="js/one-page-nav-min.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/ajax-form.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/aos.js"></script>
        <script src="js/jquery.waypoints.min.js"></script>
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="js/imagesloaded.pkgd.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
    </body>

<!-- Mirrored from themebeyond.com/html/kufa/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Feb 2020 06:28:17 GMT -->
</html>
