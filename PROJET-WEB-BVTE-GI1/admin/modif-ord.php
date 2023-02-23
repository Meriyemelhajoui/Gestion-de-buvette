<?php
error_reporting(0);
session_start();
if(!isset($_SESSION['ouvert'])){
    header("location:index.php");
}
?>
<?php
  $valider=$_POST['submit'];
  $status=$_POST['ord'];
  $id=$_GET['id'];
  $error="";
  if(isset($valider)){
    include_once("../includes/connexion.php");
    $stmt=$pdo->prepare('UPDATE orders SET status=? WHERE id=?');
    if($stmt->execute([$status,$id])){
        header("location:gerer-ordres.php");
    }
    else
       $error="something went wrong";

  }
?>

<?php include_once("header.php"); ?>
<!-- Navbar Section Ends Here -->
<section class="modif">
    <div class="container">
<h2 class="text-center">MODIFIER<br>Commande</h2>

    <div>
        <form action="#" method="POST">
            <label for="ord">Commande a été:</label>
            <select id="ord" name="ord">
              <option value="Delivre">Delivré</option>
              <option value="Annule">Annulé</option>
            </select>
            <?=$error;?>
          <input type="submit" value="Confirmer" name="submit">
        </form>
      </div>

</div>
</section>
<!-- footer Section Starts Here -->
<?php include_once("footer.php"); ?>
