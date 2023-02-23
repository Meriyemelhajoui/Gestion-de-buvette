<?php
session_start();
if(!isset($_SESSION['ouvert'])){
    header("location:index.php");
}
?>
<?php
    include_once("../includes/connexion.php");
    $selCat=$pdo->prepare('SELECT count(*) FROM categorie');
    $selCat->execute();
    $selCatrow = $selCat->fetch(PDO::FETCH_NUM);
    $Catcount = $selCatrow[0];
    $selPro=$pdo->prepare('SELECT count(*) FROM produit');
    $selPro->execute();
    $selProrow = $selPro->fetch(PDO::FETCH_NUM);
    $Procount = $selProrow[0];
    $selOrd=$pdo->prepare('SELECT count(*) FROM orders');
    $selOrd->execute();
    $selOrdrow = $selOrd->fetch(PDO::FETCH_NUM);
    $Ordcount = $selOrdrow[0];
    $seltotal=$pdo->prepare('SELECT SUM(total) AS total FROM orders WHERE status=?');
    $seltotal->execute(['Delivre']);
    $total=$seltotal->fetch(PDO::FETCH_ASSOC);
    $sum=$total['total'];
   

?>
<?php include_once("header.php"); ?>
<!-- Navbar Section Ends Here -->
<section class="catt">
    <div class="container">
                <h1>Dashboard</h1>
        <div class="fl">
                <div>
                    <h3><?=$Catcount;?></h3>
                    <h4>Categories</h4>
                </div>
               
                <div>
                    <h3><?=$Procount;?></h3>
                    <h4>Produits</h4>
                </div>

                <div>
                    <h3><?=$Ordcount;?></h3>
                    <h4>Commandes</h4>
                </div>

                <div>
                    <h3><?=$sum;?></h3>
                    <h4>Revenue(dh)</h4>
                </div>
         </div>
                <div class="clearfix"></div>

            </div>
        </div>
    </section>
        <!-- Main Content Setion Ends -->
<!-- footer Section Starts Here -->
<?php include_once("footer.php"); ?>