<?php
   session_start();
   if(!isset($_SESSION['autoriser'])){
    header("location:index.php");
   }
   $nomComplet=strtoupper($_SESSION['nom'])." ".strtolower($_SESSION['prenom']);
?>
<?php
    $idCat=$_GET['id'];
    include_once("includes/connexion.php");
    $stmt=$pdo->prepare('SELECT * FROM produit WHERE id_categorie=?');
    $stmt->execute([$idCat]);
    $tb=$stmt->fetchAll();
    $sel=$pdo->prepare('SELECT nom FROM categorie WHERE id=?');
    $sel->execute([$idCat]);
    $tab=$sel->fetchAll();
?>
<?php include_once("header.php"); ?>
    
    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Menu du<br><?= $tab[0]['nom'];?></h2>
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
         </div>
    </section>
    <!-- fOOD Menu Section Ends Here -->
    <?php include_once("footer2.php"); ?>