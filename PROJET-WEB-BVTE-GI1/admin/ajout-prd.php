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
$valider=$_POST['ajoutValider'];
$erreur="";
if(isset($valider)){
    include_once("../includes/connexion.php");
    $stmt=$pdo->prepare('SELECT * FROM produit WHERE nom=?');
    $stmt->execute([$nom]);
    $tab=$stmt->fetchAll();
    if(count($tab)>0){
        $erreur="Produit existe déja";
    }else{
        $ins=$pdo->prepare('INSERT INTO produit(nom,image,prix,id_categorie) values(?,?,?,?)');
        $ins->execute([$nom,$image,$prix,$num_cat]);
        header("location:gerer-produits.php");
    }
}
?>


<?php include_once("header.php"); ?>
<!-- Navbar Section Ends Here -->
<section class="modif">
    <div class="container">
<h2 class="text-center">AJOUTER<br>PRODUIT</h2>
    <div>
        <form action="#" method="POST">
          <label for="Nom">Nom produit</label>
          <input type="text" id="Nom" name="prod_nom" placeholder="Nom produit">
          <label for="img">Image:</label>
          <input type="text" id="img" name="prod_image" placeholder="Entrez l'URL">
          <label for="prix">Prix</label>
          <input type="text" id="prix" name="prod_prix" placeholder="Prix">
          <label for="num">Num Categorie</label>
          <input type="text" id="num" name="cat_num" placeholder="Num Categorie">
          <?php 
          if(isset($erreur))
             echo $erreur;
          ?>
          <input type="submit" value="Confirmer" name="ajoutValider">
        </form>
      </div>
</div>
</section>
<!-- footer Section Starts Here -->
<?php include_once("footer.php"); ?>