<?php
require_once ('../../controller/imageC.php');
require_once ('../../model/image.php');

$image = null;
$imageC = new imageC();

if (
    isset($_POST["id"]) &&
    isset($_POST["nom"]) &&
    isset($_POST["des"]) &&
    isset($_POST["date"]) &&
    isset($_POST["statue"]) &&
    isset($_FILES["photo"])
) {
    if (
        !empty($_POST["id"]) &&
        !empty($_POST["nom"]) &&
        !empty($_POST["des"]) &&
        !empty($_POST["date"]) &&
        !empty($_POST["statue"]) &&
        !empty($_FILES["photo"])
    ) {
        $image = new image(
            $_POST["id"],
            $_POST["nom"],
            $_POST["des"],
            $_POST["date"],
            $_POST["statue"]
        );

        $fileValidationResult = $imageC->validateFileUpload($_FILES["photo"]);
        if ($fileValidationResult) {
            $imageC->addimage($image);
            $extension = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
            $newFileName = $_POST["id"] . '.' . $extension;
            move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/" . $newFileName);
            header('Location: ../back_office/Listeimage.php');
            exit(); 
        } else {
            echo "Erreur lors de la validation du fichier.";
        }
    } else {
        echo "Tous les champs sont obligatoires.";
    }
} else {
    echo "Erreur : données manquantes dans le formulaire.";
}
?>

<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from code-theme.com/html/findhouses/index-16.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 23 Apr 2023 19:20:22 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="html 5 template">
    <meta name="author" content="">
    <title>Find Houses - HTML5 Template</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="assets/css/jquery-ui.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome-5-all.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <!-- Slider Revolution CSS Files -->
    <link rel="stylesheet" href="assets/revolution/css/settings.css">
    <link rel="stylesheet" href="assets/revolution/css/layers.css">
    <link rel="stylesheet" href="assets/revolution/css/navigation.css">
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/aos.css">
    <link rel="stylesheet" href="assets/css/aos2.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/lightcase.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/menu.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" id="color" href="assets/css/colors/pink.css">
    <style>
                body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Assurez-vous que le contenu est centré verticalement sur toute la hauteur de la fenêtre */
        }
        /* Styles CSS ici */
        .custom-block {
            text-align: center;
        }

        .btn-primary {
            margin-top: 20px;
            margin-left: auto;
            margin-right: auto;
            display: block;
            width: fit-content;
        }
    </style>
</head>

<body class="th-8 homepage-4 hp-6 hd-white">
    <!-- Wrapper -->
    <div id="wrapper">
        <!-- START SECTION HEADINGS -->
        <!-- Header Container
        ================================================== -->
        <header id="header-container">
            <!-- Header -->
            <div id="header">
                <div class="container container-header">
                    <!-- Left Side Content -->
                    <div class="left-side">
                        <!-- Logo -->
                        <div id="logo">
                            <a href="index.html"><img src="assets/images/logo-red.svg" alt=""></a>
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
                        <nav id="navigation" class="style-1">
                            <ul id="responsive">
                                <li><a href="#">Home</a>
                                    <ul>
                                        <li><a href="#">Home Map</a>
                                            <ul>
                                                <li><a href="index-9.html">Home Map Style 1</a></li>
                                                <li><a href="index-12.html">Home Map Style 2</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Home Image</a>
                                            <ul>
                                               <li><a href="index.html">Modern Home</a></li>
                                                <li><a href="index-2.html">Home Boxed Image</a></li>
                                                <li><a href="index-3.html">Home Modern Image</a></li>
                                                <li><a href="index-5.html">Home Minimalist Style</a></li>
                                                <li><a href="index-6.html">Home Parallax Image</a></li>
                                                <li><a href="index-8.html">Home Search Form</a></li>
                                                <li><a href="index-10.html">Modern Full Image</a></li>
                                                <li><a href="index-15.html">Home Typed Image</a></li>
                                                <li><a href="index-17.html">Modern Parallax Image</a></li>
                                                <li><a href="index-18.html">Image Filter Search</a>
                                                <li><a href="index-21.html">Parallax Image video</a></li>
												<li><a href="index-23.html">Home Image</a></li>
												<li><a href="index-24.html">Image and video</a></li>
                                            </ul>
                                            </li>
                                            <li><a href="#">Home Video</a>
                                                <ul>
                                                    <li><a href="index-4.html">Home Video Image</a></li>
                                                    <li><a href="index-7.html">Home Video</a></li>
                                                    <li><a href="index-20.html">Home Modern Video</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Home Slider</a>
                                                <ul>                                                    
                                                    <li><a href="index-11.html">Slider Presentation 2</a></li>
                                                    <li><a href="index-16.html">Slider Presentation 3</a></li>
                                                    <li><a href="index-19.html">Home Modern Slider</a></li>
                                                    <li><a href="index-22.html">Home Image Slider</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Home Styles</a>
                                                <ul>
                                                    <li><a href="index-13.html">Home Style Dark</a></li>
                                                    <li><a href="index-14.html">Home Style White</a></li>
                                                </ul>
                                            </li>
                                    </ul>
                                    </li>
                                    <li><a href="#">Listing</a>
                                        <ul>
                                            <li><a href="#">Listing Grid</a>
                                                <ul>
                                                    <li><a href="properties-grid-1.html">Grid View 1</a></li>
                                                    <li><a href="properties-grid-2.html">Grid View 2</a></li>
                                                    <li><a href="properties-grid-3.html">Grid View 3</a></li>
                                                    <li><a href="properties-grid-4.html">Grid View 4</a></li>
                                                    <li><a href="properties-full-grid-1.html">Grid Fullwidth 1</a></li>
                                                    <li><a href="properties-full-grid-2.html">Grid Fullwidth 2</a></li>
                                                    <li><a href="properties-full-grid-3.html">Grid Fullwidth 3</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Listing List</a>
                                                <ul>
                                                    <li><a href="properties-full-list-1.html">List View 1</a></li>
                                                    <li><a href="properties-list-1.html">List View 2</a></li>
                                                    <li><a href="properties-full-list-2.html">List View 3</a></li>
                                                    <li><a href="properties-list-2.html">List View 4</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Listing Map</a>
                                                <ul>
                                                    <li><a href="properties-half-map-1.html">Half Map 1</a></li>
                                                    <li><a href="properties-half-map-2.html">Half Map 2</a></li>
                                                    <li><a href="properties-half-map-3.html">Half Map 3</a></li>
                                                    <li><a href="properties-top-map-1.html">Top Map 1</a></li>
                                                    <li><a href="properties-top-map-2.html">Top Map 2</a></li>
                                                    <li><a href="properties-top-map-3.html">Top Map 3</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Agent View</a>
                                                <ul>
                                                    <li><a href="agents-listing-grid.html">Agent View 1</a></li>
                                                    <li><a href="agents-listing-row.html">Agent View 2</a></li>
                                                    <li><a href="agents-listing-row-2.html">Agent View 3</a></li>
                                                    <li><a href="agent-details.html">Agent Details</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Agencies View</a>
                                                <ul>
                                                    <li><a href="agencies-listing-1.html">Agencies View 1</a></li>
                                                    <li><a href="agencies-listing-2.html">Agencies View 2</a></li>
                                                    <li><a href="agencies-details.html">Agencies Details</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Property</a>
                                        <ul>
                                            <li><a href="single-property-1.html">Single Property 1</a></li>
                                            <li><a href="single-property-2.html">Single Property 2</a></li>
                                            <li><a href="single-property-3.html">Single Property 3</a></li>
                                            <li><a href="single-property-4.html">Single Property 4</a></li>
                                            <li><a href="single-property-5.html">Single Property 5</a></li>
                                            <li><a href="single-property-6.html">Single Property 6</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Pages</a>
                                        <ul>
                                            <li><a href="#">Shop</a>
                                                <ul>
                                                    <li><a href="shop-with-sidebar.html">Product Sidebar</a></li>
                                                    <li><a href="shop-full-page.html">Product Fullpage</a></li>
                                                    <li><a href="shop-single.html">Product Single</a></li>
                                                    <li><a href="shop-checkout.html">Checkout Page</a></li>
                                                    <li><a href="shop-order.html">Order Page</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">User Panel</a>
                                                <ul>
                                                    <li><a href="dashboard.html">Dashboard</a></li>
                                                    <li><a href="user-profile.html">User Profile</a></li>
                                                    <li><a href="my-listings.html">My Properties</a></li>
                                                    <li><a href="favorited-listings.html">Favorited Properties</a></li>
                                                    <li><a href="add-property.html">Add Property</a></li>
                                                    <li><a href="payment-method.html">Payment Method</a></li>
                                                    <li><a href="invoice.html">Invoice</a></li>
                                                    <li><a href="change-password.html">Change Password</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="about.html">About Us</a></li>
                                            <li><a href="faq.html">Faq</a></li>
                                            <li><a href="pricing-table.html">Pricing Tables</a></li>
                                            <li><a href="404.html">Page 404</a></li>
                                            <li><a href="login.html">Login</a></li>
                                            <li><a href="register.html">Register</a></li>
                                            <li><a href="coming-soon.html">Coming Soon</a></li>
                                            <li><a href="under-construction.html">Under Construction</a></li>
                                            <li><a href="ui-element.html">UI Elements</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Blog</a>
                                        <ul>
                                            <li><a href="#">Grid Layout</a>
                                                <ul>
                                                    <li><a href="blog-full-grid.html">Full Grid</a></li>
                                                    <li><a href="blog-grid-sidebar.html">With Sidebar</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">List Layout</a>
                                                <ul>
                                                    <li><a href="blog-full-list.html">Full List</a></li>
                                                    <li><a href="blog-list-sidebar.html">With Sidebar</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="blog-details.html">Blog Details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact-us.html">Contact</a></li>
                                    <li class="d-none d-xl-none d-block d-lg-block"><a href="login.html">Login</a></li>
                                    <li class="d-none d-xl-none d-block d-lg-block"><a href="register.html">Register</a></li>
                                    
                            </ul>
                        </nav>
                        <!-- Main Navigation / End -->
                    </div>
                    <!-- Left Side Content / End -->

                    <!-- Right Side Content / End -->
                    <div class="right-side d-none d-none d-lg-none d-xl-flex">
                        <!-- Header Widget -->
                        <div class="header-widget">

                        </div>
                        <!-- Header Widget / End -->
                    </div>
                    <!-- Right Side Content / End -->

                    <!-- Right Side Content / End -->
                    <div class="header-user-menu user-menu add">
                        
                        <ul>
                            <li><a href="user-profile.html"> Edit profile</a></li>
                            <li><a href="add-property.html"> Add Property</a></li>
                            <li><a href="payment-method.html">  Payments</a></li>
                            <li><a href="change-password.html"> Change Password</a></li>
                            <li><a href="#">Log Out</a></li>
                        </ul>
                    </div>
                    <!-- Right Side Content / End -->

                    <div class="right-side d-none d-none d-lg-none d-xl-flex sign ml-0">
                        <!-- Header Widget -->
                        <div class="header-widget sign-in">
                            <div class="show-reg-form modal-open"><a href="#">Sign In</a></div>
                        </div>
                        <!-- Header Widget / End -->
                    </div>
                    <!-- Right Side Content / End -->

                    <!-- lang-wrap-->
                  
                    <!-- lang-wrap end-->

                </div>
            </div>
            <!-- Header / End -->

        </header>
        <div class="clearfix"></div>
        <!-- Header Container / End -->

        <!-- Main Slider -->
        <!-- Slider -->
        
        <div class="main-slider style-two default-banner slide2">
            <div class="tp-banner-container">
                <div class="tp-banner">
                    <div id="rev_slider_328_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.8">
                        <ul>
                            <!-- SLIDE  -->
                            <li data-index="rs-100" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-thumb="" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="{&quot;revslider-weather-addon&quot; : { &quot;type&quot; : &quot;&quot; ,&quot;name&quot; : &quot;&quot; ,&quot;woeid&quot; : &quot;&quot; ,&quot;unit&quot; : &quot;&quot; }}" data-description="">
                                <!-- MAIN IMAGE -->
                                <img src="assets/images/slider/slider-1.jpg" alt="" title="" data-bgposition="right center" data-kenburns="on" data-duration="20000" data-ease="Linear.easeNone" data-scalestart="110" data-scaleend="110" data-rotatestart="0" data-rotateend="0" data-blurstart="0" data-blurend="0" data-offsetstart="0 0" data-offsetend="300 0" data-bgparallax="8" class="rev-slidebg" data-no-retina>

                                <!-- LAYER NR. 23 -->
                                <div class="tp-caption tp-resizeme re-shadow" id="slide-100-layer-23" data-x="['left','left','left','left']" data-hoffset="['400','330','50','50']" data-y="['bottom','bottom','bottom','bottom']" data-voffset="['140','160','350','350']" data-width="none" data-height="none" data-whitespace="normal" data-visibility="['on','on','off','off']" data-type="image" data-responsive_offset="on" data-frames='[{"delay":"bytrigger","speed":600,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"bytrigger","speed":300,"frame":"999","to":"opacity:0;","ease":"Power4.easeOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" data-lasttriggerstate="reset" style="z-index: 27;">
                                    <img src="assets/images/single-property/s-1.jpg" alt="" data-ww="['640px','640px','360px','360px']" data-hh="['360px','360px','249px','249']" width="640" height="360" data-no-retina>
                                </div>
                                <!-- LAYER NR. 24 -->
                                <div class="tp-caption tp-resizeme  re-shadow" id="slide-100-layer-24" data-x="['left','left','left','left']" data-hoffset="['400','330','50','50']" data-y="['bottom','bottom','bottom','bottom']" data-voffset="['140','160','350','350']" data-width="none" data-height="none" data-whitespace="normal" data-visibility="['on','on','off','off']" data-type="image" data-responsive_offset="on" data-frames='[{"delay":"bytrigger","speed":600,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"bytrigger","speed":300,"frame":"999","to":"opacity:0;","ease":"Power4.easeOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" data-lasttriggerstate="reset" style="z-index: 28;">
                                    <img src="assets/images/single-property/s-2.jpg" alt="" data-ww="['640px','640px','360px','360px']" data-hh="['360px','360px','249px','249']" width="640" height="360" data-no-retina>
                                </div>
                                <!-- LAYER NR. 25 -->
                                <div class="tp-caption tp-resizeme re-shadow" id="slide-100-layer-25" data-x="['left','left','left','left']" data-hoffset="['400','330','50','50']" data-y="['bottom','bottom','bottom','bottom']" data-voffset="['140','160','350','350']" data-width="none" data-height="none" data-whitespace="normal" data-visibility="['on','on','off','off']" data-type="image" data-responsive_offset="on" data-frames='[{"delay":"bytrigger","speed":600,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"bytrigger","speed":300,"frame":"999","to":"opacity:0;","ease":"Power4.easeOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" data-lasttriggerstate="reset" style="z-index: 29;">
                                    <img src="assets/images/single-property/s-3.jpg" alt="" data-ww="['640px','640px','360px','360px']" data-hh="['360px','360px','249px','249']" width="640" height="360" data-no-retina>
                                </div>
                            </li>
                            <!-- SLIDE  -->
                            <li data-index="rs-200" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-thumb="" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="{&quot;revslider-weather-addon&quot; : { &quot;type&quot; : &quot;&quot; ,&quot;name&quot; : &quot;&quot; ,&quot;woeid&quot; : &quot;&quot; ,&quot;unit&quot; : &quot;&quot; }}" data-description="">
                                <!-- MAIN IMAGE -->
                                <img src="assets/images/slider/slider-2.jpg" alt="" title="" data-bgposition="right center" data-kenburns="on" data-duration="20000" data-ease="Linear.easeNone" data-scalestart="110" data-scaleend="110" data-rotatestart="0" data-rotateend="0" data-blurstart="0" data-blurend="0" data-offsetstart="0 0" data-offsetend="300 0" data-bgparallax="8" class="rev-slidebg" data-no-retina>

 
                                <!-- LAYER NR. 23 -->
                                <div class="tp-caption tp-resizeme re-shadow" id="slide-200-layer-23" data-x="['left','left','left','left']" data-hoffset="['400','330','50','50']" data-y="['bottom','bottom','bottom','bottom']" data-voffset="['140','160','350','350']" data-width="none" data-height="none" data-whitespace="normal" data-visibility="['on','on','off','off']" data-type="image" data-responsive_offset="on" data-frames='[{"delay":"bytrigger","speed":600,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"bytrigger","speed":300,"frame":"999","to":"opacity:0;","ease":"Power4.easeOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" data-lasttriggerstate="reset" style="z-index: 27;">
                                    <img src="assets/images/single-property/s-4.jpg" alt="" data-ww="['640px','640px','360px','360px']" data-hh="['360px','360px','249px','249']" width="640" height="360" data-no-retina>
                                </div>
                                <!-- LAYER NR. 24 -->
                                <div class="tp-caption tp-resizeme  re-shadow" id="slide-200-layer-24" data-x="['left','left','left','left']" data-hoffset="['400','330','50','50']" data-y="['bottom','bottom','bottom','bottom']" data-voffset="['140','160','350','350']" data-width="none" data-height="none" data-whitespace="normal" data-visibility="['on','on','off','off']" data-type="image" data-responsive_offset="on" data-frames='[{"delay":"bytrigger","speed":600,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"bytrigger","speed":300,"frame":"999","to":"opacity:0;","ease":"Power4.easeOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" data-lasttriggerstate="reset" style="z-index: 28;">
                                    <img src="assets/images/single-property/s-5.jpg" alt="" data-ww="['640px','640px','360px','360px']" data-hh="['360px','360px','249px','249']" width="640" height="360" data-no-retina>
                                </div>
                                <!-- LAYER NR. 25 -->
                                <div class="tp-caption tp-resizeme re-shadow" id="slide-200-layer-25" data-x="['left','left','left','left']" data-hoffset="['400','330','50','50']" data-y="['bottom','bottom','bottom','bottom']" data-voffset="['140','160','350','350']" data-width="none" data-height="none" data-whitespace="normal" data-visibility="['on','on','off','off']" data-type="image" data-responsive_offset="on" data-frames='[{"delay":"bytrigger","speed":600,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"bytrigger","speed":300,"frame":"999","to":"opacity:0;","ease":"Power4.easeOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" data-lasttriggerstate="reset" style="z-index: 29;">
                                    <img src="assets/images/single-property/s-6.jpg" alt="" data-ww="['640px','640px','360px','360px']" data-hh="['360px','360px','249px','249']" width="640" height="360" data-no-retina>
                                </div>
                            </li>
                        </ul>
                        <div class="tp-static-layers">
                            <!-- LAYER NR. 78 -->
                            <div class="tp-caption have tp-shape tp-shapewrapper tp-resizeme re-shadow2 re-overflow tp-static-layer" id="slider-328-layer-31" data-x="['right','right','right','right']" data-hoffset="['55','55','55','55']" data-y="['bottom','bottom','bottom','bottom']" data-voffset="['100','100','100','100']" data-width="130" data-height="130" data-whitespace="nowrap" data-visibility="['on','on','on','off']" data-type="shape" data-basealign="slide" data-responsive_offset="on" data-startslide="0" data-endslide="2" data-frames='[{"delay":2100,"speed":1000,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 14;background-color:rgb(255,255,255);border-color:rgb(255,255,255);border-style:solid;border-width:5px 5px 5px 5px;border-radius:100px;">
                                <div class="tp-element-background" style=" background: url('assets/images/testimonials/ts-4.jpg') no-repeat center center; background-size: cover; opacity: 1; border-radius:100px;">
                                </div>
                            </div>
                            <!-- LAYER NR. 80 -->
                            <div class="tp-caption have   tp-resizeme re-shadow2 tp-static-layer" id="slider-328-layer-33" data-x="['right','right','right','right']" data-hoffset="['30','30','30','30']" data-y="['bottom','bottom','bottom','bottom']" data-voffset="['220','220','220','220']" data-width="180" data-height="none" data-whitespace="nowrap" data-visibility="['on','on','on','off']" data-type="text" data-basealign="slide" data-responsive_offset="on" data-startslide="0" data-endslide="2" data-frames='[{"delay":2000,"speed":1000,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['center','center','center','center']" data-paddingtop="[10,10,10,10]" data-paddingright="[20,20,20,20]" data-paddingbottom="[10,10,10,10]" data-paddingleft="[20,20,20,20]" style="z-index: 16; min-width: 180px; max-width: 180px; white-space: nowrap; font-size: 15px; line-height: 22px; font-weight: 400; color: #000000; letter-spacing: 0px;font-family:Roboto;background-color:rgb(255,255,255);border-radius:5px 5px 5px 5px;">
                                <div class="rs-looped rs-slideloop" data-easing="Expo.easeInOut" data-speed="1" data-xs="0" data-xe="0" data-ys="-5" data-ye="5">
                                    Have a Question?
                                    <br/>
                                    <i class="fa-icon-phone" style="margin-right:7px"></i>
                                    <a class="tp-phonenum"> (234) 0200 17813</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <section class="recently portfolio bg-white-2 home18">
            <div class="container">
                <div class="sec-title">
                    <h2><span>  Prime stay </span> </h2>
                    <p> </p>
                </div>
               
            </div>
        </section>
        <script src="https://www.google.com/recaptcha/api.js"></script>
<script>
    function onSubmit(token) {
        document.getElementById("Form").submit();
    }

    function verifyRecaptcha() {
        var response = grecaptcha.getResponse();
        if (response.length === 0) {
            alert("Please complete the reCAPTCHA before confirming.");
            return false; // Empêche la soumission du formulaire si le reCAPTCHA n'est pas complété
        }
        return true;
    }
</script>

<div class="col-rg-5">
    <div class="custom-block" data-aos="fade-up" data-aos-delay="100" style="margin: auto;">
        <form id="form" enctype="multipart/form-data" method="post" onsubmit="return verifyRecaptcha()">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="id">ID image</label>
                        <input type="text" class="form-control" id="id" name="id">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nom">  Image name </label>
                        <input type="text" class="form-control" id="nom" name="nom">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="des">Image description </label>
                <input type="text" class="form-control" id="des" name="des">
            </div>
            <div class="form-group">
                <label for="date">Posting date  </label>
                <input type="date" class="form-control" id="date" name="date">
            </div>
            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" class="form-control" id="photo" name="photo">
            </div>
            <div class="form-group">
                <label for="statue">Image state </label>
                <select id="statue" name="statue" class="form-control">
                    <option value="Publiée" data-calc="Publiée">Publiée</option>
                    <option value="brouillon" data-calc="brouillon">brouillon</option>
                    <option value="en attente de révision" data-calc="en attente de révision">en attente de révision</option>
                </select>
            </div>
            <div class="form-group">
                <div class="g-recaptcha" data-sitekey="6LendtEpAAAAAKdOjGLeLxoEnwffpbZNhwLZd05n" data-callback="onSubmit"></div>
            </div>
            <button type="submit" class="btn btn-primary">Confirm</button>
        </form>
    </div>
</div>
  
        
        <section class="recently portfolio bg-white-2 home18">
            <div class="container">
                <div class="sec-title">
                    <h2><span>  </span> </h2>
                    <p> </p>
                </div>
               
            </div>
        </section>
        

        <a data-scroll href="#wrapper" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
        <footer class="first-footer">
            <div class="top-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            
                            <div class="contactus">
                               
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="navigation">
                               
                                <div class="nav-footer">
                                   
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="widget">
                                <h3>Twitter Feeds</h3>
                                <div class="twitter-widget contuct">
                                    <div class="twitter-area">
                                        <div class="single-item">
                                            
                                           
                                        </div>
                                        <div class="single-item">
                                           
                                           
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
            <div class="second-footer">
               
            </div>
        </footer>

       
        <!-- END FOOTER -->

        <!--register form -->
        
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
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/moment.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/mmenu.min.js"></script>
        <script src="assets/js/mmenu.js"></script>
        <script src="assets/js/aos.js"></script>
        <script src="assets/js/aos2.js"></script>
        <script src="assets/js/slick.min.js"></script>
        <script src="assets/js/fitvids.js"></script>
        <script src="assets/js/jquery.waypoints.min.js"></script>
        <script src="assets/js/jquery.counterup.min.js"></script>
        <script src="assets/js/imagesloaded.pkgd.min.js"></script>
        <script src="assets/js/isotope.pkgd.min.js"></script>
        <script src="assets/js/smooth-scroll.min.js"></script>
        <script src="assets/js/lightcase.js"></script>
        <script src="assets/js/owl.carousel.js"></script>
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        <script src="assets/js/ajaxchimp.min.js"></script>
        <script src="assets/js/newsletter.js"></script>
        <script src="assets/js/jquery.form.js"></script>
        <script src="assets/js/jquery.validate.min.js"></script>
        <script src="assets/js/forms-2.js"></script>
        <script src="assets/js/color-switcher.js"></script>

        <!-- Slider Revolution scripts -->
        <script src="assets/revolution/js/jquery.themepunch.tools.min.js"></script>
        <script src="assets/revolution/js/jquery.themepunch.revolution.min.js"></script>
        <script src="assets/revolution/js/extensions/revolution.extension.actions.min.js"></script>
        <script src="assets/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
        <script src="assets/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
        <script src="assets/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script src="assets/revolution/js/extensions/revolution.extension.migration.min.js"></script>
        <script src="assets/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
        <script src="assets/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
        <script src="assets/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script src="assets/revolution/js/extensions/revolution.extension.video.min.js"></script>

        <script>
            var tpj = jQuery;

            var revapi474;
            tpj(document).ready(function() {
                if (tpj("#rev_slider_328_1").revolution == undefined) {
                    revslider_showDoubleJqueryError("#rev_slider_328_1");
                } else {
                    revapi328 = tpj("#rev_slider_328_1").show().revolution({
                        sliderType: "standard",
                        jsFileLocation: "//revolution.themepunch.com/wp-content/plugins/revslider/public/assets/js/",
                        sliderLayout: "fullscreen",
                        dottedOverlay: "none",
                        delay: 10000,
                        navigation: {
                            keyboardNavigation: "off",
                            keyboard_direction: "horizontal",
                            mouseScrollNavigation: "off",
                            mouseScrollReverse: "default",
                            onHoverStop: "off",
                            touch: {
                                touchenabled: "on",
                                touchOnDesktop: "off",
                                swipe_threshold: 75,
                                swipe_min_touches: 1,
                                swipe_direction: "horizontal",
                                drag_block_vertical: false
                            },
                            arrows: {
                                style: "uranus",
                                enable: true,
                                hide_onmobile: false,
                                hide_onleave: false,
                                tmp: '',
                                left: {
                                    h_align: "right",
                                    v_align: "bottom",
                                    h_offset: 125,
                                    v_offset: 17
                                },
                                right: {
                                    h_align: "right",
                                    v_align: "bottom",
                                    h_offset: 65,
                                    v_offset: 19
                                }
                            },
                            bullets: {
                                enable: true,
                                hide_onmobile: false,
                                style: "hermes",
                                hide_onleave: false,
                                direction: "horizontal",
                                h_align: "left",
                                v_align: "bottom",
                                h_offset: 7,
                                v_offset: 50,
                                space: 5,
                                tmp: ''
                            }
                        },
                        responsiveLevels: [1240, 1024, 778, 480],
                        visibilityLevels: [1240, 1024, 778, 480],
                        gridwidth: [1240, 1024, 778, 480],
                        gridheight: [700, 700, 700, 700],
                        lazyType: "none",
                        parallax: {
                            type: "scroll",
                            origo: "slidercenter",
                            speed: 400,
                            speedbg: 0,
                            speedls: 0,
                            levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 46, 47, 48, 49, 50, 51, 55],
                        },
                        shadow: 0,
                        spinner: "spinner5",
                        stopLoop: "off",
                        stopAfterLoops: -1,
                        stopAtSlide: -1,
                        shuffle: "off",
                        autoHeight: "off",
                        fullScreenOffset: "60",
                        hideThumbsOnMobile: "off",
                        hideSliderAtLimit: 0,
                        hideCaptionAtLimit: 0,
                        hideAllCaptionAtLilmit: 0,
                        debugMode: false,
                        fallbacks: {
                            simplifyAll: "off",
                            nextSlideOnWindowFocus: "off",
                            disableFocusListener: false,
                        }
                    });
                }; /* END OF revapi call */
            }); /*ready*/

        </script>
        
        <script>
            $('.slick-lancers').slick({
                infinite: false,
                slidesToShow: 3,
                slidesToScroll: 1,
                dots: true,
                arrows: true,
                adaptiveHeight: true,
                responsive: [{
                    breakpoint: 1292,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        dots: true,
                        arrows: false
                    }
                }, {
                    breakpoint: 993,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        dots: true,
                        arrows: false
                    }
                }, {
                    breakpoint: 769,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: true,
                        arrows: false
                    }
                }]
            });

        </script>

        <!-- MAIN JS -->
        <script src="assets/js/script.js"></script>

    </div>
    <!-- Wrapper / End -->
</body>

<script src="controle_saisie.js"></script>
<!-- Mirrored from code-theme.com/html/findhouses/index-16.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 23 Apr 2023 19:20:25 GMT -->
</html>
