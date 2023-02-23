<?php
session_start();
if(!isset($_SESSION['ouvert'])){
    header("location:index.php");
}
?>

<?php
error_reporting(0);
$nom=$_POST['prod_nom'];
$image=$_POST['prod_image'];
$prix=$_POST['prod_prix'];
$num_cat=$_POST['cat_num'];
$valider=$_POST['modifValider'];
$prod_id=$_GET['id'];
$erreur="";
if(isset($valider)){
    include_once("../includes/connexion.php");
    $stmt=$pdo->prepare('SELECT * FROM produit WHERE id=?');
    $stmt->execute([$prod_id]);
    $tab=$stmt->fetchAll();
    if(count($tab)>0){
        $stmt=$pdo->prepare('UPDATE produit SET image=?,prix=? WHERE id=?');
        $stmt->execute([$image,$prix,$prod_id]);
        header("location:gerer-produits.php");


    }else{
        $erreur="Produit n'existe pas";
    }
}
?>
<?php
    include_once("../includes/connexion.php");
    if(isset($_GET['id'])){
        $prod_id=$_GET['id'];
    }
    $stmt=$pdo->prepare('SELECT * FROM produit WHERE id=?');
    $stmt->execute([$prod_id]);
    $tb=$stmt->fetchAll();
?>


<?php include_once("header.php"); ?>
<!-- Navbar Section Ends Here -->
<section class="modif">
    <div class="container">
<h2 class="text-center">MODIFIER<br>PRODUIT</h2>
    <div>
        <form action="#" method="POST">
        <label for="Nom">Nom produit</label>
          <input type="text" id="Nom" name="prod_nom" placeholder="Nom produit" value="<?= $tb[0]['nom']?>" disabled>
          <label for="img">Nouvelle Image:</label>
          <input type="text" id="img" name="prod_image" placeholder="Entrez l'URL" required>
          <label for="prix">Nouveau Prix</label>
          <input type="text" id="prix" name="prod_prix" placeholder="Prix" value="<?= $tb[0]['prix']?>" required>
          <label for="num">Num Categorie</label>
          <input type="text" id="num" name="cat_num" placeholder="Num Categorie" value="<?= $tb[0]['id_categorie']?>" disabled>
          <?php 
          if(isset($erreur))
             echo $erreur;
          ?>
          <input type="submit" value="Confirmer" name="modifValider">
        </form>
      </div>
</div>
</section>
  <!-- footer Section Starts Here -->
  <?php include_once("footer.php"); ?>
