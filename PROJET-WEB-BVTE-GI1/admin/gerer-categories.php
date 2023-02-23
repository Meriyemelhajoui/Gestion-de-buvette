<?php
session_start();
if(!isset($_SESSION['ouvert'])){
    header("location:index.php");
}
?>

<?php
   include_once("../includes/connexion.php");
   if(isset($_POST['suppValider'])){
       $id_user=$_POST['suppValider'];
       $stmt=$pdo->prepare('DELETE FROM categorie WHERE id=?');
       $run=$stmt->execute([$id_user]);
       if($run){
           header("location:gerer-categories.php");
       }else{
        echo "Something went wrong";
        header("location:gerer-categories.php");
       }
   }
?>
<?php include_once("header.php"); ?>
<!-- Navbar Section Ends Here -->

<!-- manage cat Section Ends Here -->
<section class="catt">
    <div class="container">
        <div class="gerer">
           <h2>GERER<br>CATEGORIES</h2>
        <a href="ajout-cat.php" class="bt">Ajouter categorie</a> 
        </div>
        <br>
    <table class="tbl">
                    <tr>
                        <th>Nom</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                       include_once("../includes/connexion.php");
                       $stmt=$pdo->prepare('SELECT * FROM categorie');
                       $stmt->execute();
                       $tab=$stmt->fetchAll();
                    ?>
                    <?php for($i=0;$i<count($tab);$i++):?>
                    <tr>
                        <td><?= $tab[$i]['nom'];?></td>
                        <td><img src="<?= $tab[$i]['image'];?>" alt="cat_img" width=100px></td>
                        <td class="butt">
                            <a href="modif-cat.php?id=<?= $tab[$i]['id'];?>" class="bt1">Modifier</a>
                            <form action="#" method="POST">
                              <button type="submit" name="suppValider" value="<?= $tab[$i]['id'];?>" class="bt2">Supprimer</button>
                            </form>
                            
                        </td>
                    </tr>
                    <?php endfor; ?>
    </table>
    </div>

</section>

<!-- manage cat Section Ends Here -->

<!-- footer Section Starts Here -->
<?php include_once("footer.php"); ?>