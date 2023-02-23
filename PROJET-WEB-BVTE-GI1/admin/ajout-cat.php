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
$valider=$_POST['addValider'];
$erreur="";
if(isset($valider)){
    include_once("../includes/connexion.php");
    $stmt=$pdo->prepare('SELECT * FROM categorie WHERE nom=?');
    $stmt->execute([$nom]);
    $tab=$stmt->fetchAll();
    if(count($tab)>0){
        $erreur="Categorie existe déja";
    }else{
        $ins=$pdo->prepare('INSERT INTO categorie(nom,image) values(?,?)');
        $ins->execute([$nom,$image]);
        header("location:gerer-categories.php");
    }
}

?>

<?php include_once("header.php"); ?>
<!-- Navbar Section Ends Here -->
<section class="modif">
    <div class="container">
<h2 class="text-center">AJOUTER<br>CATEGORIE</h2>
<form action="" method="POST">
    <div>
        <form action="#" method="POST">
        <label for="nom">Nom categorie</label>
          <input type="text" id="nom" placeholder="Nom categorie" name="cat_nom" required>
          <label for="img">Image:</label>
          <input type="text" id="img" placeholder="Entrez l'URL" name="image" required>
          <?php 
          if(isset($erreur))
             echo $erreur;
          ?>
          <input type="submit" value="Confirmer" name="addValider">
        </form>
      </div>
</form>
</div>
</section>
<!-- footer Section Starts Here -->
<?php include_once("footer.php"); ?>
