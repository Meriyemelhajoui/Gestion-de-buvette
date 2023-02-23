<?php
   session_start();
   if(!isset($_SESSION['autoriser'])){
    header("location:index.php");
   }
   $nomComplet=strtoupper($_SESSION['nom'])." ".strtolower($_SESSION['prenom']);
?>
<?php
include_once("includes/connexion.php");
$stmt=$pdo->prepare('SELECT * FROM categorie');
$stmt->execute();
$tab=$stmt->fetchAll();
?>
<?php include_once("header.php"); ?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
             <h2 class="text-center">Explorer</br>Categories</h2>
             <div class="ca">
                    <?php for($i=0;$i<count($tab);$i++) : ?>
                    <a href="sub-categories.php?id=<?= $tab[$i]['id'];?>">
                        <div class="box-3">
                            <img src="<?= $tab[$i]['image'];?>" alt="Fast-Food" class="img-curve ">
                            <h3><?= $tab[$i]['nom'];?></h3>
                        </div>
                    </a>
                    <?php endfor; ?>
              </div>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <?php include_once("footer.php"); ?>