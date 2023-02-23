<?php
session_start();
if(!isset($_SESSION['ouvert'])){
    header("location:index.php");
}
?>

<?php
error_reporting(0);
$nom=$_POST['cat_nom'];
$image=$_POST['image'];
$valider=$_POST['modifValider'];
$erreur="";
if(isset($valider)){
    include_once("../includes/connexion.php");
    $stmt=$pdo->prepare('SELECT * FROM categorie WHERE nom=?');
    $stmt->execute([$nom]);
    $tab=$stmt->fetchAll();
    if(count($tab)>0){
        $stmt=$pdo->prepare('UPDATE categorie SET image=? WHERE nom=?');
        $stmt->execute([$image,$nom]);
        header("location:gerer-categories.php");


    }else{
        $erreur="Catégorie n'existe pas";
    }
}
?>

<?php
    include_once("../includes/connexion.php");
    if(isset($_GET['id'])){
        $cat_id=$_GET['id'];
    }
    $stmt=$pdo->prepare('SELECT * FROM categorie WHERE id=?');
    $stmt->execute([$cat_id]);
    $tb=$stmt->fetchAll();
?>

<?php include_once("header.php"); ?>
<!-- Navbar Section Ends Here -->
<section class="modif">
    <div class="container">
<h2 class="text-center">MODIFIER<br>CATEGORIE</h2>
    <div>
        <form action="#" method="POST">
          <label for="nom">Nom categorie</label>
          <input type="text" id="nom" placeholder="Nom categorie" name="cat_nom" value="<?= $tb[0]['nom']?>" required>
          <label for="img">Nouvelle Image:</label>
          <input type="text" id="img" placeholder="Entrez l'URL" name="image" required>
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