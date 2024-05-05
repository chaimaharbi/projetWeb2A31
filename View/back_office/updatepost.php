<?php

require_once('../../controller/postC.php');
require_once('../../model/post.php');

// create 
$post = null;
// create an instance of the controller
$postC = new postC();

if (
    isset($_POST["idpost"]) &&
    isset($_POST["datepost"]) &&
    isset($_POST["adress"]) &&
    isset($_POST["titre"]) &&
    isset($_POST["des"]) &&
    isset($_POST["nblike"]) &&
    isset($_POST["nbdislike"]) &&
    isset($_POST["image"])
) {
    if (
        !empty($_POST["idpost"]) &&
        !empty($_POST["datepost"]) &&
        !empty($_POST["adress"]) &&
        !empty($_POST["titre"]) &&
        !empty($_POST["des"]) &&
        !empty($_POST["nblike"]) &&
        !empty($_POST["nbdislike"]) &&
        !empty($_POST["image"])
    ) {

        $post = new post(

            $_POST["idpost"],
            $_POST["datepost"],
            $_POST["adress"],
            $_POST["titre"],
            $_POST["des"],
            $_POST["nblike"],
            $_POST["nbdislike"],
            $_POST["image"]
        );

        $postC->updatepost($post, $_GET['idpost']);

        header('Location: listepost.php');
    }
}

require_once('../../controller/imageC.php');

// Create an instance of UserC class
$image = new imageC();

// Fetch the list of users
$tab = $image->listeimage();
?>

<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from code-theme.com/html/findhouses/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 23 Apr 2023 19:21:14 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="html 5 template">
    <meta name="author" content="">
    <title>Find Houses - HTML5 Template</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="assets/css/search.css">
    <link rel="stylesheet" href="assets/css/dashbord-mobile-menu.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/swiper.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/lightcase.css">
    <link rel="stylesheet" href="assets/css/owl-carousel.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/menu.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" id="color" href="css/default.css">
</head>

<body class="maxw1600 m0a dashboard-bd">
    <!-- Wrapper -->
    <div id="wrapper" class="int_main_wraapper">
        <!-- START SECTION HEADINGS -->
        <!-- Header Container
        ================================================== -->
        <div class="dash-content-wrap">
            <header id="header-container" class="db-top-header">
                <!-- Header -->
                <div id="header">
                    <div class="container-fluid">
                        <!-- Left Side Content -->
                        <div class="left-side">
                            <!-- Logo -->
                            <div id="logo">
                                <a href="index.html"><img src="images/logo.svg" alt=""></a>
                            </div>
                            <!-- Mobile Navigation -->
                            <div class="mmenu-trigger">
                                <button class="hamburger hamburger--collapse" type="button">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                            <!-- Main Navigation -->

                            <div class="clearfix"></div>
                            <!-- Main Navigation / End -->
                        </div>
                        <!-- Left Side Content / End -->
                        <!-- Right Side Content / -->
                        <div class="header-user-menu user-menu">
                            <!--div class="header-user-name">
                                <span><img src="assets/images/testimonials/ts-1.jpg" alt=""></span>Hi, Mary!
                            </div-->
                            <ul>
                                <li><a href="#">Log Out</a></li>
                            </ul>
                        </div>
                        <!-- Right Side Content / End -->
                    </div>
                </div>
                <!-- Header / End -->
            </header>
        </div>
        <div class="clearfix"></div>
        <!-- Header Container / End -->

        <!-- START SECTION DASHBOARD -->
        <section class="user-page section-padding">
            <div class="container-fluid">
                <div class="row justify-content-center align-items-center">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-3 col-md-12 col-xs-12 pl-0 pr-0 user-dash">
                                <div class="user-profile-box mb-0">
                                    <div class="sidebar-header"><img src="assets/images/logo-blue.svg" alt="header-logo2.png">
                                    </div>
                                    <div class="detail clearfix">
                                        <ul class="mb-0">
                                            <li>
                                                <a class="active" href="dashboard.html">
                                                    <i class="fa fa-map-marker"></i> Dashboard
                                                </a>
                                            </li>
                                            <li>
                                                <a>
                                                    <i class="fa fa-user"></i>User
                                                </a>
                                            </li>

                                            <li>
                                                <a href="my-listings.html">
                                                    <i class="fa fa-list" aria-hidden="true"></i>My Properties
                                                </a>
                                            </li>

                                            <li>
                                                <a href="index.html">
                                                    <i class="fas fa-sign-out-alt"></i>Log Out
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-12 col-xs-12 pl-0 user-dash2">
                                <div class="col-lg-12 mobile-dashbord dashbord">
                                    <div class="dashboard_navigationbar dashxl">
                                        <div class="dropdown">
                                            <button onclick="myFunction()" class="dropbtn"><i class="fa fa-bars pr10 mr-2"></i>
                                                Dashboard Navigation</button>
                                            <ul id="myDropdown" class="dropdown-content">
                                                <li>
                                                    <a class="active" href="dashboard.html">
                                                        <i class="fa fa-map-marker mr-3"></i> Dashboard
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="user-profile.html">
                                                        <i class="fa fa-user mr-3"></i>Profile
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="my-listings.html">
                                                        <i class="fa fa-list mr-3" aria-hidden="true"></i>My Properties
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="favorited-listings.html">
                                                        <i class="fa fa-heart mr-3" aria-hidden="true"></i>Favorited Properties
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="add-property.html">
                                                        <i class="fa fa-list mr-3" aria-hidden="true"></i>Add Property
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="payment-method.html">
                                                        <i class="fas fa-credit-card mr-3"></i>Payments
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="invoice.html">
                                                        <i class="fas fa-paste mr-3"></i>Invoices
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="change-password.html">
                                                        <i class="fa fa-lock mr-3"></i>Change Password
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="index.html">
                                                        <i class="fas fa-sign-out-alt mr-3"></i>Log Out
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- Ajout de la classe align-items-center pour centrer verticalement -->
                                <div class="col-lg-10"> <!-- Colonne Bootstrap pour le contenu -->
                                    <!-- Vos données PHP ici -->
                                    <?php
                                    if (isset($_GET['idpost'])) {
                                        $oldpost = $postC->showpost($_GET['idpost']);
                                    ?>
                                        <form method="POST">
                                            <div class="card-body p-3 pb-0">

                                                <ul class="list-group">
                                                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                                        <div class="d-flex flex-column">
                                                            <h6 class="mb-1 text-dark font-weight-bold text-sm">
                                                                <label for="idpost">ID post :</label>
                                                            </h6>
                                                            <span class="text">
                                                                <input type="text" id="idpost" name="idpost" value="<?php echo $oldpost['idpost'] ?>" readonly />
                                                            </span>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <ul class="list-group">
                                                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                                        <div class="d-flex flex-column">
                                                            <h6 class="mb-1 text-dark font-weight-bold text-sm">
                                                                <label for="datepost">Date post :</label>
                                                            </h6>
                                                            <span class="text">
                                                                <input type="date" id="datepost" name="datepost" value="<?php echo $oldpost['datepost'] ?>" />
                                                            </span>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <ul class="list-group">
                                                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                                        <div class="d-flex flex-column">
                                                            <h6 class="mb-1 text-dark font-weight-bold text-sm">
                                                                <label for="adress">Email :</label>
                                                            </h6>
                                                            <span class="text">
                                                                <input type="text" id="adress" name="adress" value="<?php echo $oldpost['adress'] ?>" />
                                                            </span>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <ul class="list-group">
                                                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                                        <div class="d-flex flex-column">
                                                            <h6 class="mb-1 text-dark font-weight-bold text-sm">
                                                                <label for="titre">Titre :</label>
                                                            </h6>
                                                            <span class="text">
                                                                <input type="text" id="titre" name="titre" value="<?php echo $oldpost['titre'] ?>" />
                                                            </span>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <ul class="list-group">
                                                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                                        <div class="d-flex flex-column">
                                                            <h6 class="mb-1 text-dark font-weight-bold text-sm">
                                                                <label for="des">Description :</label>
                                                            </h6>
                                                            <span class="text">
                                                                <input type="text" id="des" name="des" value="<?php echo $oldpost['des'] ?>" />
                                                            </span>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <ul class="list-group">
                                                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                                        <div class="d-flex flex-column">
                                                            <h6 class="mb-1 text-dark font-weight-bold text-sm">
                                                                <label for="nblike">Likes :</label>
                                                            </h6>
                                                            <span class="text">
                                                                <input type="text" id="nblike" name="nblike" value="<?php echo $oldpost['nblike'] ?>" />
                                                            </span>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <ul class="list-group">
                                                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                                        <div class="d-flex flex-column">
                                                            <h6 class="mb-1 text-dark font-weight-bold text-sm">
                                                                <label for="nbdislike">Dislike :</label>
                                                            </h6>
                                                            <span class="text">
                                                                <input type="text" id="nbdislike" name="nbdislike" value="<?php echo $oldpost['nbdislike'] ?>" />
                                                            </span>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div class="form-group">
                                                    <ul class="list-group">
                                                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                                            <div class="d-flex flex-column">
                                                                <h6 class="mb-1 text-dark font-weight-bold text-sm">
                                                                    Images
                                                                </h6>
                                                                <span class="text">
                                                                    <select class="form-select" name="image" id="">
                                                                        <option value="">default...</option>
                                                                        <?php foreach ($tab as $image) { ?>
                                                                            <option value="<?= htmlspecialchars($image['id']); ?>"><?= htmlspecialchars($image['nom']); ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </span>
                                                            </div>
                                                        </li>
                                                    </ul>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3 mb-1">
                                                        <input class="btn btn-primary w-100 py-" type="submit" value="Update">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input class="btn btn-outline-primary w-100 py-" type="reset" value="Reset">
                                                    </div>
                                                </div>
                                        </form>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
        </section>

        <!-- END SECTION DASHBOARD -->

        <a data-scroll href="#wrapper" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
        <!-- END FOOTER -->

        <!-- START PRELOADER -->
        <div id="preloader">
            <div id="status">
                <div class="status-mes"></div>
            </div>
        </div>
        <!-- END PRELOADER -->

        <!-- ARCHIVES JS -->
        <script src="assets/js/jquery-3.5.1.min.js"></script>
        <script src="assets/js/jquery-ui.js"></script>
        <script src="assets/js/tether.min.js"></script>
        <script src="assets/js/moment.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/mmenu.min.js"></script>
        <script src="assets/js/mmenu.js"></script>
        <script src="assets/js/swiper.min.js"></script>
        <script src="assets/js/swiper.js"></script>
        <script src="assets/js/slick.min.js"></script>
        <script src="assets/js/slick2.js"></script>
        <script src="assets/js/fitvids.js"></script>
        <script src="assets/js/jquery.waypoints.min.js"></script>
        <script src="assets/js/jquery.counterup.min.js"></script>
        <script src="assets/js/imagesloaded.pkgd.min.js"></script>
        <script src="assets/js/isotope.pkgd.min.js"></script>
        <script src="assets/js/smooth-scroll.min.js"></script>
        <script src="assets/js/lightcase.js"></script>
        <script src="assets/js/search.js"></script>
        <script src="assets/js/owl.carousel.js"></script>
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        <script src="assets/js/ajaxchimp.min.js"></script>
        <script src="assets/js/newsletter.js"></script>
        <script src="assets/js/jquery.form.js"></script>
        <script src="assets/js/jquery.validate.min.js"></script>
        <script src="assets/js/searched.js"></script>
        <script src="assets/js/dashbord-mobile-menu.js"></script>
        <script src="assets/js/forms-2.js"></script>
        <script src="assets/js/color-switcher.js"></script>

        <script>
            $(".header-user-name").on("click", function() {
                $(".header-user-menu ul").toggleClass("hu-menu-vis");
                $(this).toggleClass("hu-menu-visdec");
            });
        </script>

        <!-- MAIN JS -->
        <script src="assets/js/script.js"></script>

    </div>
    <!-- Wrapper / End -->
</body>


<!-- Mirrored from code-theme.com/html/findhouses/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 23 Apr 2023 19:21:14 GMT -->

</html>