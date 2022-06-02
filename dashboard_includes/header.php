<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <link rel="stylesheet" href="/kufa/css/fontawesome-all.min.css">

    <link rel="stylesheet" href="/kufa/css/flaticon.css">

    <title>Kufa</title>

    <!-- vendor css -->
    <link href="/kufa/dashboard_assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/kufa/dashboard_assets/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="/kufa/dashboard_assets/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">

    <!-- Font Awesome css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Starlight CSS -->
    <link rel="stylesheet" href="/kufa/dashboard_assets/css/starlight.css">
  </head>

  <body>

    <!-- ########## START: LEFT PANEL ########## -->
    <div class="sl-logo"><a href=""><i class="icon ion-android-star-outline"></i> Kufa</a></div>
    <div class="sl-sideleft">
      <div class="input-group input-group-search">
        <input type="search" name="search" class="form-control" placeholder="Search">
        <span class="input-group-btn">
          <button class="btn"><i class="fa fa-search"></i></button>
        </span><!-- input-group-btn -->
      </div><!-- input-group -->

      <label class="sidebar-label">Navigation</label>
      <div class="sl-sideleft-menu">
            <a href="/kufa/admin.php" class="sl-menu-link">
              <div class="sl-menu-item">
                  <i class="menu-item-icon icon fa fa-home tx-26"></i>
                  <span class="menu-item-label">Home</span>
              </div><!-- menu-item -->
            </a><!-- sl-menu-link -->

            <a href="/kufa/messages/inbox.php" class="sl-menu-link">
              <div class="sl-menu-item">
                  <i class="menu-item-icon icon fa fa-envelope-open tx-20"></i>
                  <span class="menu-item-label">Inbox</span>
              </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <a href="/kufa/users/register.php" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon fa fa-user-plus tx-20"></i>
                <span class="menu-item-label">Add User</span>
            </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
           
            <?php if($_SESSION['role'] != 0){ ?>
              <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon fa fa-users tx-20"></i>
                    <span class="menu-item-label">Users</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
              </a><!-- sl-menu-link -->
            <?php } ?> 

            <ul class="sl-menu-sub nav flex-column">
              <li class="nav-item"><a href="/kufa/users/users.php" class="nav-link"><i class="menu-item-icon icon fa fa-user-secret tx-15"></i>User Info</a></li>

              <?php if($_SESSION['role'] != 0 && $_SESSION['role'] != 3){ ?>
                <li class="nav-item"><a href="/kufa/users/trash.php" class="nav-link"><i class="menu-item-icon icon fa fa-trash tx-15"></i>Trash</a></li>
              <?php } ?>
            </ul>

            <!-- Logo -->
            <?php if($_SESSION['role'] != 0){ ?>
              <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon fa fa-odnoklassniki tx-20"></i>
                    <span class="menu-item-label">Logo</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
              </a><!-- sl-menu-link -->
            <?php } ?> 

            <ul class="sl-menu-sub nav flex-column">
              <li class="nav-item"><a href="/kufa/logos/logos.php" class="nav-link"><i class="menu-item-icon icon fa fa-info tx-15"></i>Logo info</a></li>

              <?php if($_SESSION['role'] != 0 && $_SESSION['role'] != 3){ ?>
                <li class="nav-item"><a href="/kufa/logos/add_logo.php" class="nav-link"><i class="menu-item-icon icon fa fa-plus tx-15"></i>Add Logo</a></li>
              <?php } ?>

              <?php if($_SESSION['role'] != 0 && $_SESSION['role'] != 3){ ?>
                <li class="nav-item"><a href="/kufa/logos/logo_trash.php" class="nav-link"><i class="menu-item-icon icon fa fa-trash tx-15"></i>Trash</a></li>
              <?php } ?>
            </ul>

            <!-- Menu -->
            <?php if($_SESSION['role'] != 0){ ?>
              <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon fa fa-bars tx-20"></i>
                    <span class="menu-item-label">Menu</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
              </a><!-- sl-menu-link -->
            <?php } ?> 

            <ul class="sl-menu-sub nav flex-column">
              <li class="nav-item"><a href="/kufa/menus/menus.php" class="nav-link"><i class="menu-item-icon icon fa fa-info tx-15"></i>Menu info</a></li>

              <?php if($_SESSION['role'] != 0 && $_SESSION['role'] != 3){ ?>
                <li class="nav-item"><a href="/kufa/menus/add_menu.php" class="nav-link"><i class="menu-item-icon icon fa fa-plus tx-15"></i>Add Menu</a></li>
              <?php } ?>

              <?php if($_SESSION['role'] != 0 && $_SESSION['role'] != 3){ ?>
                <li class="nav-item"><a href="/kufa/menus/menu_trash.php" class="nav-link"><i class="menu-item-icon icon fa fa-trash tx-15"></i>Trash</a></li>
              <?php } ?>
            </ul>

            <!-- Banner -->
            <?php if($_SESSION['role'] != 0){ ?>
              <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon fa fa-picture-o tx-20"></i>
                    <span class="menu-item-label">Banner</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
              </a><!-- sl-menu-link -->
            <?php } ?> 

            <ul class="sl-menu-sub nav flex-column">
              <li class="nav-item"><a href="/kufa/banners/banners.php" class="nav-link"><i class="menu-item-icon icon fa fa-info tx-15"></i>Banner Info</a></li>

              <?php if($_SESSION['role'] != 0 && $_SESSION['role'] != 3){ ?>
                <li class="nav-item"><a href="/kufa/banners/add_banner.php" class="nav-link"><i class="menu-item-icon icon fa fa-plus tx-15"></i>Add Banner</a></li>
              <?php } ?>

              <?php if($_SESSION['role'] != 0 && $_SESSION['role'] != 3){ ?>
                <li class="nav-item"><a href="/kufa/banners/banner_trash.php" class="nav-link"><i class="menu-item-icon icon fa fa-trash tx-15"></i>Trash</a></li>
              <?php } ?>
            </ul>

            <!-- Banner Icon -->
            <?php if($_SESSION['role'] != 0){ ?>
              <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon fa fa-italic tx-20"></i>
                    <span class="menu-item-label">Icon</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
              </a><!-- sl-menu-link -->
            <?php } ?> 

            <ul class="sl-menu-sub nav flex-column">
              <li class="nav-item"><a href="/kufa/banner_icon/icons.php" class="nav-link"><i class="menu-item-icon icon fa fa-info tx-15"></i>Icon info</a></li>

              <?php if($_SESSION['role'] != 0 && $_SESSION['role'] != 3){ ?>
                <li class="nav-item"><a href="/kufa/banner_icon/add_icon.php" class="nav-link"><i class="menu-item-icon icon fa fa-plus tx-15"></i>Add Icon</a></li>
              <?php } ?>

              <?php if($_SESSION['role'] != 0 && $_SESSION['role'] != 3){ ?>
                <li class="nav-item"><a href="/kufa/banner_icon/icon_trash.php" class="nav-link"><i class="menu-item-icon icon fa fa-trash tx-15"></i>Trash</a></li>
              <?php } ?>
            </ul>

            <!--About- Education Bar -->
            <?php if($_SESSION['role'] != 0){ ?>
              <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon fa fa-graduation-cap tx-20"></i>
                    <span class="menu-item-label">Education</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
              </a><!-- sl-menu-link -->
            <?php } ?> 

            <ul class="sl-menu-sub nav flex-column">
              <li class="nav-item"><a href="/kufa/educations/educations.php" class="nav-link"><i class="menu-item-icon icon fa fa-info tx-15"></i>Education info</a></li>

              <?php if($_SESSION['role'] != 0 && $_SESSION['role'] != 3){ ?>
                <li class="nav-item"><a href="/kufa/educations/add_education.php" class="nav-link"><i class="menu-item-icon icon fa fa-plus tx-15"></i>Add Education</a></li>
              <?php } ?>

              <?php if($_SESSION['role'] != 0 && $_SESSION['role'] != 3){ ?>
                <li class="nav-item"><a href="/kufa/educations/education_trash.php" class="nav-link"><i class="menu-item-icon icon fa fa-trash tx-15"></i>Trash</a></li>
              <?php } ?>
            </ul>

            <!-- About -->
            <?php if($_SESSION['role'] != 0){ ?>
              <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon fa fa-question tx-20"></i>
                    <span class="menu-item-label">About</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
              </a><!-- sl-menu-link -->
            <?php } ?> 

            <ul class="sl-menu-sub nav flex-column">
              <li class="nav-item"><a href="/kufa/about/about.php" class="nav-link"><i class="menu-item-icon icon fa fa-info tx-15"></i>About info</a></li>

              <?php if($_SESSION['role'] != 0 && $_SESSION['role'] != 3){ ?>
                <li class="nav-item"><a href="/kufa/about/add_about.php" class="nav-link"><i class="menu-item-icon icon fa fa-plus tx-15"></i>Add About</a></li>
              <?php } ?>

              <?php if($_SESSION['role'] != 0 && $_SESSION['role'] != 3){ ?>
                <li class="nav-item"><a href="/kufa/about/about_trash.php" class="nav-link"><i class="menu-item-icon icon fa fa-trash tx-15"></i>Trash</a></li>
              <?php } ?>
            </ul>

            <!-- Service -->
            <?php if($_SESSION['role'] != 0){ ?>
              <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon fa fa-briefcase tx-20"></i>
                    <span class="menu-item-label">Service</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
              </a><!-- sl-menu-link -->
            <?php } ?> 

            <ul class="sl-menu-sub nav flex-column">
              <li class="nav-item"><a href="/kufa/services/services.php" class="nav-link"><i class="menu-item-icon icon fa fa-info tx-15"></i>Service info</a></li>

              <?php if($_SESSION['role'] != 0 && $_SESSION['role'] != 3){ ?>
                <li class="nav-item"><a href="/kufa/services/add_service.php" class="nav-link"><i class="menu-item-icon icon fa fa-plus tx-15"></i>Add Service</a></li>
              <?php } ?>

              <?php if($_SESSION['role'] != 0 && $_SESSION['role'] != 3){ ?>
                <li class="nav-item"><a href="/kufa/services/service_trash.php" class="nav-link"><i class="menu-item-icon icon fa fa-trash tx-15"></i>Trash</a></li>
              <?php } ?>
            </ul>

            <!-- Works -->
            <?php if($_SESSION['role'] != 0){ ?>
              <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon fa fa-th tx-20"></i>
                    <span class="menu-item-label">Work</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
              </a><!-- sl-menu-link -->
            <?php } ?> 

            <ul class="sl-menu-sub nav flex-column">
              <li class="nav-item"><a href="/kufa/works/works.php" class="nav-link"><i class="menu-item-icon icon fa fa-info tx-15"></i>Work info</a></li>

              <?php if($_SESSION['role'] != 0 && $_SESSION['role'] != 3){ ?>
                <li class="nav-item"><a href="/kufa/works/add_work.php" class="nav-link"><i class="menu-item-icon icon fa fa-plus tx-15"></i>Add Work</a></li>
              <?php } ?>

              <?php if($_SESSION['role'] != 0 && $_SESSION['role'] != 3){ ?>
                <li class="nav-item"><a href="/kufa/works/work_trash.php" class="nav-link"><i class="menu-item-icon icon fa fa-trash tx-15"></i>Trash</a></li>
              <?php } ?>
            </ul>

            <!-- Counter Part -->
            <?php if($_SESSION['role'] != 0){ ?>
              <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon fa fa-list-ol tx-20"></i>
                    <span class="menu-item-label">Counter Up</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
              </a><!-- sl-menu-link -->
            <?php } ?> 

            <ul class="sl-menu-sub nav flex-column">
              <li class="nav-item"><a href="/kufa/counters/counters.php" class="nav-link"><i class="menu-item-icon icon fa fa-info tx-15"></i>Counter info</a></li>

              <?php if($_SESSION['role'] != 0 && $_SESSION['role'] != 3){ ?>
                <li class="nav-item"><a href="/kufa/counters/add_counter.php" class="nav-link"><i class="menu-item-icon icon fa fa-plus tx-15"></i>Add Counter</a></li>
              <?php } ?>

              <?php if($_SESSION['role'] != 0 && $_SESSION['role'] != 3){ ?>
                <li class="nav-item"><a href="/kufa/counters/counter_trash.php" class="nav-link"><i class="menu-item-icon icon fa fa-trash tx-15"></i>Trash</a></li>
              <?php } ?>
            </ul>

            <!-- Testimonial Part -->
            <?php if($_SESSION['role'] != 0){ ?>
              <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon fa fa-comment tx-20"></i>
                    <span class="menu-item-label">Testimonial</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
              </a><!-- sl-menu-link -->
            <?php } ?> 

            <ul class="sl-menu-sub nav flex-column">
              <li class="nav-item"><a href="/kufa/testimonials/testimonials.php" class="nav-link"><i class="menu-item-icon icon fa fa-info tx-15"></i>Testimonial info</a></li>

              <?php if($_SESSION['role'] != 0 && $_SESSION['role'] != 3){ ?>
                <li class="nav-item"><a href="/kufa/testimonials/add_testimonial.php" class="nav-link"><i class="menu-item-icon icon fa fa-plus tx-15"></i>Add Testimonial</a></li>
              <?php } ?>

              <?php if($_SESSION['role'] != 0 && $_SESSION['role'] != 3){ ?>
                <li class="nav-item"><a href="/kufa/testimonials/testimonial_trash.php" class="nav-link"><i class="menu-item-icon icon fa fa-trash tx-15"></i>Trash</a></li>
              <?php } ?>
            </ul>

            <!-- Brands -->
            <?php if($_SESSION['role'] != 0){ ?>
              <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon fa fa-bolt tx-20"></i>
                    <span class="menu-item-label">Brand</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
              </a><!-- sl-menu-link -->
            <?php } ?> 

            <ul class="sl-menu-sub nav flex-column">
              <li class="nav-item"><a href="/kufa/brands/brands.php" class="nav-link"><i class="menu-item-icon icon fa fa-info tx-15"></i>Brand info</a></li>

              <?php if($_SESSION['role'] != 0 && $_SESSION['role'] != 3){ ?>
                <li class="nav-item"><a href="/kufa/brands/add_brand.php" class="nav-link"><i class="menu-item-icon icon fa fa-plus tx-15"></i>Add Brand</a></li>
              <?php } ?>

              <?php if($_SESSION['role'] != 0 && $_SESSION['role'] != 3){ ?>
                <li class="nav-item"><a href="/kufa/brands/brand_trash.php" class="nav-link"><i class="menu-item-icon icon fa fa-trash tx-15"></i>Trash</a></li>
              <?php } ?>
            </ul>

            <!-- Contact Information -->
            <?php if($_SESSION['role'] != 0){ ?>
              <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon fa fa-phone tx-20"></i>
                    <span class="menu-item-label">Contact</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
              </a><!-- sl-menu-link -->
            <?php } ?> 

            <ul class="sl-menu-sub nav flex-column">
              <li class="nav-item"><a href="/kufa/contacts/contacts.php" class="nav-link"><i class="menu-item-icon icon fa fa-info tx-15"></i>Contact info</a></li>

              <?php if($_SESSION['role'] != 0 && $_SESSION['role'] != 3){ ?>
                <li class="nav-item"><a href="/kufa/contacts/add_contact.php" class="nav-link"><i class="menu-item-icon icon fa fa-plus tx-15"></i>Add Contact</a></li>
              <?php } ?>

              <?php if($_SESSION['role'] != 0 && $_SESSION['role'] != 3){ ?>
                <li class="nav-item"><a href="/kufa/contacts/contact_trash.php" class="nav-link"><i class="menu-item-icon icon fa fa-trash tx-15"></i>Trash</a></li>
              <?php } ?>
            </ul>
      </div><!-- sl-sideleft-menu -->
      

      <br>
    </div><!-- sl-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    <div class="sl-header">
      <div class="sl-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
      </div><!-- sl-header-left -->
      <div class="sl-header-right">
        <nav class="nav">
          <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name"><?=$_SESSION['name']?></span>
              <img src="/kufa/uploads/users/<?=$_SESSION['image']?>" class="wd-32 square" alt="">
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-200">
              <ul class="list-unstyled user-profile-nav">
                <li><a href=""><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
                <li><a href=""><i class="icon ion-ios-gear-outline"></i> Settings</a></li>
                <li><a href=""><i class="icon ion-ios-download-outline"></i> Downloads</a></li>
                <li><a href=""><i class="icon ion-ios-star-outline"></i> Favorites</a></li>
                <li><a href=""><i class="icon ion-ios-folder-outline"></i> Collections</a></li>
                <li><a href="/kufa/logout.php"><i class="icon ion-power"></i> Sign Out</a></li>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>
        <div class="navicon-right">
          <a id="btnRightMenu" href="" class="pos-relative">
            <i class="icon ion-ios-bell-outline"></i>
            <!-- start: if statement -->
            <span class="square-8 bg-danger"></span>
            <!-- end: if statement -->
          </a>
        </div><!-- navicon-right -->
      </div><!-- sl-header-right -->
    </div><!-- sl-header -->
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
    <div class="sl-sideright">
      <ul class="nav nav-tabs nav-fill sidebar-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" role="tab" href="#messages">Messages (2)</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" role="tab" href="#notifications">Notifications (8)</a>
        </li>
      </ul><!-- sidebar-tabs -->

      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane pos-absolute a-0 mg-t-60 active" id="messages" role="tabpanel">
          <div class="media-list">
            <!-- loop starts here -->
            <a href="" class="media-list-link">
              <div class="media">
                <img src="/kufa/dashboard_assets/img/img3.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Donna Seay</p>
                  <span class="d-block tx-11 tx-gray-500">2 minutes ago</span>
                  <p class="tx-13 mg-t-10 mg-b-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
                </div>
              </div><!-- media -->
            </a>
            <!-- loop ends here -->
            <a href="" class="media-list-link">
              <div class="media">
                <img src="/kufa/dashboard_assets/img/img4.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Samantha Francis</p>
                  <span class="d-block tx-11 tx-gray-500">3 hours ago</span>
                  <p class="tx-13 mg-t-10 mg-b-0">My entire soul, like these sweet mornings of spring.</p>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link">
              <div class="media">
                <img src="/kufa/dashboard_assets/img/img7.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Robert Walker</p>
                  <span class="d-block tx-11 tx-gray-500">5 hours ago</span>
                  <p class="tx-13 mg-t-10 mg-b-0">I should be incapable of drawing a single stroke at the present moment...</p>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link">
              <div class="media">
                <img src="/kufa/dashboard_assets/img/img5.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Larry Smith</p>
                  <span class="d-block tx-11 tx-gray-500">Yesterday, 8:34pm</span>

                  <p class="tx-13 mg-t-10 mg-b-0">When, while the lovely valley teems with vapour around me, and the meridian sun strikes...</p>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link">
              <div class="media">
                <img src="/kufa/dashboard_assets/img/img3.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Donna Seay</p>
                  <span class="d-block tx-11 tx-gray-500">Jan 23, 2:32am</span>
                  <p class="tx-13 mg-t-10 mg-b-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
                </div>
              </div><!-- media -->
            </a>
          </div><!-- media-list -->
          <div class="pd-15">
            <a href="" class="btn btn-secondary btn-block bd-0 rounded-0 tx-10 tx-uppercase tx-mont tx-medium tx-spacing-2">View More Messages</a>
          </div>
        </div><!-- #messages -->

        <div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto" id="notifications" role="tabpanel">
          <div class="media-list">
            <!-- loop starts here -->
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="/kufa/dashboard_assets/img/img8.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 18 others in a post.</p>
                  <span class="tx-12">October 03, 2017 8:45am</span>
                </div>
              </div><!-- media -->
            </a>
            <!-- loop ends here -->
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="/kufa/dashboard_assets/img/img9.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Mellisa Brown</strong> appreciated your work <strong class="tx-medium tx-gray-800">The Social Network</strong></p>
                  <span class="tx-12">October 02, 2017 12:44am</span>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="/kufa/dashboard_assets/img/img10.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700">20+ new items added are for sale in your <strong class="tx-medium tx-gray-800">Sale Group</strong></p>
                  <span class="tx-12">October 01, 2017 10:20pm</span>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="/kufa/dashboard_assets/img/img5.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Julius Erving</strong> wants to connect with you on your conversation with <strong class="tx-medium tx-gray-800">Ronnie Mara</strong></p>
                  <span class="tx-12">October 01, 2017 6:08pm</span>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="/kufa/dashboard_assets/img/img8.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 12 others in a post.</p>
                  <span class="tx-12">September 27, 2017 6:45am</span>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="/kufa/dashboard_assets/img/img10.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700">10+ new items added are for sale in your <strong class="tx-medium tx-gray-800">Sale Group</strong></p>
                  <span class="tx-12">September 28, 2017 11:30pm</span>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="/kufa/dashboard_assets/img/img9.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Mellisa Brown</strong> appreciated your work <strong class="tx-medium tx-gray-800">The Great Pyramid</strong></p>
                  <span class="tx-12">September 26, 2017 11:01am</span>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="/kufa/dashboard_assets/img/img5.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Julius Erving</strong> wants to connect with you on your conversation with <strong class="tx-medium tx-gray-800">Ronnie Mara</strong></p>
                  <span class="tx-12">September 23, 2017 9:19pm</span>
                </div>
              </div><!-- media -->
            </a>
          </div><!-- media-list -->
        </div><!-- #notifications -->

      </div><!-- tab-content -->
    </div><!-- sl-sideright -->
    <!-- ########## END: RIGHT PANEL ########## --->
    