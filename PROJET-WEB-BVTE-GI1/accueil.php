<?php
   session_start();
   if(!isset($_SESSION['autoriser'])){
    header("location:index.php");
   }
   $nomComplet=strtoupper($_SESSION['nom'])." ".strtolower($_SESSION['prenom']);
   include_once("includes/connexion.php");
   $stmt=$pdo->prepare('SELECT * FROM categorie limit 3');
   $stmt->execute();
   $tab=$stmt->fetchAll();
   $sel=$pdo->prepare('SELECT * FROM produit limit 9');
   $sel->execute();
   $tb=$sel->fetchAll();
?>
<?php include_once("header2.php"); ?>

    <!-- HERO Section Starts Here -->
    <section class="hero">
        <div class="container her">
         <div class="hero-sec">
               <h5>Bienvenue dans votre</h5>
            <p>ESPACE WEB<br>E-BUVETTE<br>D'ECOLE ENSAH*</p>
            <h6>Commandez ce que vous voulez à travers la platforme electronique<br>du buvette de l'École nationale des sciences appliquées d'Al Hoceima</h6>
            <a href="categories.php"><button class="b1 but-h">MENU</button></a>
            <a href="produits.php"><button class="b2 but-h">COMMANDER</button></a> 
        </div>
        <div class="img-hero">
            <img src="images/gg.jpg" alt="hero-img"/>
        </div>
    </div>
        <div class="rect"></div>
    </section>
    <!-- HERO Section Ends Here -->
    
    <!-- about Section starts Here -->
    <section class="about">
        <div class="container">
            <h2 class="text-center">a propos<br>de nous</h2>
            <p>
            BVTE est un nouveau espace électronique dédié aux services de la buvette de l'École nationale<br>
            des sciences appliquées d'Al Hoceima, crée dans le but de vous faciliter la recherche des produits<br>
            de la buvette, et de les commander facilement. E-BVTE vous
            offre plein d'autres services<br>que vous allez les découvrir en naviguant entre les pages.
            <br>On vous souhaite une bonne expérience❤️.
            </p>
        </div>
        <div class="container ab">
            <p class="line"></p>
            <div>
                <img src="SVG/Asset 6ab.svg" alt="1"/>
                <p>Connecter<br>ou<br>Inscrire</p>
            </div>
            <div>
                <img src="SVG/Asset 7ab.svg" alt="2"/>
                <p>Choisir<br>un<br>produit</p>
            </div>
            <div>
                <img src="SVG/Asset 8ab.svg" alt="3"/>
                <p>Remplir<br>le<br>Formulaire</p>
            </div>
            <div>
                <img src="SVG/Asset 9ab.svg" alt="4"/>
                <p>Recevoir<br>la<br>commande</p>
            </div>
        </div>

    </section>
    <!-- about Section Ends Here -->

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explorer</br>Categories</h2>
            <div class="ca">
                <?php for($i=0;$i<count($tab);$i++) : ?>
                <a href="sub-categories.php?id=<?= $tab[$i]['id'];?>">
                    <div class="box-3">
                        <img src="<?= $tab[$i]['image'];?>" alt="Fast-Food" class="img-curve img-res">
                        <h3><?= $tab[$i]['nom'];?></h3>
                    </div>
                </a>
                <?php endfor; ?>
            </div>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!--MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Menu</h2>
            <div class="fod">
                <?php for($i=0;$i<count($tb);$i++) : ?>
                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <img src="<?= $tb[$i]['image'];?>" alt="Chicke Hawain Pizza"  class="img-curve">
                    </div>

                    <div class="food-menu-desc">
                        <h4><?= $tb[$i]['nom']; ?></h4>
                        <p class="food-price"><?= $tb[$i]['prix']; ?>DH</p>
                        <a href="ordres-form.php?id=<?= $tb[$i]['id']; ?>" class="btn btn-primary">Commander</a>
                    </div>
                </div>  
                <?php endfor; ?> 
            </div>
            
        <p class="text-center">
        <a href="produits.php" class="vmenu">
                Voir Tout Le Menu
            <img src="SVG/flch.svg" alt="flch">
        </a>        </p>

    </section>
    <!--Menu Section Ends Here -->

    <!-- offre Section Starts Here -->
    <section class="off">
        <div class="container offre">
                <div class="o1">
                    <p>
                        BVTE OFFRE<br>DE semaine
                    </p>
                    <a href="sub-categories.php?id=2"><button class="b2 but-h">COMMANDER</button></a>
                    <img src="images/chef.png" alt="chef">
                 </div>
                <div class="of2">
                    <img src="images/burg.jpg" class="piz">
                </div>
                <div class="of3">
                    <div class="blck"></div>
                    <img src="images/fr.jpg">
                </div>
        </div>
    </section>
    <!-- offre Section Ends Here -->

    <!--partenaires-->
    <div class="container cont2">
        <h2 class="text-center">Nos partenaires</h2>
        <section class="customer-logos slider">
            <div class="slide"><img src="images/llo-01.jpg" alt="logo-s"></div>
            <div class="slide"><img src="images/llo-02.jpg" alt="logo-s"></div>
            <div class="slide"><img src="images/llo-03.jpg" alt="logo-s"></div>
            <div class="slide"><img src="images/llo-04.jpg" alt="logo-s"></div>
            <div class="slide"><img src="images/llo-05.jpg" alt="logo-s"></div>
            <div class="slide"><img src="images/llo-06.jpg" alt="logo-s"></div>
            <div class="slide"><img src="images/llo-07.jpg" alt="logo-s"></div>
            <div class="slide"><img src="images/llo-08.jpg" alt="logo-s"></div>
            <div class="slide"><img src="images/llo-09.jpg" alt="logo-s"></div>
            <div class="slide"><img src="images/llo-10.jpg" alt="logo-s"></div>
            <div class="slide"><img src="images/llo-11.jpg" alt="logo-s"></div>
            <div class="slide"><img src="images/llo-12.jpg" alt="logo-s"></div>
            <div class="slide"><img src="images/llo-13.jpg" alt="logo-s"></div>
            <div class="slide"><img src="images/llo-14.jpg" alt="logo-s"></div>
            <div class="slide"><img src="images/llo-15.jpg" alt="logo-s"></div>
            <div class="slide"><img src="images/llo-16.jpg" alt="logo-s"></div>
        </section>
    </div>
    <!--partenaires-->
    <?php include_once("footer2.php"); ?>