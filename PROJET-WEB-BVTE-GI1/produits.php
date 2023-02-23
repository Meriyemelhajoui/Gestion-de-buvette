<?php
   session_start();
   if(!isset($_SESSION['autoriser'])){
    header("location:index.php");
   }
   $nomComplet=strtoupper($_SESSION['nom'])." ".strtolower($_SESSION['prenom']);
?>
<?php
include_once("includes/connexion.php");
$stmt=$pdo->prepare('SELECT * FROM produit');
$stmt->execute();
$tab=$stmt->fetchAll();
?>
<?php include_once("header.php"); ?>

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
                <h2 class="text-center">Menu</h2>
                <div class="fod">
                <?php for($i=0;$i<count($tab);$i++) : ?>
                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <img src="<?= $tab[$i]['image'];?>" alt="Chicke Hawain Pizza"  class="img-curve">
                        </div>

                        <div class="food-menu-desc">
                            <h4><?= $tab[$i]['nom']; ?></h4>
                            <p class="food-price"><?= $tab[$i]['prix']; ?>DH</p>
                            <a href="ordres-form.php?id=<?= $tab[$i]['id']; ?>" class="btn btn-primary">Commander</a>
                        </div>
                    </div> 
                <?php endfor; ?> 
                </div>
        </div>
            
    </section>
    <!-- fOOD Menu Section Ends Here -->
    <?php include_once("footer2.php"); ?>