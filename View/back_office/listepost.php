<?php
require_once ('../../controller/postC.php');
$postC = new postC();

$tab = $postC->listepost();
require_once ('../../controller/imageC.php');
// Create an instance of UserC class
$image = new imageC();

ob_start();


// Code pour générer le PDF
if (isset($_POST['generate_pdf'])) {
    // Inclure la classe TCPDF
    require_once 'vendor/autoload.php'; // Assurez-vous de spécifier le bon chemin vers TCPDF
    
    // Code pour générer le PDF ici
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

    // Paramètres du document
    $pdf->SetCreator('Votre Nom');
    $pdf->SetAuthor('Votre Nom');
    $pdf->SetTitle('Liste des posts');
    $pdf->SetSubject('Liste des posts');
    $pdf->SetKeywords('PDF, Liste, Posts');

    // Ajout d'une page
    $pdf->AddPage();

    // Contenu du PDF
    $content = '<h1>Liste des posts</h1><br>';

    // Tableau des posts
    $content .= '<table border="1">';
    $content .= '<tr>';
    $content .= '<th>ID poste</th>';
    $content .= '<th>Date de poste</th>';
    $content .= '<th>Email</th>';
    $content .= '<th>Titre</th>';
    $content .= '<th>Description</th>';
    $content .= '<th>Likes</th>';
    $content .= '<th>Dislikes</th>';
    $content .= '<th>Image</th>';
    $content .= '</tr>';
    foreach ($tab as $post) {
        $images = $image->showimage($post["id_image"]);
        $content .= '<tr>';
        $content .= '<td>' . $post["idpost"] . '</td>';
        $content .= '<td>' . $post["datepost"] . '</td>';
        $content .= '<td>' . $post["adress"] . '</td>';
        $content .= '<td>' . $post["titre"] . '</td>';
        $content .= '<td>' . $post["des"] . '</td>';
        $content .= '<td>' . $post["nblike"] . '</td>';
        $content .= '<td>' . $post["nbdislike"] . '</td>';
        $content .= '<td>' . $images["nom"] . '</td>';
        $content .= '</tr>';
    }
    $content .= '</table>';

    // Ajouter le contenu au PDF
    $pdf->writeHTML($content, true, false, true, false, '');

    // Nom du fichier PDF
    $filename = 'liste_posts.pdf';

    // Télécharger le PDF
    $pdf->Output($filename, 'D');

    // Arrêter la temporisation de sortie et envoyer le tampon de sortie
    ob_end_flush();
    exit;
}
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


<section class="user-page section-padding">
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <!-- Ajout de la classe align-items-center pour centrer verticalement -->
            <div class="col-lg-10"> <!-- Colonne Bootstrap pour le contenu -->
                <!-- Vos données PHP ici -->
                <div class="detail clearfix">
                    <div class="table-data">
                        <div class="order">
                            <div class="head">
                                <h3 class="text-center">Les postes</h3>
                                <!-- Centrer le titre -->
                            </div>

                            <!-- Bouton pour télécharger le PDF -->
                            <form method="post" action="">
                                <button type="submit" name="generate_pdf" class="btn btn-primary">Télécharger PDF</button>
                            </form>

                            <div class="table-responsive"> <!-- Rendre le tableau responsive -->
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID poste</th>
                                            <th>Date de poste</th>
                                            <th>Email</th>
                                            <th>Titre</th>
                                            <th>Description</th>
                                            <th>Likes</th>
                                            <th>Dislikes</th>
                                            <th>Image</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($tab as $post) {
                                            $images = $image->showimage($post["id_image"]);
                                            ?>
                                            <tr>
                                                <td><?= $post["idpost"]; ?></td>
                                                <td><?= $post["datepost"]; ?></td>
                                                <td><?= $post["adress"]; ?></td>
                                                <td><?= $post["titre"]; ?></td>
                                                <td><?= $post["des"]; ?></td>
                                                <td><?= $post["nblike"]; ?></td>
                                                <td><?= $post["nbdislike"]; ?></td>
                                                <td><?= $images["nom"]; ?></td>
                                                <td>
                                                    <a href="deletepost.php?idpost=<?= $post['idpost']; ?>"
                                                        class="btn btn-sm btn-danger">Supprimer</a>
                                                    <a href="showpost.php?idpost=<?= $post['idpost']; ?>"
                                                        class="btn btn-sm btn-primary">Détails</a>
                                                    <a href="updatepost.php?idpost=<?= $post['idpost']; ?>"
                                                        class="btn btn-sm btn-success">Mise à jour</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <h2>Top Posts by Likes</h2>
                        <canvas id="topLikesChart" width="30" height="10"></canvas>

                        <h2>Top Posts by Dislikes</h2>
                        <canvas id="topDislikesChart" width="30" height="10"></canvas>

                        <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "projet2a";

                        try {
                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            $stmt = $conn->prepare("SELECT * FROM post ORDER BY nblike DESC LIMIT 4");
                            $stmt->execute();
                            $topPosts = $stmt->fetchAll();

                            $stmt2 = $conn->prepare("SELECT * FROM post ORDER BY nbdislike ASC LIMIT 4");
                            $stmt2->execute();
                            $topPostsDislike = $stmt2->fetchAll();
                        } catch (PDOException $e) {
                            echo "Erreur : " . $e->getMessage();
                        }

                        // Fermer la connexion
                        $conn = null;
                        ?>

                        <script>
                            // Données pour le top likes
                            var topLikesData = {
                                labels: <?php echo json_encode(array_column($topPosts, 'titre')); ?>,
                                datasets: [{
                                    label: 'Likes',
                                    data: <?php echo json_encode(array_column($topPosts, 'nblike')); ?>,
                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                    borderColor: 'rgba(75, 192, 192, 1)',
                                    borderWidth: 1
                                }]
                            };

                            // Options pour le top likes
                            var options = {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            };

                            // Création du top likes chart
                            var ctx1 = document.getElementById('topLikesChart').getContext('2d');
                            var topLikesChart = new Chart(ctx1, {
                                type: 'bar',
                                data: topLikesData,
                                options: options
                            });

                            // Données pour le top dislikes
                            var topDislikesData = {
                                labels: <?php echo json_encode(array_column($topPostsDislike, 'titre')); ?>,
                                datasets: [{
                                    label: 'Dislikes',
                                    data: <?php echo json_encode(array_column($topPostsDislike, 'nbdislike')); ?>,
                                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                    borderColor: 'rgba(255, 99, 132, 1)',
                                    borderWidth: 1
                                }]
                            };

                            // Options pour le top dislikes
                            var options = {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            };

                            // Création du top dislikes chart
                            var ctx2 = document.getElementById('topDislikesChart').getContext('2d');
                            var topDislikesChart = new Chart(ctx2, {
                                type: 'bar',
                                data: topDislikesData,
                                options: options
                            });
                        </script>

                        <footer></footer>
                        <!-- START FOOTER -->

                    </div>
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
        $(".header-user-name").on("click", function () {
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