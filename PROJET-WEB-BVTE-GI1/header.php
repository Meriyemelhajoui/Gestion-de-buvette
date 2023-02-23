<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="SVG/bvte-logo.svg">
    <title>BVTE-Buvette ENSAH</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/app.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
</head>

<body>
   <!--loader-->
   <div id="loader">
    <div class="spinner"></div> 
</div>
<!-- Navbar Section Starts Here -->
<section class="navbar">
<div class="container">
    <div class="na">
    <div class="logo">
        <a href="accueil.php" title="Logo">
            <img src="SVG/bvte-logo.svg" alt="BVTE Logo" class="img-responsive">
        </a>
    </div>
    <div class="logo2">
        <img src="SVG/lolo.svg" alt="bvte" class="img-responsive">
    </div>
    <div class="menu">
        <ul>
            <li>
                <a href="accueil.php">ACCUEIL</a>
            </li>
            <li>
                <a href="categories.php">Categories</a>
            </li>
            <li>
                <a href="produits.php">PRODUITS </a>
            </li>
            <li>
                <div class="dropdown">
                    <button class="COMPTE">Compte</button>
                        <div class="dropdown-content">
                        <a class="dropp">...</a>
                        <a class="dropp0"><?=$nomComplet; ?></a>
                        <a href="modif-client.php" class="dropp">Modifier profil</a>
                        <a href="deconnexion.php" class="dropp">Se Deconnecter</a>
                        </div>
                </div>
            </li>
        </ul>
    </div>
</div>
</div>

    <div class="clearfix"></div>
</section>
<!-- Navbar Section Ends Here -->